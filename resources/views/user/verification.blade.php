<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MCR</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Add jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Add Axios CDN-->
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

    <!-- sweet alert -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="user-logo">
            <img class="logo" src="assets\images\logo\logo.png" alt="logo">
        </div>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="verif-container">
                    <div class="col-xl-4">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Input ID Certificate</h1>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Name" id="name" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Certificate Number" id="number" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-id-card"></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn create-new-button" id="send">Verif</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8" id="dataPeserta">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Certificate Information</h1>
                            </div>
                            <div class="card shadow mb-4 card-verif" id="sapi">
                                <div class="card-body">
                                    <table class="table table-responsive" id="dataTable" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>Standard</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail" class="table-detail">{{$certificate[0]['title']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Organization</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['name']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['address']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Certification Scope</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['scope']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Certification Number</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['number']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Certification Date</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['date']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Expiration Date</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['effective']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                @if(isset($certificate))
                                                <td class="table-detail">{{$certificate[0]['status']}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- page-body-wrapper ends -->
    </div>
</body>
<script>
    $('#send').click(function() {
        let name = $('#name').val();
        let number = $('#number').val();
        let newNumber = number.split("/");

        axios.post(`/`, {
            name,
            newNumber
        }).then((response) => {
            if (response.data.OUT_STAT) {
                Swal.fire({
                    title: response.data.MESSAGE,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    width: '400px',
                    timer: 1500
                }).then(function() {
                    var data = response.data.DATA;
                    var tableBody = $('#dataTable tbody');
                    tableBody.empty();
                    var row = '<tr>' +
                        '<td>' + "Standard" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.title + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Organization" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.name + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Address" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.address + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Scope" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.scope + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Number" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.number + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Date" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.date + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Expiration Date" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + data.effective + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Status" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td>' + data.status + '</td>' +
                        '</tr>';
                    tableBody.append(row);
                })
            } else {
                Swal.fire({
                    title: response.data.MESSAGE,
                    position: 'top-end',
                    icon: 'error',
                    showConfirmButton: false,
                    width: '400px',
                    timer: 1500
                }).then(function() {
                    var tableBody = $('#dataTable tbody');
                    tableBody.empty();
                    var row = '<tr>' +
                        '<td>' + "Standard" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Organization" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Address" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Scope" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Number" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Certification Date" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Expiration Date" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>' + '<tr>' +
                        '<td>' + "Status" + '</td>' +
                        '<td>' + ":" + '</td>' +
                        '<td  class="table-detail">' + '</td>' +
                        '</tr>';
                    tableBody.append(row);
                })
            }
        }).catch((err) => {
            Swal.fire({
                position: 'top-end',
                text: err,
                icon: 'error',
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            })
        })
    })
</script>

</html>