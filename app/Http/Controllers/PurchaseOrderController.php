<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\SalesLetter;
use App\Models\Term;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
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
            $company_id = $role_name->company_id;
            $data = PurchaseOrder::where('current_status','open')->with('detail.item_data','quotation.company')
            ->whereHas('quotation',function ($query) use ($company_id) {
                return $query->where('company_id',$company_id);
            })
            ->get();
        } else {
            $data = PurchaseOrder::where('current_status','open')->with('detail.item_data','quotation.company')->get();
        }

        return view('pages.purchase-order.index',[
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = PurchaseOrder::where('random_id',$id)->with('detail.item_data','quotation.company')->first();
        $terms = Term::get();
        return view('pages.purchase-order.create',[
            'data'      => $data,
            'terms'     => $terms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seed = str_split('0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        $quotation = SalesLetter::where('random_id',$request->ref_number)->first();
        $rendom_id  = md5($rand.Carbon::now());
        foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
        $insert = PurchaseOrder::create([
            'ref_number'        => $rand,
            'date'              => Carbon::now(),
            'sales_letter_id'   => $quotation->id,
            'revision'          => '0',
            'current_status'    => 'open',
            'created_by'        => Auth::user()->id,
            'random_id'         => $rendom_id
        ]);

        foreach($request->items as $item){
            PurchaseOrderDetail::create([
                'purchase_order_id' => $insert->id,
                'item_id'           => explode("/", $item)[0],
                'price'             => explode("/", $item)[1]
            ]);
        }

        $quotation->update([
            'current_status'    => 'approved'
        ]);

        if($insert){
            return redirect()->route('po.create',$rendom_id);
        }
    }

    public function save(Request $request,$id)
    {
        $term = Term::where('random_id',$request->term_id)->first();
        if($term->term_condition == 'eom'){
            $start_date = Carbon::now()->endOfMonth();
        } else {
            $start_date = Carbon::now();
        }
        if($term->periode == 'week'){
            $due_date = $start_date->addWeek($term->value);
        } else {
            $due_date = $start_date->addMonth($term->value);
        }
        $po_data = PurchaseOrder::where('random_id',$id)->first();
        foreach($request->data as $data){
            $current_data = PurchaseOrderDetail::where('id',$data['detail_id'])->first();
            $current_data->update([
                'quantity'  => $data['quantity']
            ]);
        }

        $update = $po_data->update([
            'credit_terms_id'   => $term->id,
            'due_date'  => $due_date
        ]);

        return redirect()->route('po.index')->with('success','created');
    }

    /**
     * Display the specified resource.
     */
    public function show($random_id)
    {
        $data = PurchaseOrder::where('random_id',$random_id)->with('detail.item_data','quotation.company')->first();
        return view('pages.purchase-order.show',[
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
