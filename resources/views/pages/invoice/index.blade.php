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
                            @if($page == 'status')
                            <th scope="col" class="text-center"> Status </th>
                            @else
                            <th scope="col" class="text-center"> PO Number </th>
                            @endif
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
                            @if($page == 'status')
                                <td class="text-center">{{ $item->payment_status }}</td>
                            @else
                                <td class="text-center">{{ $item->ref_number }}</td>
                            @endif
                            <td class="text-center">
                                @if($page == 'status')
                                    <button class="btn btn-success shadow-sm rounded-sm" type="button" onclick="view({{ $item }})">View</button>
                                @else
                                    <form role="form" method="post" action="{{ route('invoice.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $item->random_id }}" name="random_id">
                                        <button class="btn btn-success shadow-sm rounded-sm" type="submit">Create Invoice</button>
                                    </form>
                                    {{-- <button class="btn btn-success shadow-sm rounded-sm" type="button" onclick="create({{ $item }})">Crete Invoice</button> --}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @if (Auth::user()->hasAnyPermission(['do.update']))
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-success shadow-sm rounded-sm" type="submit">SAVE</button>
                        <button class="btn btn-warning shadow-sm rouned-sm ms-3" type="reset">RESET</button>
                    </div>
                </div>
                @endif --}}
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
        console.log(data)
        if(!data.due_date || !data.invoice_number) {
            console.log('create');
            window.location.href = '/invoice/create/'+data.random_id
        } else {
            console.log('edit');
            window.location.href = '/invoice/edit/'+data.random_id
        }
    };

    function create(data) {
        axios.post('/invoice/store', {
            random_id: data.random_id
        })
        .then(function (response) {
            console.log(response.data);
            if(response.data.success == true) {
                Swal.fire({
                    title: 'Success!',
                    text: response.data.message,
                    icon: 'success'
                });
                window.location.href = '/invoice/create/'+response.data.data
            } else {
                Swal.fire({
                    title: 'Failed!',
                    text: response.data.message,
                    icon: 'errors'
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }
</script>
@endpush

@endsection
