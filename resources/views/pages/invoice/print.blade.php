<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <title>
    PRINT
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.min.css " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PRINT</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            @media print {
                @page {
                    margin: 0;
                }

           body {
                    margin: 0;
                }
            }
        </style>
    </head>
    <body class="p-4 mt-2">
        <div>
            <h4><strong>{{ $data->quotation->company->company_name }}</strong></h4>
        </div>
        <hr>
        <div class="text-center align-middle">
            <strong>INVOICE</strong>
        </div>
        <div>
            <div>
                <div class="row mb-2">
                    <div class="col-4">
                        <div class="card p-2">
                            <h4>Quotation Data</h4>
                            <table>
                                <tr>
                                    <td>
                                        Ref Number
                                    </td>
                                    <td>
                                        {{ $data->quotation->ref_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Create Date
                                    </td>
                                    <td>
                                        {{ formatDate($data->quotation->created_at) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Supplier
                                    </td>
                                    <td>
                                        {{ $data->quotation->company->company_name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card p-2">
                            <h4>Purchase Order Data</h4>
                            <table>
                                <tr>
                                    <td>
                                        Ref Number
                                    </td>
                                    <td>
                                        {{ $data->purchaseOrder->ref_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Create Date
                                    </td>
                                    <td>
                                        {{ formatDate($data->purchaseOrder->created_at) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Due Date
                                    </td>
                                    <td>
                                        {{ formatDate($data->purchaseOrder->due_date) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card p-2">
                            <h4>Delivery Order Data</h4>
                            <table>
                                <tr>
                                    <td>
                                        Ref Number
                                    </td>
                                    <td>
                                        {{ $data->deliveryOrder->delivery_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Create Date
                                    </td>
                                    <td>
                                        {{ formatDate($data->deliveryOrder->created_at) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Update
                                    </td>
                                    <td>
                                        {{ formatDate($data->deliveryOrder->updated_at) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-6">
                                    Invoice Number
                                </div>
                                <div class="col-6">
                                    : {{ $data->invoice_number }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-6">
                                    Due Date
                                </div>
                                <div class="col-6">
                                    : {{ formatDate($data->due_date) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-bordered-last">
                    <thead>
                        <tr style="border-bottom: 3pt solid black;">
                            <th style="width:100px;" class="text-center"> No. </th>
                            <th scope="col" class="text-center"> Item Code </th>
                            <th scope="col" class="text-center"> Item Name </th>
                            <th scope="col" class="text-center"> Quantity </th>
                            <th scope="col" class="text-center"> Price </th>
                            <th scope="col" class="text-center"> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->detail as $index=>$item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->item_data->item_code }}</td>
                            <td>{{ $item->item_data->item_name }}</td>
                            <td class="text-end">
                                @foreach ($data->purchaseOrder->detail as $order)
                                    @if($order->item_id == $item->item_id)
                                        {{ formatNumber($order->quantity) }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-end">
                                @foreach ($data->purchaseOrder->detail as $order)
                                    @if($order->item_id == $item->item_id)
                                        {{ formatNumber($order->price) }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-end">
                                @foreach ($data->purchaseOrder->detail as $order)
                                    @if($order->item_id == $item->item_id)
                                        {{ formatNumber($order->price * $order->quantity) }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <input class="form-control" value="{{ $item->id }}" name="data[{{ $index }}][detail_id]" type="hidden" >
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-end"><strong>Total</strong></td>
                            <td class="text-end">{{ formatNumber($data->total) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end"><strong>TAX</strong></td>
                            <td class="text-end">{{ formatNumber(0.11 * $data->total) }}</td>
                        </tr>
                        <tr style="border-bottom: 3pt solid black;">
                            <td colspan="5" class="text-end"><strong>Grand Total</strong></td>
                            <td class="text-end">{{ formatNumber($data->total + (0.11 * $data->total)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <style>
        .table-bordered tbody tr {
            border: 3px solid black;
        }

        .bottom {
            border: 3px solid black;
        }

        /* tr {
            border-bottom: 3pt solid black;
        } */

        /* .table-bordered tbody tr td {
            border: 3px solid black;
        } */

        .table-bordered thead tr {
            border: 3px solid black;
        }

        .table-bordered thead tr th {
            border: 3px solid black;
        }
    </style>
    <script>
        $(document).ready(function($) {
            window.print();
        })
    </script>
    <style>
        /* Define border for last row */
        .table-bordered-last tbody tr:last-child {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</html>
