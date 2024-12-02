<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from phpstack-426242-2145512.cloudwaysapps.com/RaAdmin/template/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Dec 2024 19:39:32 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template">
  <meta name="keywords"
    content="admin template, ra-admin admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="la-themes">
  <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/x-icon">

  <title>Sign In | ecomus Admin</title>

  <!--font-awesome-css-->
  <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&amp;display=swap" rel="stylesheet">

  <!-- tabler icons-->
  <link rel="stylesheet" type="text/css" href="../assets/vendor/tabler-icons/tabler-icons.css">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/vendor/bootstrap/bootstrap.min.css') }}">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/css/style.css') }}">

  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/css/responsive.css') }}">

</head>

<body class="sign-in-bg">
  <div class="app-wrapper d-block">
    <div class="main-container">
      <!-- Body main section starts -->
      <div class="container">
        <div class="row sign-in-content-bg">
          <div class="col-lg-6 image-contentbox d-none d-lg-block">
            <div class="form-container ">
              <div class="signup-content mt-4">
                <span>
                  <img src="../assets/images/logo/1.png" alt="" class="img-fluid ">
                </span>
              </div>
             
              <div class="signup-bg-img">
                <img src="{{ asset('/admin-assets/images/login/04.png') }}" alt="" class="img-fluid">
              </div>
            </div>

          </div>
          <div class="col-lg-6 form-contentbox">
            <div class="form-container">
              <form class="app-form" action="/admin/login" method="POST">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5 text-center text-lg-start">
                      <h2 class="text-primary f-w-600">Welcome To ecomus Admin Panel! </h2>
                      <p>Sign in with your data that you enterd during your registration</p>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="username" class="form-label">Email</label>
                      <input type="email" class="form-control" placeholder="Enter Your email" id="username" name="email">
                    </div>
                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <a href="pwd_reset.html" class="link-primary float-end">Forgot Password ?</a>
                      <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name="password">
                    </div>
                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                  </div>
                  <div class="col-12">
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                      <label class="form-check-label text-secondary" for="checkDefault">
                        Remember me
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                        <input type="submit" value="Sign In" class="btn btn-primary w-100">
                      
                    </div>
                  </div>
                  
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Body main section ends -->
    </div>
  </div>
  <!-- latest jquery-->
  <script src="{{ asset('/admin-assets/js/jquery-3.6.0.min.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ asset('/admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>


<!-- Mirrored from phpstack-426242-2145512.cloudwaysapps.com/RaAdmin/template/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Dec 2024 19:39:32 GMT -->
</html>