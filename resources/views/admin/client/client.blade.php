@extends('admin.layout.master')
@section('content')
@section('User', 'active')
@section('title', 'User')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Client Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-client">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link cursor active" id="certificationTab">Certifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="consultationTab">Consultation</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a class="nav-link btn btn-success create-new-button" id="addClient" style="width: fit-content;" data-toggle="dropdown" aria-expanded="false">+ Create New Client</a>
                            </div>
                        </div>
                        <div class="table-responsive" id="certifications">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CONTACT</th>
                                        <th>PIC</th>
                                        <th>AGENCY</th>
                                        <th>NOTES</th>
                                        <th>SRVLC 1</th>
                                        <th>SRVLC 2</th>
                                        <th>COUNT</th>
                                        <th>NOTIFICATION</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CONTACT</th>
                                        <th>PIC</th>
                                        <th>AGENCY</th>
                                        <th>NOTES</th>
                                        <th>SRVLC 1</th>
                                        <th>SRVLC 2</th>
                                        <th>COUNT</th>
                                        <th>NOTIFICATION</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($clientCertification as $certification)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updClient({{$certification->client_id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="detailClient({{$certification->client_id}})">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delClient({{$certification->client_id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$certification->company_name}}</td>
                                        <td>{{$certification->company_contact}}</td>
                                        <td>{{$certification->pic}}</td>
                                        <td>{{$certification->agency}}</td>
                                        <td>{{$certification->notes}}</td>
                                        <td>{{$certification->surveillance_1}}</td>
                                        <td>{{$certification->surveillance_2}}</td>
                                        <td>{{$certification->count}}</td>
                                        <td>{{$certification->notification}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn {{ $certification->status == 'active' ? 'btn-success' : ($certification->status == 'withdraw' ? 'btn-info' : 'btn-warning') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$certification->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('active', '{{$certification->client_id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('withdraw', '{{$certification->client_id}}')">Withdraw</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('suspended', '{{$certification->client_id}}')">suspended</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $clientCertification->appends(Request::all())->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="consultations">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CONTACT</th>
                                        <th>PIC</th>
                                        <th>SERVICE</th>
                                        <th>START DATE</th>
                                        <th>STATUS</th>
                                        <th>NOTES</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CONTACT</th>
                                        <th>PIC</th>
                                        <th>SERVICE</th>
                                        <th>START DATE</th>
                                        <th>STATUS</th>
                                        <th>NOTES</th>
                                    </tr>
                                </tfoot>
                                @foreach($clientConsultation as $consultation)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updClient({{$consultation->client_id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="detailClient({{$consultation->client_id}})">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delClient({{$consultation->client_id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$consultation->company_name}}</td>
                                        <td>{{$consultation->company_contact}}</td>
                                        <td>{{$consultation->pic}}</td>
                                        <td>{{$consultation->service}}</td>
                                        <td>{{$consultation->start_date}}</td>
                                        <td>{{$consultation->status}}</td>
                                        <td>{{$consultation->notes}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $clientConsultation->appends(Request::all())->links() }}
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
    $(document).ready(function() {
        $("#consultations").hide();
        $("#consultationTab").click(function() {
            $("#certifications").hide();
            $("#consultations").show();
            $("#consultationTab").addClass("active")
            $("#certificationTab").removeClass("active")
        });

        $("#certificationTab").click(function() {
            $("#certifications").show();
            $("#consultations").hide();
            $("#consultationTab").removeClass("active")
            $("#certificationTab").addClass("active")
        });
    });

    $('#addClient').click(function() {
        axios.get('/client/create')
            .then(function(response) {
                $('.modal-title').html("Add New Client");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function detailClient(id) {
        axios.get('/client/detail/' + id)
            .then(function(response) {
                $('.modal-title').html("Detail Client");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function updClient(id) {
        axios.get('/client/getUpdate/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Data Client");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    $("#modalClose").click(function() {
        $('#myModal').modal('hide');
    })


    function delClient(id) {
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
                axios.post('/client/delete/' + id)
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