<div class="input-split">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="type">ID Company</label>
            <input type="text" class="form-control" autocomplete="off" id="idCompany" placeholder="ID Company">
        </div>
        <div class="form-group">
            <label for="title">Company Name</label>
            <input type="text" class="form-control" autocomplete="off" id="compName" placeholder="Company Name">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" autocomplete="off" id="address" rows="3" placeholder="Address"></textarea>
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
                <select class="form-control" id="service">
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
            <label for="type">ID Certification</label>
            <input type="text" class="form-control" autocomplete="off" id="idCertification" placeholder="ID Certification">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Service Name</label>
            <div class="dropdown">
                <select class="form-control" id="serviceName">
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
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
                <select class="form-control" id="status">
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <textarea class="form-control" autocomplete="off" id="Notes" rows="2" placeholder="Notes"></textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="type">ID Surveillance</label>
            <input type="text" class="form-control" autocomplete="off" id="idSurveillance" placeholder="ID Surveillance">
        </div>
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
                <select class="form-control" id="Count">
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
            <label for="type">ID Certification</label>
            <input type="text" class="form-control" autocomplete="off" id="idCertification" placeholder="ID Certification">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Service Name</label>
            <div class="dropdown">
                <select class="form-control" id="serviceName">
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="startDate"></input>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="surveillance_2">Status</label>
            <div class="dropdown">
                <select class="form-control" id="status">
                    <option>Certification</option>
                    <option>Consultation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <textarea class="form-control" autocomplete="off" id="Notes" rows="2" placeholder="Notes"></textarea>
        </div>
    </div>
</div>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="close">Cancel</button>
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

        $("#close").change(function() {
            $('#myModal').modal('hide');
        });
    });
</script>