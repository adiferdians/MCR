<div class="input-split">
    <div class="col-lg-6">
        <input type="text" class="form-control" autocomplete="off" id="compID" value="{{ $certification ? $certification->client_id : $consultation->client_id}}" hidden>
        <div class="form-group">
            <label for="title">Company Name</label>
            <input type="text" class="form-control" autocomplete="off" id="compName" value="{{ $certification ? $certification->company_name : $consultation->company_name}}" placeholder="Company Name">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" autocomplete="off" id="address" value="{{ $certification ? $certification->address : $consultation->address}}" placeholder="Address"></input>
        </div>
        <div class="form-group">
            <label for="effective">PIC</label>
            <input type="text" class="form-control" autocomplete="off" id="pic" value="{{ $certification ? $certification->pic : $consultation->pic}}" placeholder="PIC">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="scope">Contact</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->company_contact : $consultation->company_contact}}" id="contact" placeholder="Contact"></input>
        </div>
        <div class="form-group">
            <label for="surveillance_1">PIC Contact</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->pic_contact : $consultation->pic_contact}}" id="picContact" placeholder="PIC Contact">
        </div>
        <div class="form-group">
            <label for="service">Service</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="service" style="color: wheat;">
                    <option {{ $certification ? ($certification->service === "Certification" ? "selected" : "") : ($consultation->service === "Certification" ? "selected" : "") }}>Certification</option>
                    <option {{ $certification ? ($certification->service === "Consultation" ? "selected" : "") : ($consultation->service === "Consultation" ? "selected" : "") }}>Consultation</option>
                </select>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="input-split" id="certificationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="address">Certification Agency</label>
            <input type="text" class="form-control" autocomplete="off" id="certificationAgency" value="{{ $certification ? $certification->agency : ''}}" placeholder="Certification Agency"></input>
        </div>
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="startDate" value="{{ $certification ? $certification->start_date : ''}}"></input>
        </div>
        <div class="form-group">
            <label for="surveillance_2">Status</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="status">
                    <option {{ $certification ? ($certification->status === "Active" ? "selected" : "") : ''}}>Active</option>
                    <option {{ $certification ? ($certification->status === "Withdraw" ? "selected" : "") : ''}}>Withdraw</option>
                    <option {{ $certification ? ($certification->status === "Suspended" ? "selected" : "") : ''}}>Suspended</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->notes : ''}}" id="Notes" placeholder="Notes"></input>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="surveillance_1">Surveillance 1</label>
            <input type="date" class="form-control" id="surveillance_1" value="{{ $certification ? $certification->surveillance_1 : ''}}">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Surveillance 2</label>
            <input type="date" class="form-control" id="surveillance_2" value="{{ $certification ? $certification->surveillance_2 : ''}}">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Count</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="count">
                    <option {{ $certification ? ($certification->count === "Certification" ? "selected" : "") : ''}}>Certification</option>
                    <option {{ $certification ? ($certification->count === "Consultation" ? "selected" : "") : ''}}>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notification</label>
            <input type="text" class="form-control" autocomplete="off" id="notification" value="{{ $certification ? $certification->notification : ''}}" placeholder="Notification"></input>
        </div>
    </div>
</div>

<hr>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="consultationServiceName">Service Name</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="consultationServiceName">
                    <option {{$consultation ? ($consultation->service === "Certification" ? "selected" : "") : ""}}>Certification</option>
                    <option {{$consultation ? ($consultation->service === "Consultation" ? "selected" : "") : ""}}>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="consultationStartDate">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="consultationStartDate" value="{{$consultation ? $consultation->start_date : ''}}"></input>
        </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="consultationStatus">Status</label>
                <div class="dropdown">
                    <select class="form-control custom-select" id="consultationStatus">
                        <option {{$consultation ? ($consultation->status === "On Progress" ? "selected" : "") : ''}}>On Progress</option>
                        <option {{$consultation ? ($consultation->status === "Pending" ? "selected" : "") : ''}}>Pending</option>
                        <option {{$consultation ? ($consultation->status === "Done" ? "selected" : "") : ''}}>Done</option>
                        <option {{$consultation ? ($consultation->status === "Overdue" ? "selected" : "") : ''}}>Overdue</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="consultationNotes">Notes</label>
                <input type="text" class="form-control" autocomplete="off" id="consultationNotes" placeholder="Notes" value="{{$consultation ? $consultation->notes : ''}}"></input>
            </div>
        </div>
    </div>
</div>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="close">Reset</button>
</div>

<script>
    $(document).ready(function() {
        $('#consultationForm').hide();
        $('#certificationForm').hide();
        const serviceVal = $('#service').val();
        if (serviceVal == "Certification") {
            $('#consultationForm').hide();
            $('#certificationForm').show();
        } else if (serviceVal == "Consultation") {
            $('#certificationForm').hide();
            $('#consultationForm').show();
        }

        $("#service").change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === "Certification") {
                $('#consultationForm').hide();
                $('#certificationForm').show();
            } else if (selectedValue === "Consultation") {
                $('#certificationForm').hide();
                $('#consultationForm').show();
            }
        });

        $("#close").click(function() {

        });
    });

    $('#send').click(function() {
        const id = $('#compID').val();
        const companyName = $('#compName').val();
        const address = $('#address').val();
        const pic = $('#pic').val();
        const picContact = $('#picContact').val();
        const contact = $('#contact').val();
        const service = $('#service').val();

        const serviceName = $('#serviceName').val();
        const agency = $('#certificationAgency').val();
        const startDate = $('#startDate').val();
        const status = $('#status').val();
        const notes = $('#Notes').val();

        const surveillance_1 = $('#surveillance_1').val();
        const surveillance_2 = $('#surveillance_2').val();
        const count = $('#count').val();
        const notification = $('#notification').val();

        const consultationName = $('#consultationServiceName').val();
        const consultationNotes = $('#consultationNotes').val();
        const consultationStartDate = $('#consultationStartDate').val();
        const consultationStatus = $('#consultationStatus').val();

        axios.post('/client/sendUpdate/' + id, {
            companyName,
            address,
            pic,
            picContact,
            contact,
            service,
            serviceName,
            agency,
            startDate,
            status,
            notes,
            surveillance_1,
            surveillance_2,
            count,
            notification,
            consultationName,
            consultationNotes,
            consultationStartDate,
            consultationStatus
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Sukses Menambahkan Data!',
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err,
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            })
        })
    })
</script>