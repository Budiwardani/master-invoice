@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Purchase Order'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th style="width:100px;" class="text-center"> No. </th>
                            <th scope="col" class="text-center"> PO number </th>
                            <th scope="col" class="text-center"> Create Date </th>
                            <th scope="col" class="text-center"> Status </th>
                            {{-- <th scope="col" class="text-center"> Company </th> --}}
                            @if(count($return_arr))
                                <th scope="col" class="text-center">Due Date</th>
                                <th scope="col" class="text-center">Delivery Status</th>
                            @endif
                            @if(Auth::user()->getRoleNames()[0] == 'Supplier')
                                <th scope="col" class="text-center"> Action </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($return_arr as $index=>$item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td> <a href="{{ './show/'.$item['random_id'] }}"> {{ $item['po_number'] }}</a></td>
                            <td class="text-center">{{ formatDate($item['date']) }}</td>
                            <td class="text-center">{{ $item['status'] }}</td>
                            @if(count($return_arr))
                            <td class="text-center">
                                @if(is_null($item['credit_terms_id']) || is_null($item['due_date']))
                                    <a href="{{ './create/'.$item['random_id'] }}" class="btn btn-success btn-sm me-2"><i class="fa fa-pencil-alt me-1"></i> EDIT</a>
                                @else
                                    {{ $item['due_date'] }}
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    switch($item['delivered'] ){
                                        case 'done' :
                                            echo '<span class="badge bg-success shadow border-0 ms-2 mb-2">done</span>';
                                        break;
                                        default :
                                            echo '<span class="badge bg-warning shadow border-0 ms-2 mb-2">partially sent</span>';
                                        break;
                                    }
                                @endphp
                            </td>
                            @endif
                            @if(Auth::user()->getRoleNames()[0] == 'Supplier')
                                    <td class="text-center">
                                        @if($item['delivered'] == 'done' && $item['invoice'] == 'none')
                                        <form role="form" method="post" action="{{ route('invoice.store') }}">
                                            @csrf
                                            <input type="hidden" value="{{ $item['random_id'] }}" name="random_id">
                                            <button class="btn btn-success shadow-sm rounded-sm" type="submit">Create Invoice</button>
                                        </form>
                                        @elseif($item['delivered'] == 'done' && $item['invoice'] == 'exist')
                                            <a class="btn btn-primary shadow-sm rounded-sm" href="{{ '../invoice/show/'.$item['invoice_id'] }}"> show invoice </a>
                                        @endif
                                    </td>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
