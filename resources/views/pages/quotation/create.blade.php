@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Quotation'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <form role="form" method="post" action="{{ route('quotation.store') }}">
                    @csrf
                    <div class="col-md-6"><button type="button" class="btn btn-success mt-2" onclick="addRow()"><i class="fa fa-plus me-2"></i>Add Row</button></div>
                    <div class="row">
                        <div class="col-md-6"><label class="fw-bold">Due Date</label><input class="form-control" value="" name="due_date" type="date" placeholder="Ref Number" inputmode="numeric" required></div>
                        <div class="col-md-6"><label class="fw-bold">Ref No</label><input class="form-control" value="" name="ref_no" type="text" placeholder="Ref Number" inputmode="numeric" required></div>
                    </div>
                    <div id="input-container">
                        <div id="rows-container">
                            <!-- Rows will be dynamically added here -->
                        </div>
                    </div>
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
<script>
    let rowCount = 0;

    function addRow() {
        const container = document.getElementById('input-container');
        const row = document.createElement('div');
        row.className = 'row mb-3';
        row.innerHTML = `
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="fw-bold">Item Name</label>
                    <select name="input[${rowCount}][item_code]" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($datas as $option)
                            <option value="{{ $option->id }}">[{{ $option->item_code }}] {{ $option->item_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Quantity</label>
                    <input class="form-control price" name="input[${rowCount}][quantity]" type="text" placeholder="Quantity" inputmode="numeric" onkeyup="format_num_array('price')" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Price</label>
                    <input class="form-control price" name="input[${rowCount}][price]" type="text" placeholder="Price" inputmode="numeric" onkeyup="format_num_array('price')" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="fw-bold">Remove</label>
                    <div>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa fa-trash me-2"></i>Remove Row</button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(row);
        rowCount++;
    }

    function removeRow(button) {
        const row = button.closest('.row');
        if (row) {
            row.parentNode.removeChild(row);
        }
    }
</script>

@endsection
