<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('pages.company.index',[
            'companies'      => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.company.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_code'     =>  'required',
            'company_type'     =>  'required',
            'company_name'     =>  'required',
            'company_address'  =>  'required',
        ]);

        $insert = Company::create([
            'company_code'          => $request->company_code,
            'company_name'        => $request->company_name,
            'company_address'         => $request->company_address,
            'company_telephone'      => $request->telephone,
            'company_fax'        => $request->fax,
            'company_type'      => $request->company_type,
            // 'random_id'  => $request->telephone,
        ]);

        $encrypted_id   = md5($request->company_code.$insert->id.Carbon::now());

        if($insert){
            $insert->update(['random_id'  => $encrypted_id]);
        }

        return redirect('master-company/index')->with('success','created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($random_id)
    {
        $company = Company::where('random_id',$random_id)->first();

        return view('pages.company.edit',[
            'company'      => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $random_id)
    {
        $this->validate($request, [
            'company_code'     =>  'required',
            'company_type'     =>  'required',
            'company_name'     =>  'required',
            'company_address'  =>  'required',
        ]);

        $company   = Company::where('random_id',$random_id)->first();

        $company->update([
            'company_code'          => $request->company_code,
            'company_name'        => $request->company_name,
            'company_address'         => $request->company_address,
            'company_telephone'      => $request->telephone,
            'company_fax'        => $request->fax,
            'company_type'      => $request->company_type,
        ]);

        return redirect('master-company/index')->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
