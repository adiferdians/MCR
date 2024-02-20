@extends('admin.layout.master')
@section('content')
@section('Client', 'active')
@section('title', 'Client')
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
                                        <a class="nav-link active btn-client" style="cursor: pointer;" id="certificationTab">Certifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn-client" id="consultationTab">Consultation</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a class="nav-link btn create-new-button" id="addClient" style="width: fit-content;" data-toggle="dropdown" aria-expanded="false" {{ (session('role') == 2 || session('role') == 4) ? 'hidden' : ''}}>+ Create New Client Data</a>
                            </div>
                        </div>
                        <div class="table-responsive" id="certifications">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CERTIFICATION</th>
                                        <th>SURVEILLANCE</th>
                                        <th>NOTIFICATION</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CERTIFICATION</th>
                                        <th>SURVEILLANCE</th>
                                        <th>NOTIFICATION</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($clientCertification as $certification)
                                <tbody>
                                    <tr>
                                        <td style="width: 100px;">
                                            <div>
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updClient({{$certification->client_id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="detailClient({{$certification->client_id}})">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delClient({{$certification->client_id}})" {{ (session('role') == 2 || session('role') == 4) ? 'hidden' : ''}}>
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($certification->company_name, 40)}}</td>
                                        <td>{{ Str::limit($certification->name, 40) }}</td>
                                        <td>{{$certification->count == "1" ? "Srv 1" : "Srv 2" }}</td>
                                        <td>
                                            @php
                                            if($certification->count == 1) {
                                            $tanggalTarget = $certification->surveillance_1;
                                            } else {
                                            $tanggalTarget = $certification->surveillance_2;
                                            }

                                            $tanggalTarget_timestamp = strtotime($tanggalTarget);
                                            $waktuSekarang_timestamp = time();
                                            $selisih = $tanggalTarget_timestamp - $waktuSekarang_timestamp;

                                            if ($selisih > 0) {
                                            $hari = floor($selisih / (60 * 60 * 24));

                                            echo "$hari Days";
                                            } else {
                                            echo "Passed";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $jsonData = $certification->payment;

                                            if (!empty($jsonData)) {
                                            $dataArray = json_decode($jsonData, true);

                                            if (is_array($dataArray)) {
                                            $lastKeyWithValueNotNull = null;

                                            foreach ($dataArray as $key => $value) {
                                            if ($value !== null) {
                                            $lastKeyWithValueNotNull = $key;
                                            }
                                            }

                                            echo $lastKeyWithValueNotNull;
                                            } else {
                                            echo "Invalid JSON format";
                                            }
                                            } else {
                                            echo "Awaiting Payment";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            <button class="btn btn-warning actBtn" title="Edit" id="update" onclick="clientPayment({{$certification->client_id}})">
                                                <i class="mdi mdi-coin"></i>Payment
                                            </button>
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
                                        <th>CONSULTATION</th>
                                        <th>STAGE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ACTION</th>
                                        <th>COMPANY</th>
                                        <th>CONSULTATION</th>
                                        <th>STAGE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                                @foreach($clientConsultation as $consultation)
                                <tbody>
                                    <tr>
                                        <td style="width: 100px;">
                                            <div>
                                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updClient({{$consultation->client_id}})">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="detailClient({{$consultation->client_id}})">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delClient({{$consultation->client_id}})" {{ (session('role') == 2 || session('role') == 4) ? 'hidden' : ''}}>
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($consultation->company_name, 40) }}</td>
                                        <td>{{ Str::limit($consultation->name, 40) }}</td>
                                        <td>
                                            @php
                                            $jsonData = $consultation->stage;

                                            if (!empty($jsonData)) {
                                            $dataArray = json_decode($jsonData, true);

                                            if (is_array($dataArray)) {
                                            $lastKeyWithValueNotNull = null;

                                            foreach ($dataArray as $key => $value) {
                                            if ($value !== null) {
                                            $lastKeyWithValueNotNull = $key;
                                            }
                                            }

                                            echo $lastKeyWithValueNotNull;
                                            } else {
                                            echo "Invalid JSON format";
                                            }
                                            } else {
                                            echo "Not Started";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $jsonData = $consultation->payment;

                                            if (!empty($jsonData)) {
                                            $dataArray = json_decode($jsonData, true);

                                            if (is_array($dataArray)) {
                                            $lastKeyWithValueNotNull = null;

                                            foreach ($dataArray as $key => $value) {
                                            if ($value !== null) {
                                            $lastKeyWithValueNotNull = $key;
                                            }
                                            }

                                            echo $lastKeyWithValueNotNull;
                                            } else {
                                            echo "Invalid JSON format";
                                            }
                                            } else {
                                            echo "Awaiting Payment";
                                            }
                                            @endphp
                                        </td>
                                        <td class="act-right">
                                            <button class="btn btn-warning actBtn" title="Payment" onclick="clientPayment({{$consultation->client_id}})">
                                                <i class="mdi mdi-coin"></i>Payment
                                            </button>
                                            <button class="btn btn-light actBtn" title="Stage" onclick="clientProcess({{$consultation->client_id}})">
                                                <i class="mdi mdi-calendar-check"></i>Stage
                                            </button>
                                        </td>
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
    function consultation() {
        $("#certifications").hide();
        $("#consultations").show();
        $("#consultationTab").addClass("active")
        $("#certificationTab").removeClass("active")
    }

    function certification() {
        $("#certifications").show();
        $("#consultations").hide();
        $("#consultationTab").removeClass("active")
        $("#certificationTab").addClass("active")
    }

    function addFunctionToURL(funcName) {
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;
        searchParams.delete(funcName);
        searchParams.set(funcName, 'true');
        url.search = searchParams.toString();
        window.history.replaceState({}, '', url.href);
    }

    function removeParamFromURL(paramName) {
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;
        searchParams.delete(paramName);
        url.search = searchParams.toString();
        window.history.replaceState({}, '', url.href);
    }

    $("#consultationTab").click(function() {
        consultation();
        addFunctionToURL('consultation');
    });

    $("#certificationTab").click(function() {
        certification();
        removeParamFromURL('consultation');
    });

    function getConsultationValueFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('consultation');
    }

    const consultationValue = getConsultationValueFromURL();
    if (consultationValue) {
        consultation();
    } else {
        $("#consultations").hide();
    }

    $('#addClient').click(function() {
        axios.get('/client/create')
            .then(function(response) {
                $('.modal-title').html("Add New Client");
                $(".modal-dialog").removeClass("modal-md").addClass("modal-xl");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    function clientPayment(id) {
        axios.get('/client/payment/' + id)
            .then(function(response) {
                $('.modal-title').html("Payment Detail");
                $(".modal-dialog").removeClass("modal-xl").addClass("modal-md");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function clientProcess(id) {
        axios.get('/client/stage/' + id)
            .then(function(response) {
                $('.modal-title').html("Consultation Stage");
                $(".modal-dialog").removeClass("modal-md").addClass("modal-xl");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function detailClient(id) {
        axios.get('/client/detail/' + id)
            .then(function(response) {
                $('.modal-title').html("Detail Client");
                $(".modal-dialog").removeClass("modal-md").addClass("modal-xl");
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
                $(".modal-dialog").removeClass("modal-md").addClass("modal-xl");
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