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
                            <a class="nav-link btn btn-success create-new-button" style="width: fit-content;" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Client</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>COMPANY</th>
                                        <th>ADDRESS</th>
                                        <th>TELEPHONE</th>
                                        <th>PIC</th>
                                        <th>PIC CONTACT</th>
                                        <th>SERVICE</th>
                                        <th>SERVICE DETIL</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>NAME</th>
                                        <th>COMPANY</th>
                                        <th>ADDRESS</th>
                                        <th>TELEPHONE</th>
                                        <th>PIC</th>
                                        <th>PIC CONTACT</th>
                                        <th>SERVICE</th>
                                        <th>SERVICE DETIL</th>
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
                                        <td>{{$clients->name}}</td>
                                        <td>{{$clients->company_name}}</td>
                                        <td>{{$clients->address}}</td>
                                        <td>{{$clients->company_contact}}</td>
                                        <td>{{$clients->pic}}</td>
                                        <td>{{$clients->pic_contact}}</td>
                                        <td>{{$clients->service}}</td>
                                        <td>{{$clients->service_detil}}</td>
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

@endsection