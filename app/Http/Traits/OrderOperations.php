<?php

namespace App\Http\Traits;

use App\Mail\OrderCreated;
use App\Models\Address;
use App\Models\Order;
use Carbon\Carbon;

trait OrderOperations
{
    public function calculateDistance($source, $destination): float
    {
        $earthRadius = 6371;
        $srcLat = deg2rad($source['lat']);
        $srcLng = deg2rad($source['lng']);
        $destLat = deg2rad($destination['lat']);
        $destLng = deg2rad($destination['lng']);

        $lonDelta = $destLng - $srcLng;

        $a = pow(cos($destLat) * sin($lonDelta), 2) +
            pow(cos($srcLat) * sin($destLat) - sin($srcLat) * cos($destLat) * cos($lonDelta), 2);

        $b = sin($srcLat) * sin($destLat) + cos($srcLat) * cos($destLat) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);

        return $angle * $earthRadius;
    }

    public function generateTrackId(): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $trackNumber = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $trackNumber .= $characters[$index];
        }

        return $trackNumber;
    }

    public function saveAddress($address, $orderId): void
    {
        for ($i = 0;$i < count($address);$i++) {
            Address::create([
                'order_id'  => $orderId,
                'lat'       => $address[$i]['lat'],
                'lng'       => $address[$i]['lng'],
                'address'   => $address[$i]['address'],
                'station'   => $i+1
            ]);
        }
    }

    public function sendNewOrderMail($data): void
    {
        sendMail(auth()->user()->email, new OrderCreated([
            'title'         => __("New Order created"),
            'sub_total'     => $data['sub_total'],
            'total'         => $data['total']
        ]));
    }

    public function saveOrder($data): Order
    {
        return Order::create([
            'user_email'        => auth()->user()->email,
            'track_id'          => $this->generateTrackId(),
            'user_id'           => auth()->user()->id,
            'truck_id'          => $data['truck_id'],
            'truck_type_id'     => $data['truck_type_id'],
            'load_id'           => $data['load_id'],
            'delivery_status'   => 'pending',
            'payment_status'    => 'pending',
            'quantity'          => $data['quantity'],
            'vat'               => 0.15,
            'commission'        => $data['commission'],
            'discount'          => 0,
            'sub_total'         => $data['sub_total'],
            'total'             => $data['total'],
            'time'              => Carbon::createFromFormat('Y-m-d H:i', $data['date'] . $data['time']),
        ]);
    }

    public function store($data): Order
    {
        $order = $this->saveOrder($data);

        $this->saveAddress($data['address'], $order->id);

        $this->sendNewOrderMail($data);

        return $order;
//        return $this->sendResponse(new OrderResource($order), __('Order created successfully'));
    }
}
