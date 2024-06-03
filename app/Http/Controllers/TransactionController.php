<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;
use DB;
use DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::select('select * from transactions');
            $data = [];
            foreach($query as $q)
            {
                $data[] = [
                    'customer'=> User::find($q->customer)['name'],
                    'driver' =>  User::find($q->driver)['name'],
                    'weigher' =>  User::find($q->weigher)['name'],
                    'gross' => $q->gross,
                    'weigh_in' => $q->weigh_in,
                    'plate_number' => $q->plate_number,
                    'date' => $q->updated_at,
                    'id' => $q->id,
                ];
            }
            // foreach ($data as $row) {
            //     $row->edit_button = '<button class="edit-button" data-id="' . $row->id . '">Edit</button>';
      
            // }
        
            return DataTables::of($data)
                // ->rawColumns(['edit_button']) 
                ->make(true);
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
                ['name' => $customer, 'role'=>2], 
            );
            $save_driver = User::updateOrCreate(
                ['id' => $request->driver_id],
                ['name' => $driver, 'role'=>3], 
            );
            $save_weigher = User::updateOrCreate(
                ['id' => $request->weigher_id],
                ['name' => $weigher, 'role'=>4], 
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
        $array = [];

        return response()->json($data);
        
    }
}
