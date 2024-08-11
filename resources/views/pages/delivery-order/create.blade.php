@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Delivery Order'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <form role="form" method="post" action="{{ route('do.save',$data->random_id) }}">
                @csrf
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="row mb-2">
                                <div class="col-2">
                                        ETD
                                </div>
                                <div class="col-8">
                                    <input class="form-control" value="" name="etd" type="date" min="{{ \Carbon\Carbon::now()->toDateString() }}" placeholder="ETD" required>
                                </div>
                                @error('etd')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-2">
                                <div class="col-2">
                                        ETA
                                </div>
                                <div class="col-8">
                                    <input class="form-control" value="" name="eta" type="date" min="{{ \Carbon\Carbon::now()->toDateString() }}" placeholder="ETA" required>
                                </div>
                                @error('eta')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-2">
                                <div class="col-2">
                                    DO Number
                                </div>
                                <div class="col-8">
                                    <input class="form-control" value="" name="do_number" type="text" placeholder="Do Number" required>
                                </div>
                                @error('do_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-2">
                                <h4>Purchase Order Data</h4>
                                <div class="row">
                                    <div class="col-2">
                                        Ref Number
                                    </div>
                                    <div class="col-8">
                                        : {{ $data->purchaseOrder->ref_number }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Create Date
                                    </div>
                                    <div class="col-8">
                                        : {{ formatDate($data->purchaseOrder->created_at) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Due Date
                                    </div>
                                    <div class="col-8">
                                        : {{ formatDate($data->purchaseOrder->due_date) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($delivery) }} --}}
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:100px;" class="text-center"> No. </th>
                                <th scope="col" class="text-center"> Item Code </th>
                                <th scope="col" class="text-center"> Item Name </th>
                                <th scope="col" class="text-center"> Quantity </th>
                                <th scope="col" style="width:10%" class="text-center">Required</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            function max_value($id,$delivery) {
                                foreach ($delivery->detail as $detail) {
                                    if($detail->item_id == $id){
                                        $deliver = 0;
                                        $order_sum = 0;
                                        $remain = 0;
                                        foreach($delivery->deliveries as $delivered){
                                            foreach($delivered->detail as $data_detail) {
                                                if($data_detail->item_id == $id){
                                                    $deliver = $deliver + $data_detail->quantity;
                                                }
                                            }
                                        }
                                        $order_sum = $order_sum + $detail->quantity;
                                        $remain = $order_sum - $deliver;
                                        return $remain;
                                    }
                                }
                            }
                            @endphp
                            @foreach ($data->detail as $index=>$item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->item_data->item_code }}</td>
                                <td>{{ $item->item_data->item_name }}</td>
                                <td><input class="form-control" value="" name="data[{{ $index }}][quantity]" type="number" max="{{ max_value($item->item_data->id,$delivery) }}" placeholder="Quantity max {{ max_value($item->item_data->id,$delivery) }}" inputmode="numeric" required></td>
                                <td class="text-end">
                                    @foreach ($data->purchaseOrder->detail as $order)
                                        @if($order->item_id == $item->item_id)
                                            {{ $order->quantity }}
                                        @endif
                                    @endforeach</td>
                            </tr>
                            <input class="form-control" value="{{ $item->id }}" name="data[{{ $index }}][detail_id]" type="hidden" >
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-success shadow-sm rounded-sm" type="submit">SAVE</button>
                            <button class="btn btn-warning shadow-sm rouned-sm ms-3" type="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4" id="question">
        <div class="row">

        </div>
        @include('layouts.footers.auth.footer')
    </div>

    <style>
        .fixed {
            position: fixed;
            top: 0;
            right: 0;
            left: 17rem;
            margin-top: 15px;
            margin-right: 1.5rem;
            z-index: 99;
        }

        .additionalDiv {
            margin-top: 22.5rem;
        }

        @media(max-width: 1199px){
            .fixed {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                margin-top: 15px;
                z-index: 99;
            }

            .additionalDiv {
                margin-top: 22rem;
            }
        }

        @media(max-width: 910px){
            .card.card-profile-bottom{
                margin-top: 15rem;
            }
            .py-4{
                padding-top: 1rem !important;
            }
            .fixed {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                margin-top: 15px;
                z-index: 99;
            }

            .additionalDiv {
                margin-top: 22rem;
            }
        }

        @media(max-width: 501px){
            .card.card-profile-bottom{
                margin-top: 12rem;
            }
            .py-4{
                padding-top: 1rem !important;
            }
            .fixed {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                margin-top: 15px;
                z-index: 99;
            }

            .additionalDiv {
                margin-top: 20rem;
            }
        }

        @media(max-width: 464px){
            .card.card-profile-bottom{
                margin-top: 12rem;
            }
            .py-4{
                padding-top: 0.55rem !important;
            }
            .fixed {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                margin-top: 15px;
                z-index: 99;
            }

            .additionalDiv {
                margin-top: 20rem;
            }
        }
    </style>


@endsection
