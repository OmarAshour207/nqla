<?php

use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\File;
use App\Models\Media;
function sendNotification($data)
{
    $title = $data['title'];
    $body = $data['body'];
    $tokens = isset($data['tokens']) ? $data['tokens'] : [];

    if(isset($data['admin'])) {
        $adminTokens = \App\Models\User::whereRole('admin')->whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
        $tokens = array_merge($adminTokens, $tokens);
    }

    $FIREBASE_API_KEY = env('FIREBASE_API_KEY');
    $url = 'https://fcm.googleapis.com/fcm/send';

    $notification = [
        'title' => $title,
        'body'  => $body,
        'sound' => 'default',
        'badge' => 1
    ];

    $data = [
        'registration_ids'  => $tokens,
        'notification'  => $notification
    ];

    $dataString = json_encode($data);

    $headers = array (
        'Authorization: key=' . $FIREBASE_API_KEY,
        'Content-Type: application/json'
    );

    try {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $dataString );

        curl_exec ( $ch );
        curl_close ( $ch );
    } catch (\Exception $e) {
        Log::error("Notification can't send");
    }

    return true;
}

function sendMail($mail, $template)
{
    try {
        \Illuminate\Support\Facades\Mail::to($mail)->send($template);
    } catch (\Exception $e) {
        Log::info("Error: " . $e->getMessage());
    }
}

function moveTempImage($id)
{
    $image = Media::whereId($id)->first();

    $name = $image->name;
    $dir = $image->type;

    $imagePath = public_path("uploads/$dir");

    if (!File::exists($imagePath))
        File::makeDirectory($imagePath, 0777, true, true);

    File::move(public_path("uploads/temp/$dir/$name"), "$imagePath/$name");
    File::move(public_path("uploads/temp/$dir/thumb_$name"), "$imagePath/thumb_$name");

    $image->delete();

    return $name;
}
