<div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="Telephone">Telephone</label>
        <input type="text" class="form-control" id="telephone" placeholder="Telephone">
    </div>
    <div class="form-group">
        <label for="Bank">Bank</label>
        <input type="text" class="form-control" id="bank" placeholder="Bank Account">
    </div>
    <div class="form-group">
        <label for="bankNumber">Bank Account Number</label>
        <input type="text" class="form-control" id="bankNumber" placeholder="Bank Account Number"></input>
    </div>
    <div class="form-group">
        <label for="surveillance_2">Status</label>
        <div class="dropdown">
            <select class="form-control custom-select" id="status">
                <option disabled selected>Select a Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>
    </div>
    <br><br>
    <button class="btn btn-primary mr-2" id="send" onclick="sendBroker()">Submit</button>
    <button class="btn btn-dark" id="cancle">Cancel</button>
</div>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const telephone = $('#telephone').val();
        const bank = $('#bank').val();
        const bankNumber = $('#bankNumber').val();
        const status = $('#status').val();

        axios.post('/broker/send', {
            name,
            telephone,
            bank,
            bankNumber,
            status
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

    $("#cancle").click(function() {
        $('#myModal').modal('hide');
    })
</script>