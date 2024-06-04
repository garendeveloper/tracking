<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index() 
    {
        $dashboard_data = [
            'total_customers'=> DB::table('users')->where('role', '=', 2)->count(),
            'total_drivers'=> DB::table('users')->where('role', '=', 3)->count(),
            'total_weigher'=> DB::table('users')->where('role', '=', 4)->count(),
            'total_transactions'=> DB::table('transactions')->count(),
        ];
        return view('home', compact('dashboard_data'));
    }
}
