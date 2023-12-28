<input type="text" class="form-control" id="id" value="{{$broker[0]->id}}" hidden>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{$broker[0]->name}}" placeholder="Name">
</div>
<div class="form-group">
    <label for="Telephone">Telephone</label>
    <input type="text" class="form-control" id="telephone" value="{{$broker[0]->phone}}" placeholder="Telephone">
</div>
<div class="form-group">
    <label for="Bank">Bank</label>
    <input type="text" class="form-control" id="bank" value="{{$broker[0]->bank}}" placeholder="Bank Account">
</div>
<div class="form-group">
    <label for="bankNumber">Bank Account Number</label>
    <input type="text" class="form-control" id="bankNumber" value="{{$broker[0]->bank_number}}" placeholder="Bank Account Number"></input>
</div>
<div class="form-group">
    <label for="surveillance_2">Status</label>
    <div class="dropdown">
        <select class="form-control custom-select" id="status">
            <option disabled selected>Select a Status</option>
            <option {{$broker ? ($broker[0]->status === "Active" ? "selected" : "") : ''}}>Active</option>
            <option {{$broker ? ($broker[0]->status === "Withdraw" ? "selected" : "") : ''}}>Withdraw</option>
            <option {{$broker ? ($broker[0]->status === "Suspended" ? "selected" : "") : ''}}>Suspended</option>
        </select>
    </div>
</div>
<br><br>
<button class="btn btn-primary mr-2" id="send">Submit</button>
<button class="btn btn-dark" id="cancle">Cancel</button>

<script>
    $('#send').click(function() {
        const id = $('#id').val();
        const name = $('#name').val();
        const telephone = $('#telephone').val();
        const bank = $('#bank').val();
        const bankNumber = $('#bankNumber').val();
        const status = $('#status').val();

        axios.post('/broker/sendUpdate/' + id, {
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

    $("#modalClose").click(function() {
        $('#myModal').modal('hide');
    })
</script>