@auth
<?php

    // header("Location: http://localhost:8000/home");
    header("Location: http://127.0.0.1/ged_sed/public/index.php/home");
   // header("Location: http://192.168.20.3/ged_sed/public/index.php/home");
    exit;
?>
@else
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from drift.g-axon.work/html-bs4/default/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 21:32:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags -->
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
<!-- /meta tags -->
<title>GED SED - Connexion</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/sed.ico')}}" type="image/x-icon">
<!-- /site favicon -->

<!-- Font Icon Styles -->
<link rel="stylesheet" href="{{asset('node_modules/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/gaxon-icon/styles.css')}}">
<!-- /font icon Styles -->

<!-- Perfect Scrollbar stylesheet -->
<link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
<!-- /perfect scrollbar stylesheet -->

<!-- Load Styles -->    <link rel="stylesheet" href="{{asset('assets/css/semidark-style-1.min.css')}}">
    <!-- /load styles -->

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
                  <br><br>
                    @if(session()->has('success'))
                        <div class="row">
                                <div class="col-3"></div>
                                <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                                        <strong>Succès!</strong> Authentification réusiie
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="col-3"></div>
                        </div>
                    @endif
            
                    @if($errors->any())
                        <div class="row">
                                <div class="col-3"></div>
                                <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
                                        <strong>Oups!</strong> {{ $errors->all()[0] }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="col-3"></div>

                        </div>
                    @endif
        <!-- Login Container -->
        <div class="dt-login--container">
            <!-- Login Content -->
            
            <div class="dt-login__content-wrapper">
                 
                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Connexion</h1>
                        <!-- /login title -->

                        <p class="f-16">Connectez-vous à votre compte pour pouvoir continuer</p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="#">
                            <h2 class="text-white">GED SED</h2>
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                   <div class="dt-login__content">
                       
                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">

                        <!-- Form -->
                        <form action="{{route('user.login')}}" method="post">
                            {{ csrf_field() }}
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Nom d'utilisateur</label>
                                <input type="text" name="username" required class="form-control" id="email-1" aria-describedby="email-1"
                                       placeholder="Entrer votre nom d'utilisateur">
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-1">Mot de passe</label>
                                <input type="password" required name="password" class="form-control" id="password-1" placeholder="Password">
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                           <!--  <div class="dt-checkbox d-block mb-6">
                                <input type="checkbox" id="checkbox-1">
                                <label class="dt-checkbox-content" for="checkbox-1">
                                    Se souvenir de moi
                                </label>
                            </div> -->
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary text-uppercase">Connexion</button>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            
                            <!-- /form group -->


                        </form>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                    <!-- Login Content Footer -->
                    <div class="dt-login__content-footer">
                        <a></a>
                    </div>
                    <!-- /login content footer -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('node_modules/moment/moment.js')}}"></script>
<script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="{{asset('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="{{asset('node_modules/masonry-layout/dist/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>
<script src="{{asset('assets/js/functions.js')}}"></script>
<script src="{{asset('assets/js/customizer.js')}}"></script><!-- Custom JavaScript -->
<script src="{{asset('assets/js/script.js')}}"></script>

</body>
@endauth   
<!-- Mirrored from drift.g-axon.work/html-bs4/default/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 21:32:46 GMT -->
</html>

