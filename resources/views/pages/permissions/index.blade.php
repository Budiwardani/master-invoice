@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Roles'])
    <div class="card shadow-lg mx-4 mt-8" id="user_info">
        <div class="card-body p-3">
            <div class="row gx-4">
                <form>
                    <div class="input-group mb-3">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal_add" class="btn btn-primary me-2"><i class="fa fa-plus-circle me-2"></i> NEW</a>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th scope="col" style="width:30%" class="text-center">Permission Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
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
        @include('layouts.footers.auth.footer')
    </div>
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="UserDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserDetailsModalLabel">Tambah Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-2">
                    <form role="form" method="post" action="{{ route('permission.store') }}">
                        @csrf
                        <div>
                            <label class="fw-bold">Permission Name</label>
                            <input class="form-control" value="" name="permission_name" type="text" placeholder="Permission Name">
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
@endsection
