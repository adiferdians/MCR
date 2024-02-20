<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name">
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
<div class="form-group">
    <label for="surveillance_2">Role</label>
    <div class="dropdown">
        <select class="form-control custom-select" id="role">
            <option disabled selected>Select a Role</option>
            <option value="1">Super Admin</option>
            <option value="2">Admin</option>
            <option value="3">Sales</option>
            <option value="4">Operation</option>
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary mr-2" id="send">Submit</button>
<button class="btn btn-dark" id="reset">Reset</button>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const status = $('#status').val();
        const role = $('#role').val();

        axios.post('/role/send', {
            name,
            status,
            role
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