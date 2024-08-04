@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Delivery Order'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th style="width:100px;" class="text-center"> No. </th>
                            @if(Auth::user()->getRoleNames()[0] != 'Supplier')
                                <th scope="col" class="text-center"> Supplier </th>
                            @endif
                            <th scope="col" class="text-center"> Delivery Number </th>
                            <th scope="col" class="text-center"> Create Date </th>
                            <th scope="col" class="text-center"> ETD </th>
                            <th scope="col" class="text-center"> ETA </th>
                            <th scope="col" class="text-center"> Status </th>
                            {{-- @if(is_null($data[0]->credit_terms_id) || is_null($data[0]->due_date))
                                <th scope="col" style="width:10%" class="text-center">Action</th>
                            @else
                                <th scope="col" class="text-center">Due Date</th>
                            @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index=>$item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            @if(Auth::user()->getRoleNames()[0] != 'Supplier')
                                <td> {{ $item->purchaseOrder->quotation->company->company_name }} </td>
                            @endif
                            <td> <a href="{{ './show/'.$item->random_id }}"> {{ $item->delivery_number }}</a></td>
                            <td class="text-center">{{ formatDate($item->date) }}</td>
                            <td class="text-center">{{ formatDate($item->etd) }}</td>
                            <td class="text-center">{{ formatDate($item->eta) }}</td>
                            <td class="text-center">{{ $item->current_status }}</td>
                            {{-- <td class="text-center">
                                @if(is_null($item->credit_terms_id) || is_null($item->due_date))
                                    <a href="{{ './create/'.$item->random_id }}" class="btn btn-success btn-sm me-2"><i class="fa fa-pencil-alt me-1"></i> EDIT</a>
                                @else
                                    {{ $item->due_date }}
                                @endif
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="UserDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserDetailsModalLabel">Tambah Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-2">
                    <form role="form" method="post" action="{{ route('item.store') }}">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="fw-bold">Item Code</label>
                                <input class="form-control" value="" name="item_code" type="text" inputmode="numeric" placeholder="item_code">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="fw-bold">Item Name</label>
                                <input class="form-control" value="" name="item_name" type="text" placeholder="item_name">
                            </div>
                        </div>
                        <hr>
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
