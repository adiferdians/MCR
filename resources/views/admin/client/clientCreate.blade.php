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
            <label for="address">Project Name</label>
            <input type="text" class="form-control" autocomplete="off" id="projName" placeholder="Project Name"></input>
        </div>
        <div class="form-group">
            <label for="address">Start Project</label>
            <input type="date" class="form-control" autocomplete="off" id="startDate"></input>
        </div>
        <div class="form-group" id="certificationProject">
            <label for="surveillance_2">Project Detil</label>
            <div class="split-column">
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certStandard">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certBody">
                        <option disabled selected>Certification Body</option>
                        @foreach($certBody as $cert)
                        <option>{{ $cert->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" autocomplete="off" id="certPrice" placeholder="Input Price"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-success mr-2" id="addFromCertification">+</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switchBroker">
                <label class="form-check-label" style="color: white;" for="switchBroker">Use Broker</label>
            </div>
            <div class="split-column">
                <div class="dropdown col-lg-6">
                    <select class="form-control custom-select" id="brokerCertification" hidden>
                        <option disabled selected>Broker</option>
                        @foreach($broker as $option)
                        <option>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" autocomplete="off" id="brokerPriceCertification" placeholder="Input Price" hidden></input>
                </div>
            </div>
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
                    <option disabled selected>Select Surveillance Count</option>
                    <option value="1">Surveillance 1</option>
                    <option value="2">Surveillance 2</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <input type="text" class="form-control" autocomplete="off" id="notes" placeholder="Notes"></input>
        </div>
    </div>
</div>

<hr>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="address">Project Name</label>
            <input type="text" class="form-control" autocomplete="off" id="consProjName" placeholder="Project Name"></input>
        </div>
        <div class="form-group" id="consultationProject">
            <label for="surveillance_2">Project Detil</label>
            <div class="split-column">
                <div class="dropdown col-lg-6">
                    <select class="form-control custom-select" id="consStandard">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" autocomplete="off" id="consPrice" placeholder="Input Price"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-success mr-2" id="addFormConsultation">+</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switchBrokerConsultation">
                <label class="form-check-label" style="color: white;" for="switchBrokerConsultation">Use Broker</label>
            </div>
            <div class="split-column">
                <div class="dropdown col-lg-6">
                    <select class="form-control custom-select" id="brokerConsultation" hidden>
                        <option disabled selected>Broker</option>
                        @foreach($broker as $option)
                        <option>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" autocomplete="off" id="brokerPriceConsultation" placeholder="Input Price" hidden></input>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="consultationStartDate"></input>
        </div>
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

            $('#consultationForm').hide();
            $('#certificationForm').hide();
        });

        $('#switchBroker').on('click', function() {
            if (this.checked) {
                $('#brokerCertification').prop('hidden', false);
                $('#brokerPriceCertification').prop('hidden', false);
            } else {
                $('#brokerCertification').prop('hidden', true);
                $('#brokerPriceCertification').prop('hidden', true);
            }
        });

        $('#switchBrokerConsultation').on('click', function() {
            if (this.checked) {
                $('#brokerConsultation').prop('hidden', false);
                $('#brokerPriceConsultation').prop('hidden', false);
            } else {
                $('#brokerConsultation').prop('hidden', true);
                $('#brokerPriceConsultation').prop('hidden', true);
            }
        });

        var counter = 2;
        var maxExecutions = 5;

        $('#addFormConsultation').on('click', function() {
            if (counter < maxExecutions) {
                var htmlCode = `
                <div class="form-group" id="projDetil">
                    <div class="split-column">
                        <div class="dropdown col-lg-6">
                            <select class="form-control custom-select" id="consStandard_${counter}">
                                <option disabled selected>Standard</option>
                                @foreach($standard as $option)
                                <option>{{ $option->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" autocomplete="off" id="consPrice_${counter}" placeholder="Input Price"></input>
                        </div>
                    </div>
                </div>
                `;
                $('#consultationProject').after(htmlCode);
                counter++;
            } else {
                $('#addFormConsultation').prop('disabled', true);
            }
        });

        $('#addFromCertification').on('click', function() {
            if (counter < maxExecutions) {
                var htmlCode = `
                    <div class="form-group">
                        <div class="split-column">
                            <div class="dropdown col-lg-4">
                                <select class="form-control custom-select" id="certStandard_${counter}">
                                    <option disabled selected>Standard</option>
                                    @foreach($standard as $option)
                                    <option>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown col-lg-4">
                                <select class="form-control custom-select" id="certBody_${counter}">
                                    <option disabled selected>Certification Body</option>
                                    @foreach($certBody as $cert)
                                    <option>{{ $cert->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" autocomplete="off" id="certPrice_${counter}" placeholder="Input Price">
                            </div>
                        </div>
                    </div>
                `;
                $('#certificationProject').after(htmlCode);
                counter++;
            } else {
                $('#addFromCertification').prop('disabled', true);
            }
        });
    });

    $('#send').click(function() {
        const companyName = $('#compName').val();
        const address = $('#address').val();
        const pic = $('#pic').val();
        const picContact = $('#picContact').val();
        const contact = $('#contact').val();
        const service = $('#service').val();

        const projName = $('#projName').val();
        const startDate = $('#startDate').val();
        const certStandard = $('#certStandard').val();
        const certBody = $('#certBody').val();
        const certPrice = $('#certPrice').val();
        const certStandard_2 = $('#certStandard_2').val();
        const certBody_2 = $('#certBody_2').val();
        const certPrice_2 = $('#certPrice_2').val();
        const certStandard_3 = $('#certStandard_3').val();
        const certBody_3 = $('#certBody_3').val();
        const certPrice_3 = $('#certPrice_3').val();
        const certStandard_4 = $('#certStandard_4').val();
        const certBody_4 = $('#certBody_4').val();
        const certPrice_4 = $('#certPrice_4').val();
        const certStandard_5 = $('#certStandard_5').val();
        const certBody_5 = $('#certBody_5').val();
        const certPrice_5 = $('#certPrice_5').val();
        const brokerCertification = $('#brokerCertification').val();
        const brokerPriceCertification = $('#brokerPriceCertification').val();
        const notes = $('#notes').val();

        const surveillance_1 = $('#surveillance_1').val();
        const surveillance_2 = $('#surveillance_2').val();
        const count = $('#count').val();

        const consProjName = $('#consProjName').val();
        const consStandard = $('#consStandard').val();
        const consPrice = $('#consPrice').val();
        const consStandard_2 = $('#consStandard_2').val();
        const consPrice_2 = $('#consPrice_2').val();
        const consStandard_3 = $('#consStandard_3').val();
        const consPrice_3 = $('#consPrice_3').val();
        const consStandard_4 = $('#consStandard_4').val();
        const consPrice_4 = $('#consPrice_4').val();
        const consStandard_5 = $('#consStandard_5').val();
        const consPrice_5 = $('#consPrice_5').val();
        const brokerConsultation = $('#brokerConsultation').val();
        const brokerPriceConsultation = $('#brokerPriceConsultation').val();
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

            projName,
            startDate,
            certStandard,
            certBody,
            certPrice,
            certStandard_2,
            certBody_2,
            certPrice_2,
            certStandard_3,
            certBody_3,
            certPrice_3,
            certStandard_4,
            certBody_4,
            certPrice_4,
            certStandard_5,
            certBody_5,
            certPrice_5,
            brokerCertification,
            brokerPriceCertification,
            notes,
            surveillance_1,
            surveillance_2,
            count,

            consProjName,
            consStandard,
            consPrice,
            consStandard_2,
            consPrice_2,
            consStandard_3,
            consPrice_3,
            consStandard_4,
            consPrice_4,
            consStandard_5,
            consPrice_5,
            brokerConsultation,
            brokerPriceConsultation,
            consultationNotes,
            consultationStatus,
            consultationStartDate,
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Success! Data added successfully.',
                showConfirmButton: false,
                width: '400px',
                timer: 3000
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err.response.data.error.details,
                showConfirmButton: false,
                width: '400px',
                timer: 3000
            })
        })
    })
</script>