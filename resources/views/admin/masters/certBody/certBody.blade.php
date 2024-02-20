@extends('admin.layout.master')
@section('content')
@section('Master', 'active')
@section('Collapse', 'show')
@section('CertBody', 'active')
@section('title', 'Master Certification Body')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Certification Body Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-certificate">
                            <a class="nav-link btn create-new-button" style="width: fit-content;" id="addCertificateBody" data-toggle="dropdown" aria-expanded="false" 
                            {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}}>+ Create Certificate Body</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>Name</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($data as $certificationBody)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="display: flex; justify-content: center;">
                                                <button class="btn btn-primary actBtn" title="Edit" {{ session('role') == 3 ? 'hidden' : ''}} id="update" onclick="updCertificateBody({{$certificationBody->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" {{ (session('role') == 3 || session('role') == 2) ? 'hidden' : ''}} onclick="delCertificateBody({{$certificationBody->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$certificationBody->name}}</td>
                                        <td>
                                            <div class="dropdown {{ session('role') == 3 ? 'disabled' : ''}}">
                                                <button class="btn {{ $certificationBody->status == 'Active' ? 'btn-success' : 'btn-danger' }} dropdown-toggle actBtn" type="button" id="status"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$certificationBody->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('Active', '{{$certificationBody->id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('Inactive', '{{$certificationBody->id}}')">Inactive</button>
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
    function changeStatus(status, id) {
        Swal.fire({
            title: 'Are you sure you want to change the certificate status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Change'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    axios.post('/certification-body/changeStatus/' + id, {
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

    $('#addCertificateBody').click(function() {
        axios.get('/certification-body/create')
            .then(function(response) {
                $('.modal-title').html("Add New Certificate");
                $(".modal-dialog").removeClass("modal-xl").addClass("modal-md");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function updCertificateBody(id) {
        axios.get('/certification-body/getUpdate/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Certificate");
                $(".modal-dialog").removeClass("modal-xl").addClass("modal-md");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function delCertificateBody(id) {
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
                axios.post('/certification-body/delete/' + id)
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