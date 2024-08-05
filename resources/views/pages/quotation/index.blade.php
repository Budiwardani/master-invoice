@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Quotation'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                @if(Auth::user()->hasAnyPermission(['quotation.create']))
                <form>
                    <div class="input-group mb-3">
                        <a type="button" href="{{ route('quotation.create') }}" class="btn btn-primary me-2"><i class="fa fa-plus-circle me-2"></i> NEW</a>
                    </div>
                </form>
                @endif
                @if(count($data))
                    @if(Auth::user()->getRoleNames()[0] == 'Supplier')
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th style="width:100px;" class="text-center"> No. </th>
                                <th scope="col" class="text-center"> Item Code </th>
                                <th scope="col" class="text-center"> Item Name </th>
                                <th scope="col" class="text-center"> Price </th>
                                <th scope="col" class="text-center"> Status </th>
                                <th scope="col" style="width:10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index=>$item)
                                @foreach ($item->detail as $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $detail->item_data->item_code }}</td>
                                    <td>{{ $detail->item_data->item_name }}</td>
                                    <td class="text-end">{{ $detail->price }}</td>
                                    <td class="text-center">{{ $item->current_status }}</td>
                                    <td class="text-center">
                                        @if($item->current_status == 'waiting')
                                        <a href="{{ './delete/'.$item->random_id }}" class="btn btn-danger btn-sm me-2"><i class="fa fa-trash-alt me-1"></i> Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        @foreach ($data as $indx=>$d)
                        @if(count($d))
                        @php
                            $sanitizedIndex = preg_replace('/.[ ()=]/', '', $indx);
                            $isExpanded = ($indx == 0);
                        @endphp
                        <div class="accordion mb-2" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{ '#panelsStayOpen-collapseTwo'.$sanitizedIndex }}" aria-expanded="{{ $isExpanded ? 'true' : 'false' }}" aria-controls="{{ '#panelsStayOpen-collapseTwo'.$sanitizedIndex }}">
                                            &nbsp{{ $indx }}
                                        </button>
                                    <div id="{{ 'panelsStayOpen-collapseTwo'.$sanitizedIndex }}" class="accordion-collapse collapse {{ $isExpanded ? 'show' : '' }}">
                                        <div class="card-body" style="overflow-x:auto;">
                                            @foreach ($d as $key=>$details)
                                            <form role="form" method="post" action="{{ route('po.store') }}">
                                                @csrf
                                                Quotation : {{ $details->ref_number }}
                                                <table class="table table-striped table-bordered table-hover mb-2">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th style="width:100px;" class="text-center"> No. </th> --}}
                                                            <th scope="col" class="text-center"> Item Code </th>
                                                            <th scope="col" class="text-center"> Item Name </th>
                                                            <th scope="col" class="text-center"> Price </th>
                                                            <th scope="col" style="width:10%" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($details->detail as $detail)
                                                        <tr>
                                                            {{-- <td>{{ $key + 1 }}</td> --}}
                                                            <td>{{ $detail->item_data->item_code }}</td>
                                                            <td>{{ $detail->item_data->item_name }}</td>
                                                            <td class="text-end">{{ $detail->price }}</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" name="items[]" value="{{$detail->item_data->id}}/{{ $detail->price }}">
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="row mt-3">
                                                    <input value="{{ $d[0]->company_id }}" name="company_id" type="hidden">
                                                    <input value="{{ $details->random_id }}" name="ref_number" type="hidden">
                                                    <div class="col-12">
                                                        <button class="btn btn-success shadow-sm rounded-sm" type="submit">SAVE</button>
                                                        <button class="btn btn-warning shadow-sm rouned-sm ms-3" type="reset">RESET</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    @endif
                @endif
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
