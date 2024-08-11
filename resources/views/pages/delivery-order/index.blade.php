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
                            {{-- @if(Auth::user()->getRoleNames()[0] == 'Supplier')
                                <th scope="col" class="text-center"> Action </th>
                            @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index=>$item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @if(Auth::user()->getRoleNames()[0] != 'Supplier')
                                    <td> {{ $item['company_name'] }} </td>
                                @endif
                                <td> <a href="{{ './show/'.$item['random_id'] }}"> {{ $item['delivery_number'] }}</a></td>
                                <td class="text-center">{{ formatDate($item['date']) }}</td>
                                <td class="text-center">{{ formatDate($item['etd']) }}</td>
                                <td class="text-center">{{ formatDate($item['eta']) }}</td>
                                <td class="text-center">
                                    @php
                                        switch($item['current_status'] ){
                                            case 'arrived' :
                                                echo '<span class="badge bg-success shadow border-0 ms-2 mb-2">Arived</span>';
                                            break;
                                            default :
                                                echo '<span class="badge bg-warning shadow border-0 ms-2 mb-2">on delivery</span>';
                                            break;
                                        }
                                    @endphp
                                </td>
                                {{-- @if(Auth::user()->getRoleNames()[0] == 'Supplier')
                                    <td class="text-center">
                                        @if($item['delivered'] == 'done' && $item['invoice'] == 'none')
                                        <form role="form" method="post" action="{{ route('invoice.store') }}">
                                            @csrf
                                            <input type="hidden" value="{{ $item['random_id'] }}" name="random_id">
                                            <button class="btn btn-success shadow-sm rounded-sm" type="submit">Create Invoice</button>
                                        </form>
                                        @endif
                                    </td>
                                @endif --}}
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
