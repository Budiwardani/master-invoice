@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Master Terms'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                {{-- @if(Auth::user()->hasAnyPermission(['term.create'])) --}}
                <form>
                    <div class="input-group mb-3">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal_add" class="btn btn-primary me-2"><i class="fa fa-plus-circle me-2"></i> NEW</a>
                    </div>
                </form>
                {{-- @endif --}}
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th style="width:100px;" class="text-center"> No. </th>
                            <th scope="col" class="text-center"> Terms </th>
                            <th scope="col" style="width:10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terms as $index=>$term)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $term->name }}</td>
                            <td class="text-center">
                                <a href="{{ './delete/'.$term->random_id }}" class="btn btn-danger btn-sm me-2"><i class="fa fa-trash-alt me-1"></i> Delete </a>
                            </td>
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
                    <form role="form" method="post" action="{{ route('term.store') }}">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="fw-bold">Term Duration</label>
                                <input class="form-control" value="" name="value" type="text" inputmode="numeric" placeholder="Duration">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="fw-bold">Term Unit</label>
                                <select class="form-control" name="unit">
                                    <option value="week">Week</option>
                                    <option value="month">Month</option>
                                </select>
                                {{-- <input class="form-control" value="" name="value" type="text" inputmode="numeric" placeholder="Duration"> --}}
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="fw-bold">Term Condition</label>
                                <select class="form-control" name="condition">
                                    <option value="cur_date">After Current Date</option>
                                    <option value="eom">After End of Month</option>
                                </select>
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
