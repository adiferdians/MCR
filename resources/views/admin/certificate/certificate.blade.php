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
                        <div class="add-new">
                            <a class="nav-link btn btn-success create-new-button" style="width: fit-content;" 
                            id="addCertificate" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Certificate</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>ORGANIZATION</th>
                                        <th>TITLE</th>
                                        <th>TYPE</th>
                                        <th>CERTIFICATE NUMBER</th>
                                        <th>SURVEILLANCE 1</th>
                                        <th>SURVEILLANCE 2</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>ORGANIZATION</th>
                                        <th>TITLE</th>
                                        <th>TYPE</th>
                                        <th>CERTIFICATE NUMBER</th>
                                        <th>SURVEILLANCE 1</th>
                                        <th>SURVEILLANCE 2</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($data as $certificate)
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <div style="display: flex;">
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updCertificate({{$certificate->id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="showQrCode('{{$certificate->number}}', '{{$certificate->name}}', '{{$certificate->id}}')">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delCertificate({{$certificate->id}})">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{$certificate->name}}</td>
                                        <td>{{$certificate->title}}</td>
                                        <td>{{$certificate->type}}</td>
                                        <td>{{$certificate->number}}</td>
                                        <td>{{$certificate->surveillance_1}}</td>
                                        <td>{{$certificate->surveillance_2}}</td>
                                        <td>{{$certificate->date}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn {{ $certificate->status == 'active' ? 'btn-success' : ($certificate->status == 'withdraw' ? 'btn-info' : 'btn-warning') }} dropdown-toggle actBtn" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$certificate->status}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="status" id="myDropdown">
                                                    <button class="dropdown-item" type="button" data-value="active" onclick="changeStatus('active', '{{$certificate->id}}')">Active</button>
                                                    <button class="dropdown-item" type="button" data-value="withdraw" onclick="changeStatus('withdraw', '{{$certificate->id}}')">Withdraw</button>
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
</script>

@endsection