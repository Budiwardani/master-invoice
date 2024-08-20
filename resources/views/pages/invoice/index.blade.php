@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Invoice'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3 m-4">
            <div class="row gx-4">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:100px;" class="text-center"> No. </th>
                            <th scope="col" class="text-center"> Invoice Number </th>
                            <th scope="col" class="text-center"> Invoice Date </th>
                            <th scope="col" class="text-center"> Total </th>
                            <th scope="col" class="text-center"> Status </th>
                            <th scope="col" class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index=>$item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->invoice_number }}</td>
                            <td class="text-center">{{ formatDate($item->date) }}</td>
                            <td class="text-end">{{ formatNumber($item->total) }}</td>
                            <td class="text-center">{{ $item->payment_status }}</td>
                            <td class="text-center">
                                <button class="btn btn-success shadow-sm rounded-sm" type="button" onclick="view({{ $item }})">View</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (Auth::user()->hasAnyPermission(['do.update']))
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-success shadow-sm rounded-sm" type="submit">SAVE</button>
                        <button class="btn btn-warning shadow-sm rouned-sm ms-3" type="reset">RESET</button>
                    </div>
                </div>
                @endif
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

@push('js')
<script>
    function view(data){
        if(!data.due_date || !data.invoice_number) {
            console.log('create');
            window.location.href = '/invoice/create/'+data.random_id
        } else {
            console.log('edit');
            window.location.href = '/invoice/edit/'+data.random_id
        }
    };
</script>
@endpush

@endsection
