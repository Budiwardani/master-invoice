<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
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
            $data = Item::with('company')->where('company_id',Auth::user()->company_id)->get();
        } else {
            $data = Item::with('company')->get();
        }

        return view('pages.item.index',[
            'items'      => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.item.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'item_code'     =>  'required',
            'item_name'     =>  'required',
        ]);

        $insert = Item::create([
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'company_id'=> Auth::user()->company_id,
            'random_id'=> '-',
        ]);

        $encrypted_id   = md5($insert->id.Carbon::now().Auth::user()->company_id);

        if($insert){
            $insert->update(['random_id'  => $encrypted_id]);
        }

        return redirect('master-item/index')->with('success','created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
