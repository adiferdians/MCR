<div class="input-split">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" placeholder="Type">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" rows="4" placeholder="Address"></textarea>
        </div>
        <div class="form-group">
            <label for="scope">Scope</label>
            <textarea class="form-control" id="scope" rows="4" placeholder="Scope"></textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="effective">Effective</label>
            <input type="date" class="form-control" id="effective">
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
            <label for="date">date</label>
            <input type="date" class="form-control" id="date">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-dark">Cancel</button>
    </div>
</div>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const type = $('#type').val();
        const title = $('#title').val();
        const subTitle = $('#sub_title').val();
        const address = $('#address').val();
        const scope = $('#scope').val();
        const expired = $('#expired').val();
        const date = $('#date').val();

        axios.post('/certificate/send', {
            name,
            type,
            title,
            address,
            scope,
            expired,
            date
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Sukses Menambahkan Data!',
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err,
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            })
        })
    })
</script>