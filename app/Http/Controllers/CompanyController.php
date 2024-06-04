<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Company::updateOrCreate(
            ['id'=>$request->company_id],
            [
                'company_name'=> $request->company_name,
                'address'=> $request->address,
            ]
        );

        return json_encode([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        //
        $company = Company::first();
        return response()->json([
            'data' => $company,
            'success' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        //

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        //
    }
}
