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
            <label for="address">Project Name</label>
            <input type="text" class="form-control" autocomplete="off" id="certificationProjectName" value="{{ $certification ? $certification->name : ''}}" placeholder="Project Name"></input>
        </div>
        <div class="form-group">
            <label for="address">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="startDate" value="{{ $certification ? $certification->start_date : ''}}"></input>
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
                    <select class="form-control custom-select" id="brokerCertification">
                        <option disabled selected>Broker</option>
                        @foreach($broker as $option)
                        <option {{$certification ? ($certification->broker === $option->name ? "selected" : "") : ""}}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" autocomplete="off" id="brokerPriceCertification" value="{{ $certification ? $certification->broker_price : ''}}" placeholder="Input Price"></input>
                </div>
            </div>
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
                    <option {{ $certification ? ($certification->count === "1" ? "selected" : "") : ''}} value="1">Surveillance 1</option>
                    <option {{ $certification ? ($certification->count === "2" ? "selected" : "") : ''}} value="2">Surveillance 2</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="scope">Notes</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->notes : ''}}" id="notes" placeholder="Notes"></input>
        </div>
    </div>
</div>

<hr>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="scope">Project Name</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $consultation ? $consultation->name : ''}}" id="projName" placeholder="Project Name"></input>
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
                    <select class="form-control custom-select" id="brokerConsultation">
                        <option disabled selected>Broker</option>
                        @foreach($broker as $option)
                        <option {{$consultation ? ($consultation->broker === $option->name ? "selected" : "") : ""}}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" autocomplete="off" id="brokerPriceConsultation" placeholder="Input Price" value="{{ $consultation ? $consultation->broker_price : ''}}"></input>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="consultationStartDate">Start Date</label>
            <input type="date" class="form-control" autocomplete="off" id="consultationStartDate" value="{{$consultation ? $consultation->start_date : ''}}"></input>
        </div>
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

        if ($('#brokerConsultation').val() !== null) {
            $('#switchBrokerConsultation').prop('checked', true)
            $('#brokerConsultation').prop('hidden', false);
            $('#brokerPriceConsultation').prop('hidden', false);
        } else {
            $('#brokerConsultation').prop('hidden', true);
            $('#brokerPriceConsultation').prop('hidden', true);
        }

        if ($('#brokerCertification').val() !== null) {
            $('#switchBroker').prop('checked', true)
            $('#brokerCertification').prop('hidden', false);
            $('#brokerPriceCertification').prop('hidden', false);
        } else {
            $('#brokerCertification').prop('hidden', true);
            $('#brokerPriceCertification').prop('hidden', true);
        }

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
        const id = $('#compID').val();
        const companyName = $('#compName').val();
        const address = $('#address').val();
        const pic = $('#pic').val();
        const picContact = $('#picContact').val();
        const contact = $('#contact').val();
        const service = $('#service').val();

        const projName = $('#certificationProjectName').val();
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

        let brokerPriceCertification, brokerCertification;
        if (!$('#switchBroker').prop('checked')) {
            brokerPriceCertification = $('#brokerPriceCertification').val('');
            brokerCertification = $('#brokerCertification').val('');
            if (typeof brokerPriceCertification !== 'string') {
                brokerPriceCertification = '';
            }

            if (typeof brokerCertification !== 'string') {
                brokerCertification = '';
            }
        } else {
            brokerPriceCertification = $('#brokerPriceCertification').val();
            brokerCertification = $('#brokerCertification').val();
        }
        
        const surveillance_1 = $('#surveillance_1').val();
        const surveillance_2 = $('#surveillance_2').val();
        const count = $('#count').val();
        const notes = $('#notes').val();

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

        let brokerPriceConsultation, brokerConsultation;
        if (!$('#switchBrokerConsultation').prop('checked')) {
            brokerPriceConsultation = $('#brokerPriceConsultation').val('');
            brokerConsultation = $('#brokerConsultation').val('');
            if (typeof brokerPriceConsultation !== 'string') {
                brokerPriceConsultation = '';
            }

            if (typeof brokerConsultation !== 'string') {
                brokerConsultation = '';
            }
        } else {
            brokerPriceConsultation = $('#brokerPriceConsultation').val();
            brokerConsultation = $('#brokerConsultation').val();
        }

        console.log(brokerConsultation, brokerPriceConsultation);

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
                text: 'Success! Data updated successfully.',
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