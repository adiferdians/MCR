<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>MCR @yield('title')</title>
  <link rel="icon" type="image/png" href="assets\images\logo\title-logo.png">

  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/custom.css">

  <!-- Add jQuery Library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include jQuery (required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Add Axios CDN-->
  <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

  <!-- sweet alert -->
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="user-logo">
        <img class="logo" src="assets\images\logo\logo.png" alt="logo">
      </div>
      <ul class="nav">
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items @yield('Dashboard')">
          <a class="nav-link" href="/dashboard">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items @yield('Certificate')">
          <a class="nav-link" href="/certificate">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Certificate</span>
          </a>
        </li>
        <li class="nav-item menu-items @yield('Client')">
          <a class="nav-link" href="/client">
            <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Client</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/images/faces/profil.svg" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ session('name') }}</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" id="logout">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>

      <!-- modal start -->
      <div class="modal" tabindex="-1" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalClose" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
      <!-- modal end -->

      <!-- modal start -->
      <div class="modal" tabindex="-1" id="modalSmall">
        <div class="modal-dialog modal-sm">
          <div class="modal-content" style="width: fit-content;">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalCloseSM" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
      <!-- modal end -->

      @yield('content')

    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>
<script>
  $('#logout').click(function() {
    Swal.fire({
      title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        axios.get('/out')
          .then(response => {
            window.location.href = '/l051n';
          })
          .catch(error => {
            console.log(error.response.data);
          });

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {}
    })
  })
</script>

</html>