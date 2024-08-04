@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Purchase Order Detail'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <form role="form" method="post" action="{{ route('do.store',$data->random_id) }}">
                @csrf
                {{-- {{ $data->random_id }} --}}
                    <div class="row mb-2">
                        <div class="col-6">
                            <div>
                                <h4>PO Number : {{ $data->ref_number }}</h4>
                            </div>
                            <div >
                                <h4>Due Date : {{ formatDate($data->due_date) }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-2">
                                <h4>Quotation Data</h4>
                                <div class="row">
                                    <div class="col-2">
                                        Ref Number
                                    </div>
                                    <div class="col-8">
                                        : {{ $data->quotation->ref_number }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Supplier
                                    </div>
                                    <div class="col-8">
                                        : {{ $data->quotation->company->company_name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Create Date
                                    </div>
                                    <div class="col-8">
                                        : {{ formatDate($data->quotation->company->created_at) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:100px;" class="text-center"> No. </th>
                                <th scope="col" class="text-center"> Item Code </th>
                                <th scope="col" class="text-center"> Item Name </th>
                                <th scope="col" class="text-center"> Quantity </th>
                                <th scope="col" style="width:10%" class="text-center">Price</th>
                                @if(Auth::user()->hasAnyPermission(['do.create']) && $data->current_status == 'open')
                                    <th scope="col" style="width:10%" class="text-center">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->detail as $index=>$item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->item_data->item_code }}</td>
                                <td>{{ $item->item_data->item_name }}</td>
                                <td class="text-end">{{ formatNumber($item->quantity) }}</td>
                                <td class="text-end">{{ formatNumber($item->price) }}</td>
                                @if(Auth::user()->hasAnyPermission(['do.create']) && $data->current_status == 'open')
                                    <td class="text-center"><input type="checkbox" name="items[]" value="{{$item->item_id}}"></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($data->status == 'opem')
                    <div class="row mt-3">
                        <div class="col-12 text-end">
                            <button class="btn btn-success shadow-sm rounded-sm" type="submit">Create Delivery Order</button>
                        </div>
                    </div>
                    @endif
                    <input type="hidden" name="ref_number" value="{{$data->random_id}}">
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
