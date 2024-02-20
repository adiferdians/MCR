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
            <label for="scope">Number</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->company_contact : $consultation->company_contact}}" id="contact" placeholder="Number"></input>
        </div>
        <div class="form-group">
            <label for="surveillance_1">Email</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->pic_contact : $consultation->pic_contact}}" id="picContact" placeholder="Email">
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
                        <option {{ (isset($certificationProject['Certification Standard']) && $certificationProject['Certification Standard'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certBody">
                        <option disabled selected>Body</option>
                        @foreach($certBody as $option)
                        <option {{ (isset($certificationProject['Certification Body']) && $certificationProject['Certification Body'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" autocomplete="off" id="certPrice" placeholder="Input Price" value="{{(!empty($certificationProject['Certification Price']) ? $certificationProject['Certification Price'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-success mr-2" id="addFromCertification">+</button>
                </div>
            </div>
        </div>

        <div class="form-group" id="C2" {{ isset($certificationProject['Certification Standard 2']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certStandard_2">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $index => $option)
                        <option {{ (isset($certificationProject['Certification Standard 2']) && $certificationProject['Certification Standard 2'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certBody_2">
                        <option disabled selected>Body</option>
                        @foreach($certBody as $option)
                        <option {{ (isset($certificationProject['Certification Body 2']) && $certificationProject['Certification Body 2'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" autocomplete="off" id="certPrice_2" placeholder="Input Price" value="{{(!empty($certificationProject['Certification Price 2']) ? $certificationProject['Certification Price 2'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideC2">-</button>
                </div>
            </div>
        </div>
        <div class="form-group" id="C3" {{ isset($certificationProject['Certification Standard 3']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certStandard_3">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option {{ (isset($certificationProject['Certification Standard 3']) && $certificationProject['Certification Standard 3'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certBody_3">
                        <option disabled selected>Body</option>
                        @foreach($certBody as $option)
                        <option {{ (isset($certificationProject['Certification Body 3']) && $certificationProject['Certification Body 3'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" autocomplete="off" id="certPrice_3" placeholder="Input Price" value="{{(!empty($certificationProject['Certification Price 3']) ? $certificationProject['Certification Price 3'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideC3">-</button>
                </div>
            </div>
        </div>
        <div class="form-group" id="C4" {{ isset($certificationProject['Certification Standard 4']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certStandard_4">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option {{ (isset($certificationProject['Certification Standard 4']) && $certificationProject['Certification Standard 4'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown col-lg-4">
                    <select class="form-control custom-select" id="certBody_4">
                        <option disabled selected>Body</option>
                        @foreach($certBody as $option)
                        <option {{ (isset($certificationProject['Certification Body 4']) && $certificationProject['Certification Body 4'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" autocomplete="off" id="certPrice_4" placeholder="Input Price" value="{{(!empty($certificationProject['Certification Price 4']) ? $certificationProject['Certification Price 4'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideC4">-</button>
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
</div>

<hr>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="scope">Project Name</label>
            <input type="text" class="form-control" autocomplete="off" value="{{ $consultation ? $consultation->name : ''}}" id="consProjName" placeholder="Project Name"></input>
        </div>
        <div class="form-group" id="certificationProject">
            <label for="surveillance_2">Project Detil</label>
            <div class="split-column">
                <div class="dropdown col-lg-5">
                    <select class="form-control custom-select" id="consStandard">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option {{ (isset($consultationProject['Consultation Standard']) && $consultationProject['Consultation Standard'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" autocomplete="off" id="consPrice" placeholder="Input Price" value="{{(!empty($consultationProject['Consultation Price']) ? $consultationProject['Consultation Price'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-success mr-2" id="addFromConsultation">+</button>
                </div>
            </div>
        </div>

        <div class="form-group" id="p2" {{ isset($consultationProject['Consultation Standard 2']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-5">
                    <select class="form-control custom-select" id="consStandard_2">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $index => $option)
                        <option {{ (isset($consultationProject['Consultation Standard 2']) && $consultationProject['Consultation Standard 2'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" autocomplete="off" id="consPrice_2" placeholder="Input Price" value="{{(!empty($consultationProject['Consultation Price 2']) ? $consultationProject['Consultation Price 2'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideP2">-</button>
                </div>
            </div>
        </div>
        <div class="form-group" id="p3" {{ isset($consultationProject['Consultation Standard 3']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-5">
                    <select class="form-control custom-select" id="consStandard_3">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option {{ (isset($consultationProject['Consultation Standard 3']) && $consultationProject['Consultation Standard 3'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" autocomplete="off" id="consPrice_3" placeholder="Input Price" value="{{(!empty($consultationProject['Consultation Price 3']) ? $consultationProject['Consultation Price 3'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideP3">-</button>
                </div>
            </div>
        </div>
        <div class="form-group" id="p4" {{ isset($consultationProject['Consultation Standard 4']) ? "" : "hidden" }}>
            <div class="split-column">
                <div class="dropdown col-lg-5">
                    <select class="form-control custom-select" id="consStandard_4">
                        <option disabled selected>Standard</option>
                        @foreach($standard as $option)
                        <option {{ (isset($consultationProject['Consultation Standard 4']) && $consultationProject['Consultation Standard 4'] == $option->name) ? "selected" : "" }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" autocomplete="off" id="consPrice_4" placeholder="Input Price" value="{{(!empty($consultationProject['Consultation Price 4']) ? $consultationProject['Consultation Price 4'] : "")}}"></input>
                </div>
                <div class="col-lg-1 add-btn">
                    <button class="btn btn-danger mr-2" id="hideP4">-</button>
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
</div>
</div>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="close">Close</button>
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

        $("#close").click(function() {
            $("#myModal").modal('hide');
        });

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

        var counterConsultation = 2;
        var maxExecutionsConsultation = 5;

        $('#hideP2').on('click', function() {
            $(`#p2`).prop('hidden', true);
            counterConsultation--;
            $('#addFromConsultation').prop('disabled', false);
        });
        $('#hideP3').on('click', function() {
            $(`#p3`).prop('hidden', true);
            counterConsultation--;
            $('#addFromConsultation').prop('disabled', false);
        });
        $('#hideP4').on('click', function() {
            $(`#p4`).prop('hidden', true);
            counterConsultation--;
            $('#addFromConsultation').prop('disabled', false);
        });

        $('#addFromConsultation').on('click', function() {
            console.log(counterConsultation);
            if (counterConsultation < maxExecutionsConsultation) {
                var newId = `p${counterConsultation}`;
                $(`#${newId}`).prop('hidden', false);
                counterConsultation++;
            } else {
                $('#addFromConsultation').prop('disabled', true);
            }
        });

        var counterCertification = 2;
        var maxExecutionsCertification = 5;
        $('#hideC2').on('click', function() {
            $(`#C2`).prop('hidden', true);
            counterCertification--;
            $('#addFromCertification').prop('disabled', false);
        });
        $('#hideC3').on('click', function() {
            $(`#C3`).prop('hidden', true);
            counterCertification--;
            $('#addFromCertification').prop('disabled', false);
        });
        $('#hideC4').on('click', function() {
            $(`#C4`).prop('hidden', true);
            counterCertification--;
            $('#addFromCertification').prop('disabled', false);
        });

        $('#addFromCertification').on('click', function() {
            if (counterCertification < maxExecutionsCertification) {
                var newId = `C${counterCertification}`;
                $(`#${newId}`).prop('hidden', false);
                counterCertification++;
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

        const consProjName = $('#consProjName').val();
        const consStandard = $('#consStandard').val();
        const consPrice = $('#consPrice').val();
        const consStandard_2 = $('#consStandard_2').val();
        const consPrice_2 = $('#consPrice_2').val();
        const consStandard_3 = $('#consStandard_3').val();
        const consPrice_3 = $('#consPrice_3').val();
        const consStandard_4 = $('#consStandard_4').val();
        const consPrice_4 = $('#consPrice_4').val();

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

        console.log(certStandard, certBody,
            certPrice,
            certStandard_2,
            certBody_2,
            certPrice_2);

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
            brokerCertification,
            brokerPriceCertification,
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
            brokerConsultation,
            brokerPriceConsultation,
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