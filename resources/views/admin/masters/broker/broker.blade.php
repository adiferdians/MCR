@extends('admin.layout.master')
@section('content')
@section('Master', 'active')
@section('Collapse', 'show')
@section('Broker', 'active')
@section('title', 'Master Broker')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Broker Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-certificate">
                            <a class="nav-link btn create-new-button" style="width: fit-content;" id="addBroker" data-toggle="dropdown" 
                            {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}}>+ Create Broker</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>TELEPHONE</th>
                                        <th>BANK</th>
                                        <th>BANK ACCOUNT NUMBER</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>Name</th>
                                        <th>TELEPHONE</th>
                                        <th>BANK</th>
                                        <th>BANK ACCOUNT NUMBER</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($data as $broker)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="display: flex; justify-content: center;">
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" {{ session('role') == 3 ? 'hidden' : ''}} onclick="updBroker({{$broker->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}} onclick="delBroker({{$broker->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$broker->name,  session('role')}}</td>
                                        <td>{{$broker->phone}}</td>
                                        <td>{{$broker->bank}}</td>
                                        <td>{{$broker->bank_number}}</td>
                                        <td>
                                            <div class="dropdown {{ session('role') == 3 ? 'disabled' : ''}}">
                                                <button class="btn {{ $broker->status == 'Active' ? 'btn-success' : ($broker->status == 'Withdraw' ? 'btn-warning' : 'btn-danger') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$broker->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('Active', '{{$broker->id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('Withdraw', '{{$broker->id}}')">Withdraw</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('Suspended', '{{$broker->id}}')">Suspended</button>
                                                </div>
                                            </div>
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
    $("#modalCloseSM").click(function() {
        $('#modalSmall').modal('hide');
    })

    $('#addBroker').click(function() {
        axios.get('/broker/create')
            .then(function(response) {
                $('.modal-title').html("Add New Broker");
                $(".modal-dialog").removeClass("modal-xl").addClass("modal-md");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function updBroker(id) {
        axios.get('/broker/getUpdate/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Broker");
                $(".modal-dialog").removeClass("modal-xl").addClass("modal-md");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function changeStatus(status, id) {
        Swal.fire({
            title: 'Are you sure you want to change the Client status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Change'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    axios.post('/broker/changeStatus/' + id, {
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
    
    function delBroker(id) {
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
                axios.post('/broker/delete/' + id)
                    .then(() => {
                        Swal.fire({
                            title: 'Success',
                            position: 'top-end',
                            icon: 'success',
                            text: 'Data deleted successfuly!',
                            showConfirmButton: false,
                            width: '400px',
                            timer: 3000
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
                            width: '400px',
                            timer: 3000
                        });
                    });
            }
        });
    }
</script>

@endsection