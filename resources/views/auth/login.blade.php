<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ URL::asset('/assets/css/login.css') }}" rel="stylesheet">
    <!-- JQuery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Axios CDN-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- sweet alert -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <input type="text" placeholder="Username" id="email" value="admin">
        <input type="password" placeholder="Password" id="password" value="sapiii">
        <button type="submit" class="btn btn-primary btn-block btn-large" id="submit">Sign In</button>
    </div>
</body>
<script>
    $('#submit').on('click', function(submit) {
        const email = $('#email').val();
        const password = $('#password').val();

        axios.post('/login', {
            email,
            password
        }).then(response => {
            if (response.data.success === true) {
                Swal.fire({
                    title: "Log In Success!",
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        icon: 'my-custom-icon-class'
                    }
                })
                .then((result) => {
                    window.location.href = "/dashboard";
                })
            } else {
                Swal.fire({
                title: response.data.message,
                position: 'top-end',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            })
            }
        }).catch((err) => {
            Swal.fire({
                title: response.data.message,
                position: 'top-end',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });
</script>

</html>