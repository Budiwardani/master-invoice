@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Management'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <form role="form" method="post" action="{{ route('quotation.store') }}">
                    @csrf
                    <div class="col-md-6"><button type="button" class="btn btn-success mt-2" id="add-row"><i class="fa fa-plus me-2"></i>Add Row</button></div>
                    <div class="row">
                        <div class="col-md-6"><label class="fw-bold">Due Date</label><input class="form-control" value="" name="due_date" type="date" placeholder="Ref Number" inputmode="numeric"></div>
                        <div class="col-md-6"><label class="fw-bold">Ref No</label><input class="form-control" value="" name="ref_no" type="text" placeholder="Ref Number" inputmode="numeric"></div>
                    </div>
                    <div id="input-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">Item Name</label>
                                    <select name="options[]" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($datas as $option)
                                            <option value="{{ $option->id }}">[{{ $option->item_code }}] {{ $option->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="fw-bold">Price</label>
                                    <input class="form-control" value="" name="price[]" type="number" placeholder="Price" inputmode="numeric">
                                </div>
                            </div>
                            {{-- <div class="col-md-2 align-center">
                                <div class="mb-3 ms-2">
                                    <button type="button" class="btn btn-lg btn-danger mt-2" onclick="removeRow(this)"><i class="fa fa-trash me-2"></i>Remove</button>
                                </div>
                            </div> --}}
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
    // JavaScript to handle adding new rows
    const datas = <?php echo json_encode($datas); ?>; // Pass PHP array to JavaScript

    document.getElementById('add-row').addEventListener('click', function() {
        const inputContainer = document.getElementById('input-container');
        const newRow = document.createElement('div');
        newRow.classList.add('row');
        // <div class="col-md-6">
        //                         <div class="mb-3">
        //                             <label class="fw-bold">Item Name</label>
        //                             <select name="options[]" class="form-control">
        //                                 <option value="">Select One</option>
        //                                 @foreach ($datas as $option)
        //                                     <option value="{{ $option->id }}">[{{ $option->item_code }}] {{ $option->item_name }}</option>
        //                                 @endforeach
        //                             </select>
        //                         </div>
        //                     </div>
        //                     <div class="col-md-4">
        //                         <div class="mb-3">
        //                             <label class="fw-bold">Price</label>
        //                             <input class="form-control" value="" name="price" type="number" placeholder="Price" inputmode="numeric">
        //                         </div>
        //                     </div>
        //                     <div class="col-md-2 align-center">
        //                         <div class="mb-3 ms-2">
        //                             <button type="button" class="btn btn-lg btn-danger mt-2" onclick="removeRow(this)"><i class="fa fa-trash me-2"></i>Remove</button>
        //                         </div>
        //                     </div>
        let selectHTML = `<div class="col-md-6"><div class="mb-3"><label class="fw-bold">Item Name</label>
                <select name="options[]" class="form-control">
                    <option value="">Select One</option>`;
        datas.forEach(option => {
            selectHTML += `<option value="${option.id}">[${option.item_code}] ${option.item_name}</option>`;
        });
        selectHTML += '</select></div></div>';
        selectHTML += `<div class="col-md-4">
                <div class="mb-3">
                    <label class="fw-bold">Price</label>
                    <input class="form-control" value="" name="price[]" type="number" placeholder="Price" inputmode="numeric">
                </div>
            </div>`;
        // selectHTML += `<div class="col-md-2 align-center">
        //         <div class="mb-3 ms-2">
        //             <button type="button" class="btn btn-lg btn-danger mt-2" onclick="removeRow(this)"><i class="fa fa-trash me-2"></i>Remove</button>
        //         </div>
        //     </div>`;

        // newRow.innerHTML = `${selectHTML} <button type="button" onclick="removeRow(this)">Remove</button>`;
        newRow.innerHTML = `${selectHTML}`;
        console.log(newRow)
        console.log(options)
        inputContainer.appendChild(newRow);
    });

    // JavaScript to handle removing a row
    function removeRow(button) {
        const row = button.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

@endsection