<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ExportRequests;
use App\Exports\ExportSupplies;
use App\Exports\ExportTickets;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function export(Request $request)
    {
        $type = $request->request->get('type');

        if ($type == 'ticket') {
            return Excel::download(new ExportTickets, 'orders.xlsx');
        } elseif ($type == 'supply') {
            return Excel::download(new ExportSupplies, 'orders.xlsx');
        } elseif ($type == 'request') {
            return Excel::download(new ExportRequests, 'orders.xlsx');
        }
        abort(404);
    }


}
