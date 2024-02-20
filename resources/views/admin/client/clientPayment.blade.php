<div class="form-group">
    <label for="surveillance_2">Payment</label>
    <div class="split-column">
        <div class="dropdown col-lg-11">
            <select class="form-control custom-select" id="dpOption">
                <option disabled selected>Select Payment</option>
                <option>Down Payment 1</option>
                <option>Down Payment 2</option>
                <option>Down Payment 3</option>
                <option>Down Payment 4</option>
                <option>Down Payment 5</option>
                <option>Settlement</option>
            </select>
        </div>
        <div class="col-lg-1 add-btn">
            <button class="btn btn-success mr-2" id="addDP">+</button>
        </div>
    </div>
</div>
<table style="width: -webkit-fill-available;">
    <input type="text" class="form-control" id="id" value="{{ $certification ? $certification->certification_id : ($consultation ? $consultation->consultation_id : "")}}" hidden>
    <input type="text" class="form-control" id="service" value="{{ $certification ? $certification->service : ($consultation ? $consultation->service : "")}}" hidden>
    <tbody>
        <tr id="idDp1" {{ empty($certificationPayment['Down Payment 1']) && empty($consultationPayment['Down Payment 1']) ? 'hidden' : '' }}>
            <td><label for="dp1">Down Payment 1</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="dp1" placeholder="Down Payment 1" value="{{ !empty($certificationPayment['Down Payment 1']) ? $certificationPayment['Down Payment 1'] : (!empty($consultationPayment['Down Payment 1']) ? $consultationPayment['Down Payment 1'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP1">-</button></td>
            </>
        <tr id="idDp2" {{ empty($certificationPayment['Down Payment 2']) && empty($consultationPayment['Down Payment 2']) ? 'hidden' : '' }}>
            <td><label for="dp2">Down Payment 2</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="dp2" placeholder="Down Payment 2" value="{{ !empty($certificationPayment['Down Payment 2']) ? $certificationPayment['Down Payment 2'] : (!empty($consultationPayment['Down Payment 2']) ? $consultationPayment['Down Payment 2'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP2">-</button></td>
        </tr>
        <tr id="idDp3" {{ empty($certificationPayment['Down Payment 3']) && empty($consultationPayment['Down Payment 3']) ? 'hidden' : '' }}>
            <td><label for="dp3">Down Payment 3</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="dp3" placeholder="Down Payment 3" value="{{ !empty($certificationPayment['Down Payment 3']) ? $certificationPayment['Down Payment 3'] : (!empty($consultationPayment['Down Payment 3']) ? $consultationPayment['Down Payment 3'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP3">-</button></td>
        </tr>
        <tr id="idDp4" {{ empty($certificationPayment['Down Payment 4']) && empty($consultationPayment['Down Payment 4']) ? 'hidden' : '' }}>
            <td><label for="dp4">Down Payment 4</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="dp4" placeholder="Down Payment 4" value="{{ !empty($certificationPayment['Down Payment 4']) ? $certificationPayment['Down Payment 4'] : (!empty($consultationPayment['Down Payment 4']) ? $consultationPayment['Down Payment 4'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP4">-</button></td>
        </tr>
        <tr id="idDp5" {{ empty($certificationPayment['Down Payment 5']) && empty($consultationPayment['Down Payment 5']) ? 'hidden' : '' }}>
            <td><label for="dp5">Down Payment 5</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="dp5" placeholder="Down Payment 5" value="{{ !empty($certificationPayment['Down Payment 5']) ? $certificationPayment['Down Payment 5'] : (!empty($consultationPayment['Down Payment 5']) ? $consultationPayment['Down Payment 5'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP5">-</button></td>
        </tr>
        <tr id="sett" {{ empty($certificationPayment['Settelment']) && empty($consultationPayment['Settelment']) ? 'hidden' : '' }}>
            <td><label for="settlement">Settlement</label></td>
            <td><input type="text" class="form-control" autocomplete="off" id="settlement" placeholder="Settlement" value="{{ !empty($certificationPayment['Settelment']) ? $certificationPayment['Settelment'] : (!empty($consultationPayment['Settelment']) ? $consultationPayment['Settelment'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeSett">-</button></td>
        </tr>
    </tbody>
</table>

<br><br>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="close">Close</button>
</div>

<script>
    for (var i = 1; i <= 5; i++) {
        (function(index) {
            $("#closeDP" + index).click(function() {
                $("#idDp" + index).attr("hidden", "hidden");
            });
        })(i);
    }

    $("#close").click(function() {
        $("#myModal").modal('hide');
    });

    $("#closeSett").click(function() {
        $("#sett").attr("hidden", "hidden");
    });

    $("#addDP").click(function() {
        var selectedOption = $("#dpOption").val();
        if (selectedOption === "Down Payment 1") {
            $("#idDp1").removeAttr("hidden");
        } else if (selectedOption === "Down Payment 2") {
            $("#idDp2").removeAttr("hidden");
        } else if (selectedOption === "Down Payment 3") {
            $("#idDp3").removeAttr("hidden");
        } else if (selectedOption === "Down Payment 4") {
            $("#idDp4").removeAttr("hidden");
        } else if (selectedOption === "Down Payment 5") {
            $("#idDp5").removeAttr("hidden");
        } else if (selectedOption === "Settlement") {
            $("#sett").removeAttr("hidden");
        }
    });


    $('#send').click(function() {
        const id = $('#id').val();
        const service = $('#service').val();
        const dp1 = $('#dp1').val();
        const dp2 = $('#dp2').val();
        const dp3 = $('#dp3').val();
        const dp4 = $('#dp4').val();
        const dp5 = $('#dp5').val();
        const settlement = $('#settlement').val();

        axios.post('/client/sendPayment', {
            id,
            service,
            dp1,
            dp2,
            dp3,
            dp4,
            dp5,
            settlement,
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