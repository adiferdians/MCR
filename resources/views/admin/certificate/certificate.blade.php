@extends('admin.layout.master')
@section('content')
@section('Certificate', 'active')
@section('title', 'Certificate')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Certificate Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-certificate">
                            <a class="nav-link btn create-new-button" style="width: fit-content;" id="addCertificate" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Certificate</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>ORGANIZATION</th>
                                        <th>TITLE</th>
                                        <th>CERTIFICATE NUMBER</th>
                                        <th>SURVEILLANCE 1</th>
                                        <th>SURVEILLANCE 2</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>ORGANIZATION</th>
                                        <th>TITLE</th>
                                        <th>CERTIFICATE NUMBER</th>
                                        <th>SURVEILLANCE 1</th>
                                        <th>SURVEILLANCE 2</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($data as $certificate)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="display: flex; justify-content: center;">
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updCertificate({{$certificate->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="showQrCode('{{$certificate->number}}', '{{$certificate->name}}', '{{$certificate->id}}')">
                                                    <i class="mdi mdi-qrcode-scan"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delCertificate({{$certificate->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$certificate->name}}</td>
                                        <td>{{$certificate->title}}</td>
                                        <td>{{$certificate->number}}</td>
                                        <td>{{$certificate->surveillance_1}}</td>
                                        <td>{{$certificate->surveillance_2}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn {{ $certificate->status == 'active' ? 'btn-success' : ($certificate->status == 'withdraw' ? 'btn-warning' : 'btn-danger') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$certificate->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('active', '{{$certificate->id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('withdraw', '{{$certificate->id}}')">Withdraw</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('suspended', '{{$certificate->id}}')">suspended</button>
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
                    axios.post('/certificate/changeStatus/' + id, {
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

    function showQrCode(number, name, id) {
        let newNumber = number.replace(new RegExp("/", "g"), "");

        axios.get(`/certificate/qrcode/${newNumber}`)
            .then(function({
                data
            }) {
                $('.modal-title').html(`${name}`);
                $('.modal-body').html(`<div class='text-center'>
                <div>
                    <img width='300' height='auto' src='data:image/svg+xml;base64,${data.DATA}' />
                </div><br>
                    <div>
                        <a href='data:image/svg+xml;base64,${data.DATA}' class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" download=${name}>
                        <i class="fas fa-download"></i>  Download QR Code</a>
                    </div>
                </div>`);
                $('#modalSmall').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    $('#addCertificate').click(function() {
        axios.get('/certificate/create')
            .then(function(response) {
                $('.modal-title').html("Add New Certificate");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function updCertificate(id) {
        axios.get('/certificate/getUpdate/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Certificate");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function delCertificate(id) {
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
                axios.post('/certificate/delete/' + id)
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