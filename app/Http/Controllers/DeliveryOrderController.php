<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use App\Models\DeliveryOrderDetail;
use App\Models\PurchaseOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryOrderController extends Controller
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
        $return_arr = array();

        if(in_array('Supplier',$roles_array)){
            $company_id = $role_name->company_id;
            $data = DeliveryOrder::with('detail.item_data','purchaseOrder.detail','purchaseOrder.quotation.company','invoice')
            ->whereHas('purchaseOrder.quotation',function ($query) use ($company_id) {
                return $query->where('company_id',$company_id);
            })
            ->get();
        } else {
            $data = DeliveryOrder::with('detail.item_data','purchaseOrder.detail','purchaseOrder.quotation.company','invoice')->get();
        }
        foreach($data as $row_data) {
            $delivered = '';
            $invoice = 'none';
            foreach($row_data->purchaseOrder->detail as $po_detail){
                foreach($row_data->detail as $data_detail){
                    if($data_detail->item_id == $po_detail->item_id) {
                        if($data_detail->quantity == $po_detail->quantity) {
                            if($delivered != 'part') {
                                $delivered = 'done';
                            }
                        } else {
                            $delivered = 'part';
                        }
                    }
                }
            }
            if(!$row_data->invoice == null){
                $invoice = 'exist';
            }
            array_push($return_arr,[
                'company_name'      => $row_data->purchaseOrder->quotation->company->company_name,
                'delivery_number'   => $row_data->delivery_number,
                'date'              => $row_data->date,
                'etd'               => $row_data->etd,
                'eta'               => $row_data->eta,
                'current_status'    => $row_data->current_status,
                'random_id'         => $row_data->random_id,
                'delivered'         => $delivered,
                'invoice'           => $invoice,
            ]);
        }

        // dd($return_arr);

        return view('pages.delivery-order.index',[
            'data'      => $return_arr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = DeliveryOrder::where('random_id',$id)->with('detail.item_data','purchaseOrder.quotation.company')->first();
        // dd($data);
        return view('pages.delivery-order.create',[
            'data'      => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quotation = PurchaseOrder::where('random_id',$request->ref_number)->first();
        $rendom_id  = md5(Carbon::now());
        $insert = DeliveryOrder::create([
            'purchase_order_id' => $quotation->id,
            'revision'          => '0',
            'current_status'    => 'on delivery',
            'random_id'         => $rendom_id
        ]);

        foreach($request->items as $item){
            DeliveryOrderDetail::create([
                'delivery_order_id' => $insert->id,
                'item_id'           => $item
            ]);
        }

        $quotation->update([
            'current_status'    => 'approved'
        ]);

        if($insert){
            return redirect()->route('do.create',$rendom_id);
        }
    }

    public function save(Request $request,$id)
    {
        $po_data = DeliveryOrder::where('random_id',$id)->first();
        foreach($request->data as $data){
            $current_data = DeliveryOrderDetail::where('id',$data['detail_id'])->first();
            $current_data->update([
                'quantity'  => $data['quantity']
            ]);
        }

        $update = $po_data->update([
            'etd'   => $request->etd,
            'eta'   => $request->eta,
            'delivery_number'   => $request->do_number
        ]);

        return redirect()->route('do.index')->with('success','created');
    }

    /**
     * Display the specified resource.
     */
    public function show($random_id)
    {
        $data = DeliveryOrder::where('random_id',$random_id)->with('detail.item_data','purchaseOrder.quotation.company')->first();

        return view('pages.delivery-order.show',[
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $random_id)
    {
        $po_data = DeliveryOrder::where('random_id',$random_id)->first();

        $update = $po_data->update([
            'current_status'   => $request->status
        ]);

        return redirect()->route('do.show',$random_id)->with('success','created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $deliveryOrder)
    {
        //
    }
}
