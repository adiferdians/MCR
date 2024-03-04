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
                <option value="Settlement">Full Payment</option>
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
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="dp1" placeholder="Down Payment 1" value="{{ !empty($certificationPayment['Down Payment 1']) ? $certificationPayment['Down Payment 1'] : (!empty($consultationPayment['Down Payment 1']) ? $consultationPayment['Down Payment 1'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP1">-</button></td>
            </>
        <tr id="idDp2" {{ empty($certificationPayment['Down Payment 2']) && empty($consultationPayment['Down Payment 2']) ? 'hidden' : '' }}>
            <td><label for="dp2">Down Payment 2</label></td>
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="dp2" placeholder="Down Payment 2" value="{{ !empty($certificationPayment['Down Payment 2']) ? $certificationPayment['Down Payment 2'] : (!empty($consultationPayment['Down Payment 2']) ? $consultationPayment['Down Payment 2'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP2">-</button></td>
        </tr>
        <tr id="idDp3" {{ empty($certificationPayment['Down Payment 3']) && empty($consultationPayment['Down Payment 3']) ? 'hidden' : '' }}>
            <td><label for="dp3">Down Payment 3</label></td>
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="dp3" placeholder="Down Payment 3" value="{{ !empty($certificationPayment['Down Payment 3']) ? $certificationPayment['Down Payment 3'] : (!empty($consultationPayment['Down Payment 3']) ? $consultationPayment['Down Payment 3'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP3">-</button></td>
        </tr>
        <tr id="idDp4" {{ empty($certificationPayment['Down Payment 4']) && empty($consultationPayment['Down Payment 4']) ? 'hidden' : '' }}>
            <td><label for="dp4">Down Payment 4</label></td>
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="dp4" placeholder="Down Payment 4" value="{{ !empty($certificationPayment['Down Payment 4']) ? $certificationPayment['Down Payment 4'] : (!empty($consultationPayment['Down Payment 4']) ? $consultationPayment['Down Payment 4'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP4">-</button></td>
        </tr>
        <tr id="idDp5" {{ empty($certificationPayment['Down Payment 5']) && empty($consultationPayment['Down Payment 5']) ? 'hidden' : '' }}>
            <td><label for="dp5">Down Payment 5</label></td>
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="dp5" placeholder="Down Payment 5" value="{{ !empty($certificationPayment['Down Payment 5']) ? $certificationPayment['Down Payment 5'] : (!empty($consultationPayment['Down Payment 5']) ? $consultationPayment['Down Payment 5'] : "") }}">
            </td>
            <td><button class="btn btn-danger mr-2" id="closeDP5">-</button></td>
        </tr>
        <tr id="sett" {{ empty($certificationPayment['Settelment']) && empty($consultationPayment['Settelment']) ? 'hidden' : '' }}>
            <td><label for="settlement">Full Payment</label></td>
            <td><input type="text" class="form-control rupiah-input" autocomplete="off" id="settlement" placeholder="Full Payment" value="{{ !empty($certificationPayment['Settelment']) ? $certificationPayment['Settelment'] : (!empty($consultationPayment['Settelment']) ? $consultationPayment['Settelment'] : "") }}">
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
    // Function to convert number to Rupiah currency format
    function formatToRupiah(angka) {
        if (!angka) return ''; // Jika tidak ada angka, kembalikan string kosong
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return 'Rp ' + ribuan;
    }

    // Function to apply Rupiah formatting on input change
    function applyRupiahFormatting(input) {
        var value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-angka
        input.value = formatToRupiah(value);
    }

    // Call the function to apply Rupiah formatting to all inputs with class 'rupiah-input'
    $(document).ready(function() {
        // Memanggil fungsi applyRupiahFormatting saat halaman dimuat
        $('.rupiah-input').each(function() {
            applyRupiahFormatting(this);
        });

        // Event listener untuk memastikan input hanya menerima integer
        $('.rupiah-input').on('keypress', function(e) {
            var charCode = e.which ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                e.preventDefault();
            }
        });

        // Event listener untuk memformat input saat input berubah
        $('.rupiah-input').on('input', function() {
            applyRupiahFormatting(this);
        });
    });
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