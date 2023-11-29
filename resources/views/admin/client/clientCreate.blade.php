<div class="input-split">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="title">Company Name</label>
            <input type="text" class="form-control" autocomplete="off" id="compName" placeholder="Company Name">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" autocomplete="off" id="address" rows="3" placeholder="Address"></input>
        </div>
        <div class="form-group">
            <label for="effective">PIC</label>
            <input type="text" class="form-control" autocomplete="off" id="pic" placeholder="PIC">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="scope">Contact</label>
            <input type="text" class="form-control" autocomplete="off" id="contact" rows="4" placeholder="Contact"></input>
        </div>
        <div class="form-group">
            <label for="surveillance_1">PIC Contact</label>
            <input type="text" class="form-control" autocomplete="off" id="picContact" placeholder="PIC Contact">
        </div>
        <div class="form-group">
            <label for="service">Service</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="service">
                    <option disabled selected>Select a Services</option>
                    <option value="Certification">Certification</option>
                    <option value="Consultation">Consultation</option>
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
            <input type="text" class="form-control" autocomplete="off" id="certificationAgency" placeholder="Certification Agency"></input>
        </div>
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="startDate"></input>
        </div>
        <div class="form-group">
            <label for="surveillance_2">Status</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="status">
                    <option disabled selected>Select a Status</option>
                    <option>Active</option>
                    <option>Withdraw</option>
                    <option>Suspended</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <input type="text" class="form-control" autocomplete="off" id="notes" placeholder="Notes"></input>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="surveillance_1">Surveillance 1</label>
            <input type="date" class="form-control" id="surveillance_1">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Surveillance 2</label>
            <input type="date" class="form-control" id="surveillance_2">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Count</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="count">
                    <option disabled selected>Select a Count</option>
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notification</label>
            <input type="text" class="form-control" autocomplete="off" id="notification" rows="4" placeholder="Notification"></input>
        </div>
    </div>
</div>

<hr>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="surveillance_2">Service Name</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="consultationName">
                    <option disabled selected>Select a Services</option>
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="consultationStartDate"></input>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="surveillance_2">Status</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="consultationStatus">
                    <option disabled selected>Select a Status</option>
                    <option>On Progress</option>
                    <option>Pending</option>
                    <option>Done</option>
                    <option>Overdue</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control" autocomplete="off" id="consultationNotes" placeholder="Notes"></input>
        </div>
    </div>
</div>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="reset">Reset</button>
</div>

<script>
    $(document).ready(function() {
        $('#consultationForm').hide();
        $('#certificationForm').hide();

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

        $("#reset").click(function() {
            $("#idCompany").val('');
            $("#compName").val('');
            $("#address").val('');
            $("#pic").val('');
            $("#contact").val('');
            $("#picContact").val('');
            $("#service").val('Select a Services');

            $("#idCertification").val('');
            $("#serviceName").val('Select a Services');
            $("#certificationAgency").val('');
            $("#startDate").val('');
            $("#status").val('Select a Services');
            $("#Notes").val('');

            $("#idSurveillance").val('');
            $("#surveillance_1").val('');
            $("#surveillance_2").val('');
            $("#count").val('');
            $("#notification").val('');

            $('#consultationForm').hide();
            $('#certificationForm').hide();
        });
    });

    $('#send').click(function() {
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
        const notes = $('#notes').val();

        const surveillance_1 = $('#surveillance_1').val();
        const surveillance_2 = $('#surveillance_2').val();
        const count = $('#count').val();
        const notification = $('#notification').val();

        const consultationName = $('#consultationName').val();
        const consultationStartDate = $('#consultationStartDate').val();
        const consultationStatus = $('#consultationStatus').val();
        const consultationNotes = $('#consultationNotes').val();

        axios.post('/client/send', {
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
            consultationNotes, 
            consultationStatus, 
            consultationStartDate,
            consultationName
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