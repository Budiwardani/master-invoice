<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\PurchaseOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        return view('pages.invoice.home',[
        ]);
    }

    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $all_invoices = Invoice::where('payment_status','On Process')->get();
        foreach($all_invoices as $invoice) {
            if($invoice->due_date < $now){
                $invoice->update([
                    'payment_status'    => 'Overdue'
                ]);
            }
        }
        $roles_array = array();
        $role_name = User::where('id',Auth::user()->id)->with('roles')->first();
        foreach($role_name->roles as $role){
            array_push($roles_array,$role->name);
        }

        if(in_array('Supplier',$roles_array)){
            $company_id = $role_name->company_id;
            $data = Invoice::with('detail.item_data','deliveryOrder','company')
            ->where('company_id',$company_id)
            ->get();
        } else {
            $data = Invoice::with('detail.item_data','deliveryOrder','company')->get();
        }

        return view('pages.invoice.index',[
            'data'      => $data,
            'page'      => 'status',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_new()
    {
        $roles_array = array();
        $role_name = User::where('id',Auth::user()->id)->with('roles')->first();
        foreach($role_name->roles as $role){
            array_push($roles_array,$role->name);
        }

        $company_id = $role_name->company_id;
        // $data = DeliveryOrder::with('quotation.detail','deliveries.detail.item_data')
        // ->whereHas('quotation',function ($query) use ($company_id) {
        //     return $query->where('company_id',$company_id);
        // })
        // ->whereHas('deliveries')
        // ->get();
        $data = PurchaseOrder::with('quotation.detail','deliveries.detail.item_data')
        ->whereHas('quotation',function ($query) use ($company_id) {
            return $query->where('company_id',$company_id);
        })
        ->whereHas('deliveries',function ($query) use ($company_id) {
            return $query->whereNull('invoice_id');
        })
        ->get();

        return view('pages.invoice.create_new',[
            'data'      => $data,
        ]);
    }

    // public function create_new()
    // {
    //     $roles_array = array();
    //     $role_name = User::where('id',Auth::user()->id)->with('roles')->first();
    //     foreach($role_name->roles as $role){
    //         array_push($roles_array,$role->name);
    //     }

    //     $company_id = $role_name->company_id;
    //     $data = PurchaseOrder::with('detail.item_data','quotation.company','deliveries.detail.item_data','invoice')
    //     ->whereHas('quotation',function ($query) use ($company_id) {
    //         return $query->where('company_id',$company_id);
    //     })
    //     ->whereDoesntHave('invoice')
    //     ->get();

    //     $return_arr = array();
    //     foreach($data as $current) {
    //         $delivered = '';
    //         $invoice = 'none';
    //         $sum = 0;
    //         $orders_cont = 0;
    //         $deliveries = array();
    //         foreach($current->detail as $det){
    //             $orders_cont = $orders_cont + $det->quantity;
    //         }
    //         foreach($current->deliveries as $row_data){
    //             foreach($row_data->purchaseOrder->detail as $po_detail){
    //                 foreach($row_data->detail as $data_detail){
    //                     if($data_detail->item_id == $po_detail->item_id) {
    //                         if($row_data->purchase_order_id == $current->id){
    //                             $sum = $sum + $data_detail->quantity;
    //                             array_push($deliveries,[
    //                                 'delivery_number'   => $row_data->delivery_number,
    //                                 'item_code'         => $data_detail->item_data->item_code,
    //                                 'item_name'         => $data_detail->item_data->item_name,
    //                                 'quantity'          => $data_detail->quantity
    //                             ]);
    //                         }
    //                     }
    //                 }
    //             }
    //             if($orders_cont == $sum) {
    //                 $delivered = 'done';
    //             } else {
    //                 $delivered = 'part';
    //             }
    //             if(!$current->invoice == null){
    //                 $invoice = 'exist';
    //             }
    //         }

    //         array_push($return_arr,[
    //             'po_number'         => $current->ref_number,
    //             'create_date'       => $current->created_at,
    //             'status'            => $current->current_status,
    //             'due_date'          => $current->due_date,
    //             'random_id'         => $current->random_id,
    //             'delivered'         => $delivered,
    //             'invoice'           => $invoice,
    //             'credit_terms_id'   => $current->credit_terms_id,
    //             'date'              => $current->date,
    //             'invoice_id'        => ($current->invoice ? $current->invoice->random_id : null),
    //             'deliveries'        => $deliveries
    //         ]);
    //     }

    //     return view('pages.invoice.create_new',[
    //         'data'      => $data,
    //         'return_arr'=> $return_arr,
    //         'page'      => 'create'
    //     ]);
    // }

    public function create($id)
    {
        $data = Invoice::where('random_id',$id)->with('detail','deliveryOrder')->first();
        // dd($data);
        return view('pages.invoice.create',[
            'data'      => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sum = 0;
        // $data = PurchaseOrder::with('detail','quotation')->where('random_id',$request->random_id)->first();

        $rendom_id  = md5(Carbon::now());
        $insert = Invoice::create([
            'date'              => Carbon::now(),
            'sub_total'         => 0,
            'discount'          => 0,
            'total'             => 0,
            'tax'               => 0,
            'grand_total'       => 0,
            'payment_status'    => 'On Process',
            'random_id'         => $rendom_id,
            'company_id'        => $request->company_id
        ]);

        foreach($request->items as $item){
            $datas = DeliveryOrder::with('purchaseOrder.detail')->where('random_id',$item)->first();
            // dd($item);
            foreach($datas->purchaseOrder->detail as $data){
                $sum = $sum + ($data->quantity * $data->price);
                InvoiceDetail::create([
                    'invoice_id'    => $insert->id,
                    'item_id'       => $data->item_id,
                    'quantity'      => $data->quantity,
                    'price'         => $data->price,
                    'total'         => $data->quantity * $data->price,
                ]);
            }
            $datas->update([
                'invoice_id'     => $insert->id,
            ]);
        }

        $insert->update([
            'sub_total'     => $sum,
            'total'         => $sum,
            'grand_total'   => $sum,
        ]);

        // if($insert){
        //     return response()->json([
        //         'success'   => true,
        //         'message'   => 'Create Invoice Success',
        //         'data'      => $rendom_id,
        //     ]);
        // }

        // return response()->json([
        //     'success'   => false,
        //     'message'   => 'Failed to create Invoice',
        // ]);
        if($insert){
            return redirect()->route('invoice.create',$rendom_id)->with('success','created');
        }
    }

    public function save(Request $request,$id)
    {
        // $validatedData = $request->validate([
        //     'invoice_number'    => 'required',
        //     'due_date'          => 'required',
        // ]);

        $invoice_data = Invoice::where('random_id',$id)->first();

        $update = $invoice_data->update([
            'invoice_number'   => $request->invoice_number,
            'tax_number'   => $request->tax_number,
            'due_date'   => $request->due_date,
            'date'   => $request->invoice_date,
            'tax'   => 0.11 * $invoice_data->sub_total,
            'grand_total'   => $invoice_data->sub_total + (0.11 * $invoice_data->sub_total),
        ]);

        $this->checkOverdue($request->due_date,$invoice_data);

        return redirect()->route('invoice.status')->with('success','created');
    }

    function checkOverdue($date,$invoice) {
        $now = Carbon::now()->format('Y-m-d');
        if($invoice->due_date < $now){
            $invoice->update([
                'payment_status'    => 'Overdue'
            ]);
        } else {
            $invoice->update([
                'payment_status'    => 'On Process'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($random_id)
    {
        $data = Invoice::where('random_id',$random_id)->with('detail.item_data','purchaseOrder.deliveries.detail.item_data','quotation.company')->first();

        return view('pages.invoice.show',[
            'data'      => $data,
        ]);
    }

    public function print($random_id)
    {
        $data = Invoice::where('random_id',$random_id)->with('detail.item_data','purchaseOrder.deliveries.detail','quotation.company')->first();
        // dd($data);

        return view('pages.invoice.print',[
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Invoice::with('deliveryOrder.detail.item_data')->where('random_id',$id)->first();
        // dd($data);

        return view('pages.invoice.edit',[
            'data'      => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $invoice_data = Invoice::where('random_id',$id)->first();
        if(Auth::user()->getRoleNames()[0] == 'Supplier') {
            $validatedData = $request->validate([
                'tax_number'    => 'required',
            ]);

            $update = $invoice_data->update([
                'tax_number'   => $request->tax_number,
            ]);
        } else {
            $update = $invoice_data->update([
                'payment_status'   => 'Paid',
            ]);
        }

        return redirect()->route('invoice.status')->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
