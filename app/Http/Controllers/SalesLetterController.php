<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Item;
use App\Models\SalesLetter;
use App\Models\SalesLetterDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles_array = array();
        $role_name = User::where('id',Auth::user()->id)->with('roles')->first();
        foreach($role_name->roles as $role){
            array_push($roles_array,$role->name);
        }

        if(in_array('Supplier',$roles_array)){
            $data = SalesLetter::with('company','detail.item_data')->where('company_id',Auth::user()->company_id)->get();
        } else {
            $companies = Company::where('company_type','supplier')->get();
            foreach($companies as $company){
                $get = SalesLetter::with('detail.item_data')->where('company_id',$company->id)->get();
                if(count($get)){
                    $data[$company->company_name] = $get;
                }
                if(!count($get)){
                    $data = null;
                }
            }
        }
        // dd($data);

        return view('pages.quotation.index',[
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Item::where('company_id',Auth::user()->company_id)->get();
        return view('pages.quotation.create',[
            'datas'      => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $encrypted_id   = md5($request->ref_no.Carbon::now());
        $input = SalesLetter::create([
            'ref_number'    => $request->ref_no,
            'company_id'    => Auth::user()->company_id,
            'created_by'    => Auth::user()->id,
            'due_date'      => $request->due_date,
            'current_status'=> 'waiting',
            'random_id'     => $encrypted_id
        ]);
        if($input){
            foreach($request->options as $key=>$item){
                foreach($request->price as $index=>$price){
                    if($key == $index){
                        SalesLetterDetail::create([
                            'sales_leter_id'=> $input->id,
                            'item_id'       => $item,
                            'price'         => $price
                        ]);
                    }
                }
            }

            return redirect('quotation/index')->with('success','created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesLetter $salesLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesLetter $salesLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesLetter $salesLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesLetter $salesLetter)
    {
        //
    }
}
