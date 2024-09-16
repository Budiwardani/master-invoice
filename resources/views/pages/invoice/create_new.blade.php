@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Invoice'])
    <div class="mt-8">
        @if (count($data) > 0)
            <div class="card shadow-lg mx-4 mb-4" id="user_info">
                <div class="card-body p-3 m-4">
                    <form role="form" method="post" action="{{ route('invoice.store') }}">
                        <div class="row gx-4">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:100px;" class="text-center"> No. </th>
                                        <th scope="col" class="text-center"> PO Number </th>
                                        <th scope="col" class="text-center"> Delivery Number </th>
                                        <th scope="col" class="text-center"> Item Name </th>
                                        <th scope="col" class="text-center"> Quantity </th>
                                        <th scope="col" class="text-center"> Price </th>
                                        <th scope="col" class="text-center"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    @php $index = 0 @endphp
                                    @foreach ($item->deliveries as $index=>$delivery)
                                        @php $index = $index + 1 @endphp
                                        <tr>
                                            <td class="text-end">{{ $index }}</td>
                                            <td>{{ $delivery->delivery_number }}</td>
                                            <td>{{ $item->ref_number }}</td>
                                            <td>@foreach ($delivery->detail as $detail)[{{ $detail->item_data->item_code }}] {{ $detail->item_data->item_name }}<br>@endforeach</td>
                                            <td class="text-end">@foreach ($delivery->detail as $detail){{ formatNumber($detail->quantity) }}<br>@endforeach</td>
                                            <td class="text-end">
                                                @foreach ($delivery->detail as $detail)
                                                    @foreach ($item->detail as $itemDetail)
                                                        @if ($itemDetail->item_id == $detail->item_id)
                                                            {{ formatNumber($itemDetail->price) }}
                                                        @endif
                                                    @endforeach
                                                <br>@endforeach
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" name="items[]" value="{{$delivery->random_id}}" checked>
                                            </td>
                                        </tr>
                                    @endforeach
                                <input type="hidden" value="{{ $item->quotation->company_id }}" name="company_id">
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        @csrf
                        <input type="hidden" value="{{ $item->random_id }}" name="random_id">
                        <button class="btn btn-success shadow-sm rounded-sm" type="submit">Create Invoice</button>
                    </div>
                    </form>
                </div>
            </div>
        @else
            <h2 class="mx-4 mb-4">No data to create new Invoice</h2>
        @endif

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
