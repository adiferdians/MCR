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
                        <div class="add-new">
                            <a class="nav-link btn btn-success create-new-button" id="addClient" style="width: fit-content;" data-toggle="dropdown" aria-expanded="false">+ Create New Client</a>
                        </div>
                        <div class="table-responsive">
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
                                @foreach($client as $clients)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updCertificate({{$clients->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="showQrCode('{{$clients->number}}', '{{$clients->name}}', '{{$clients->id}}')">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delCertificate({{$clients->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$clients->company_name}}</td>
                                        <td>{{$clients->company_contact}}</td>
                                        <td>{{$clients->pic}}</td>
                                        <td>{{$clients->agency}}</td>
                                        <td>{{$clients->notes}}</td>
                                        <td>{{$clients->surveillance_1}}</td>
                                        <td>{{$clients->surveillance_2}}</td>
                                        <td>{{$clients->count}}</td>
                                        <td>{{$clients->notification}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn {{ $clients->status == 'active' ? 'btn-success' : ($clients->status == 'withdraw' ? 'btn-info' : 'btn-warning') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$clients->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('active', '{{$clients->client_id}}')">Active</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('withdraw', '{{$clients->client_id}}')">Withdraw</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item" type="button" data-value="draft" onclick="changeStatus('suspended', '{{$clients->client_id}}')">suspended</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#addClient').click(function() {
        axios.get('/client/create')
            .then(function(response) {
                $('.modal-title').html("Add New Certificate");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    $("#modalClose").click(function() {
        $('#myModal').modal('hide');
    })
</script>

@endsection