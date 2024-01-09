@extends('admin.layout.master')
@section('content')
@section('Master', 'active')
@section('Collapse', 'show')
@section('User', 'active')
@section('title', 'Master Standard')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Standard Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-certificate">
                            <a class="nav-link btn create-new-button" style="width: fit-content;" id="addUser" data-toggle="dropdown" aria-expanded="false" 
                            {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}}>+ Create Standard</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>DIVISION</th>
                                        <th>NUMBER</th>
                                        <th>STATUS</th>
                                        <th>ROLE</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>DIVISION</th>
                                        <th>NUMBER</th>
                                        <th>STATUS</th>
                                        <th>ROLE</th>
                                    </tr>
                                </tfoot>
                                @foreach($data as $user)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="display: flex; justify-content: center;">
                                                <button class="btn btn-primary actBtn" {{ session('role') == 3 ? 'hidden' : ''}} title="Edit" id="update" onclick="updUser({{$user->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}} title="Hapus" onclick="delUser({{$user->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->division}}</td>
                                        <td>{{$user->number}}</td>
                                        <td>
                                            <div class="dropdown {{ session('role') == 3 ? 'disabled' : ''}}">
                                                <button class="btn {{ $user->status == 'Active' ? 'btn-success' : ($user->status == 'Withdraw' ? 'btn-warning' : 'btn-danger') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$user->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('Active', '{{$user->id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('Withdraw', '{{$user->id}}')">Withdraw</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('Suspended', '{{$user->id}}')">Suspended</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>@if($user->id_role == 1)
                                            Super Admin
                                            @elseif($user->id_role == 2)
                                            Admin
                                            @elseif($user->id_role == 3)
                                            Sales
                                            @elseif($user->id_role == 4)
                                            Operation
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $data->appends(Request::all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function changeStatus(status, id) {
        Swal.fire({
            title: 'Are you sure you want to change the User status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Change'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    axios.post('/user/changeStatus/' + id, {
                            status,
                        }).then(() => {
                            Swal.fire({
                                title: 'Success',
                                position: 'top-end',
                                icon: 'success',
                                text: 'Status Changed!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1600);
                        })
                        .catch((err) => {
                            Swal.fire({
                                title: 'Error',
                                position: 'top-end',
                                icon: 'error',
                                text: err,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                }
            }
        })
    };

    $("#modalCloseSM").click(function() {
        $('#modalSmall').modal('hide');
    })

    $('#addUser').click(function() {
        axios.get('/user/create')
            .then(function(response) {
                $('.modal-title').html("Add New User");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function updUser(id) {
        axios.get('/user/getUpdate/' + id)
            .then(function(response) {
                $('.modal-title').html("Update User");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function delUser(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "The deleted data cannot be recovered!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancle',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/user/delete/' + id)
                    .then(() => {
                        Swal.fire({
                            title: 'Success',
                            position: 'top-end',
                            icon: 'success',
                            text: 'Data deleted successfuly!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1600);
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: 'Error',
                            position: 'top-end',
                            icon: 'error',
                            text: err,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
            }
        });
    }

    $("#modalClose").click(function() {
        $('#myModal').modal('hide');
    })
</script>

@endsection