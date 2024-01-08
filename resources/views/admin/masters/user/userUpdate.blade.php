<div class="input-split">
    <div class="col-lg-6">
        <div class="form-group">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="id" placeholder="Name" value="{{$user[0]->id}}" hidden>
                <input type="text" class="form-control" id="name" placeholder="Name" value="{{$user[0]->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" value="{{$user[0]->email}}">
            </div>
            <div class="form-group">
                <label for="division">Division</label>
                <input type="text" class="form-control" id="division" placeholder="Division" value="{{$user[0]->division}}">
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" class="form-control" id="number" placeholder="Number" value="{{$user[0]->number}}">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="name">Confirm Password</label>
            <input type="password" class="form-control" id="coPassword" placeholder="Confirm Password">
            <span id='message'></span>
        </div>
        <div class="form-group">
            <label for="surveillance_2">Status</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="status">
                    <option disabled selected>Select a Status</option>
                    <option {{$user ? ($user[0]->status === "Active" ? "selected" : "") : ''}}>Active</option>
                    <option {{$user ? ($user[0]->status === "Withdraw" ? "selected" : "") : ''}}>Withdraw</option>
                    <option {{$user ? ($user[0]->status === "Suspended" ? "selected" : "") : ''}}>Suspended</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="surveillance_2">Role</label>
            <div class="dropdown">
                <select class="form-control custom-select" id="role">
                    <option disabled selected>Select a Role</option>
                    <option {{$user ? ($user[0]->id_role === 1 ? "selected" : "") : ''}} value="1">Super Admin</option>
                    <option {{$user ? ($user[0]->id_role === 2 ? "selected" : "") : ''}} value="2">Admin</option>
                    <option {{$user ? ($user[0]->id_role === 3 ? "selected" : "") : ''}} value="3">Sales</option>
                    <option {{$user ? ($user[0]->id_role === 4 ? "selected" : "") : ''}} value="4">Operation</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br><br>
<div style="display: flex; justify-content: center;">
    <button class="btn btn-primary mr-2" id="send">Submit</button>
    <button class="btn btn-dark" id="cancle">Cancel</button>
</div>

<script>
    $(document).ready(function() {
        $('#coPassword').on('keyup', function() {
            var password = $('#password').val();
            var confirmPassword = $(this).val();

            if (password === confirmPassword) {
                $('#message').html('Password match!').css({
                    'color': 'green',
                    'font-family': 'Rubik',
                    'font-weight': '400',
                    'font-size': '12px',
                    'src': 'url("../fonts/Rubik/Rubik-Light.ttf")'
                });

                $('#coPassword').on('focusout', function() {
                    $('#message').empty();
                });
            } else {
                $('#message').html('Password not match!').css({
                    'color': 'red',
                    'font-family': 'Rubik',
                    'font-weight': '400',
                    'font-size': '12px',
                    'src': 'url("../fonts/Rubik/Rubik-Light.ttf")'
                });
            }
        });
    });

    $('#send').click(function() {
        const id = $('#id').val();
        const name = $('#name').val();
        const email = $('#email').val();
        const division = $('#division').val();
        const number = $('#number').val();
        const role = $('#role').val();
        const password = $('#password').val();
        const coPassword = $('#coPassword').val();
        const status = $('#status').val();

        axios.post('/user/sendUpdate/' + id, {
            name,
            email,
            division,
            number,
            password,
            coPassword,
            role,
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