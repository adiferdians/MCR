<div class="form-group">
    <label for="surveillance_2">Stage</label>
    <div class="split-column">
        <div class="dropdown col-lg-11">
            <select class="form-control custom-select" id="stageOption">
                <option disabled selected>Select Stage</option>
                <option>Awarness Training</option>
                <option>Information Gathering</option>
                <option>Internal Audit Training</option>
                <option>Internal Audit</option>
                <option>Socialization</option>
                <option>External Audit</option>
                <option>Done</option>
            </select>
        </div>
        <div class="col-lg-1 add-btn">
            <button class="btn btn-success mr-2" id="addStage">+</button>
        </div>
    </div>
</div>
<div class="col-lg-11">
    <table style="width: -webkit-fill-available;" class="table">
        <input type="text" class="form-control" id="id" value="{{ $consultation ? $consultation->consultation_id : ""}}" hidden>
        <tbody>
            <tr id="st1" {{ (empty($consultationStage['Awarness Training Date']) ? 'hidden' : "")}}>
                <td><label class="act-right" for="at">Awarness Training</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="atDate" value="{{(!empty($consultationStage['Awarness Training Date']) ? $consultationStage['Awarness Training Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="atPIC" placeholder="PIC" value="{{(!empty($consultationStage['Awarness Training PIC']) ? $consultationStage['Awarness Training PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="atMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['Awarness Training Mandays']) && $consultationStage['Awarness Training Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['Awarness Training Mandays']) && $consultationStage['Awarness Training Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['Awarness Training Mandays']) && $consultationStage['Awarness Training Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST1">-</button></td>
            </tr>
            <tr id="st2" {{ (empty($consultationStage['Information Gathering Date']) ? 'hidden' : "")}}>
                <td><label class="act-right" for="ig">Information Gathering</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="igDate" value="{{(!empty($consultationStage['Information Gathering Date']) ? $consultationStage['Information Gathering Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="igPIC" placeholder="PIC" value="{{(!empty($consultationStage['Information Gathering PIC']) ? $consultationStage['Information Gathering PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="igMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['Information Gathering Mandays']) && $consultationStage['Information Gathering Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['Information Gathering Mandays']) && $consultationStage['Information Gathering Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['Information Gathering Mandays']) && $consultationStage['Information Gathering Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST2">-</button></td>
            </tr>
            <tr id="st3" {{ (empty($consultationStage['Internal Audit Training Date']) ? 'hidden' : "")}}>
                <td><label class="act-right" for="iat">Internal Audit Training</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="iatDate" value="{{(!empty($consultationStage['Internal Audit Training Date']) ? $consultationStage['Internal Audit Training Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="iatPIC" placeholder="PIC" value="{{(!empty($consultationStage['Internal Audit Training PIC']) ? $consultationStage['Internal Audit Training PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="iatMandays" name="iatMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['Internal Audit Training Mandays']) && $consultationStage['Internal Audit Training Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['Internal Audit Training Mandays']) && $consultationStage['Internal Audit Training Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['Internal Audit Training Mandays']) && $consultationStage['Internal Audit Training Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST3">-</button></td>
            </tr>
            <tr id="st4" {{ empty($consultationStage['Internal Audit Date']) ? 'hidden' : '' }}>
                <td><label class="act-right" for="ia">Internal Audit</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="iaDate" value="{{ !empty($consultationStage['Internal Audit Date']) ? $consultationStage['Internal Audit Date'] : '' }}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="iaPIC" placeholder="PIC" value="{{ !empty($consultationStage['Internal Audit PIC']) ? $consultationStage['Internal Audit PIC'] : '' }}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="iaMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ isset($consultationStage['Internal Audit Mandays']) && $consultationStage['Internal Audit Mandays'] == "12" ? 'selected' : '' }}>Half Day</option>
                            <option value="24" {{ isset($consultationStage['Internal Audit Mandays']) && $consultationStage['Internal Audit Mandays'] == "24" ? 'selected' : '' }}>One Day</option>
                            <option value="48" {{ isset($consultationStage['Internal Audit Mandays']) && $consultationStage['Internal Audit Mandays'] == "48" ? 'selected' : '' }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST4">-</button></td>
            </tr>
            <tr id="st5" {{ (empty($consultationStage['Socialization Date']) ? 'hidden' : "")}}>
                <td><label class="act-right" for="soc">Socialization</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="socDate" value="{{(!empty($consultationStage['Socialization Date']) ? $consultationStage['Socialization Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="socPIC" placeholder="PIC" value="{{(!empty($consultationStage['Socialization PIC']) ? $consultationStage['Socialization PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="socMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['Socialization Mandays']) && $consultationStage['Socialization Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['Socialization Mandays']) && $consultationStage['Socialization Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['Socialization Mandays']) && $consultationStage['Socialization Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST5">-</button></td>
            </tr>
            <tr id="st6" {{ (empty($consultationStage['External Audit Date']) ? 'hidden' : "")}}>
                <td><label class="act-right" for="ea">External Audit</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="eaDate" value="{{(!empty($consultationStage['External Audit Date']) ? $consultationStage['External Audit Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="eaPIC" placeholder="PIC" value="{{(!empty($consultationStage['External Audit PIC']) ? $consultationStage['External Audit PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="eaMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['External Audit Mandays']) && $consultationStage['External Audit Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['External Audit Mandays']) && $consultationStage['External Audit Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['External Audit Mandays']) && $consultationStage['External Audit Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST6">-</button></td>
            </tr>
            <tr id="st7" {{ empty($consultationStage['Done Date']) ? 'hidden' : '' }}>
                <td> <label class="act-right" for="done">Done</label></td>
                <td><input type="date" class="form-control" autocomplete="off" id="doneDate" value="{{(!empty($consultationStage['Done Date']) ? $consultationStage['Done Date'] : "")}}"></td>
                <td><input type="text" class="form-control" autocomplete="off" id="donePIC" placeholder="PIC" value="{{(!empty($consultationStage['Done PIC']) ? $consultationStage['Done PIC'] : "")}}"></td>
                <td>
                    <div class="dropdown">
                        <select class="form-control custom-select" id="doneMandays">
                            <option disabled selected>Select a Mandays</option>
                            <option value="12" {{ (isset($consultationStage['Done Mandays']) && $consultationStage['Done Mandays'] == "12") ? "selected" : "" }}>Half Day</option>
                            <option value="24" {{ (isset($consultationStage['Done Mandays']) && $consultationStage['Done Mandays'] == "24") ? "selected" : "" }}>One Day</option>
                            <option value="48" {{ (isset($consultationStage['Done Mandays']) && $consultationStage['Done Mandays'] == "48") ? "selected" : "" }}>Two Day</option>
                        </select>
                    </div>
                </td>
                <td><button class="btn btn-danger mr-2" id="closeST7">-</button></td>
            </tr>
        </tbody>
    </table>
</div>
<br><br>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="close">Close</button>
</div>

<script>
    for (var i = 1; i <= 7; i++) {
        (function(index) {
            $("#closeST" + index).click(function() {
                $("#st" + index).attr("hidden", "hidden");
            });
        })(i);
    }

    $("#close").click(function() {
        $("#myModal").modal('hide');
    });

    $("#addStage").click(function() {
        var selectedOption = $("#stageOption").val();

        if (selectedOption === "Awarness Training") {
            $("#st1").removeAttr("hidden");
        } else if (selectedOption === "Information Gathering") {
            $("#st2").removeAttr("hidden");
        } else if (selectedOption === "Internal Audit Training") {
            $("#st3").removeAttr("hidden");
        } else if (selectedOption === "Internal Audit") {
            $("#st4").removeAttr("hidden");
        } else if (selectedOption === "Socialization") {
            $("#st5").removeAttr("hidden");
        } else if (selectedOption === "External Audit") {
            $("#st6").removeAttr("hidden");
        } else if (selectedOption === "Done") {
            $("#st7").removeAttr("hidden");
        }
    });


    $('#send').click(function() {
        const id = $('#id').val();
        const atDate = $('#atDate').val();
        const atPIC = $('#atPIC').val();
        const atMandays = $('#atMandays').val();
        const igDate = $('#igDate').val();
        const igPIC = $('#igPIC').val();
        const igMandays = $('#igMandays').val();
        const iatDate = $('#iatDate').val();
        const iatPIC = $('#iatPIC').val();
        const iatMandays = $('#iatMandays').val();
        const iaDate = $('#iaDate').val();
        const iaPIC = $('#iaPIC').val();
        const iaMandays = $('#iaMandays').val();
        const socDate = $('#socDate').val();
        const socPIC = $('#socPIC').val();
        const socMandays = $('#socMandays').val();
        const eaDate = $('#eaDate').val();
        const eaPIC = $('#eaPIC').val();
        const eaMandays = $('#eaMandays').val();
        const doneDate = $('#doneDate').val();
        const donePIC = $('#donePIC').val();
        const doneMandays = $('#doneMandays').val();

        axios.post('/client/sendStage', {
            id,
            atDate,
            atPIC,
            atMandays,
            igDate,
            igPIC,
            igMandays,
            iatDate,
            iatPIC,
            iatMandays,
            iaDate,
            iaPIC,
            iaMandays,
            socDate,
            socPIC,
            socMandays,
            eaDate,
            eaPIC,
            eaMandays,
            doneDate,
            donePIC,
            doneMandays
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