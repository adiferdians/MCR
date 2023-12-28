<input type="text" class="form-control" id="id" value="{{$standard[0]->id}}" hidden>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{$standard[0]->name}}" placeholder="Name">
</div>
<div class="form-group">
    <label for="surveillance_2">Status</label>
    <div class="dropdown">
        <select class="form-control custom-select" id="status">
            <option disabled selected>Select a Status</option>
            <option {{$standard ? ($standard[0]->status === "Active" ? "selected" : "") : ''}}>Active</option>
            <option {{$standard ? ($standard[0]->status === "Withdraw" ? "selected" : "") : ''}}>Withdraw</option>
            <option {{$standard ? ($standard[0]->status === "Suspended" ? "selected" : "") : ''}}>Suspended</option>
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
        const status = $('#status').val();

        axios.post('/standard/sendUpdate/' + id, {
            name,
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