<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Auth;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($request->ajax()) {
            $data = DB::select('select * from transactions');
            return Datatables::of($data)->make(true);
        }

        return view('home');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer'=>'required',
            'driver'=>'required',
            'weigher'=>'required',
            'gross'=>'required',
            'plate_number'=>'required',
            'weigh_in'=>'required',
        ]);

        if($validator->fails())
        {
            return $validator->messages();
        }
        else
        {
            $customer = $request->customer;
            $driver = $request->driver;
            $weigher = $request->weigher; 

            $save_customer = User::updateOrCreate(
                ['id' => $request->customer_id],
                ['name' => $customer, 'role'=>1], 
            );
            $save_driver = User::updateOrCreate(
                ['id' => $request->driver_id],
                ['name' => $driver, 'role'=>2], 
            );
            $save_weigher = User::updateOrCreate(
                ['id' => $request->weigher_id],
                ['name' => $weigher, 'role'=>3], 
            );
           
            Transaction::updateOrCreate([
                ['id'=>$transaction_id],
                [
                    'user_id'=> auth()->id,
                    'customer'=> $save_customer->id,
                    'driver'=> $save_driver->id,
                    'weigher'=> $save_weigher->id,
                    'gross'=>$request->gross,
                    'plate_number'=>$request->plate_number,
                    'weigh_in'=>$request->weigh_in,
                ]
            ]);

        }
    }

    public function show($transaction_id)
    {
        $data = DB::select("SELECT users.*, transactions.* 
                            FROM users, transactions
                            WHERE users.id = transactions.user_id");    
        return response()->json($data);
        
    }
}
