<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from drift.g-axon.work/html-bs4/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 21:27:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
<!-- /meta tags -->
<title> @yield('title')  </title>

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

<!-- Load Styles -->    <link rel="stylesheet" href="{{asset('node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/chartist/dist/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/semidark-style-1.min.css')}}">
    <!-- /load styles -->
    
    <link href="{{asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">

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
        <!-- Header -->
<header class="dt-header">

  <!-- Header container -->
  <div class="dt-header__container">

    <!-- Brand -->
    <div class="dt-brand">

      <!-- Brand tool -->
      <div class="dt-brand__tool" data-toggle="main-sidebar">
        <div class="hamburger-inner"></div>
      </div>
      <!-- /brand tool -->

      <!-- Brand logo -->
      <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="{{route('home')}}"><br>
          <h2 class="text-white">GED SED</h2>
        </a>
      </span>
      <!-- /brand logo -->

    </div>
    <!-- /brand -->

    <!-- Header toolbar-->
    <div class="dt-header__toolbar">

      <!-- Search box -->
      
      
      <!-- /search box -->

      <!-- Header Menu Wrapper -->
      <div class="dt-nav-wrapper">
        <!-- Header Menu -->
        
        <!-- /header menu -->

        <!-- Header Menu -->
        
        <!-- /header menu -->
        
        <!-- Header Menu -->
        
        
        <!-- /header menu -->

        <!-- Header Menu -->
        <ul class="dt-nav">
          <li class="dt-nav__item dropdown">

            <!-- Dropdown Link -->
            <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="dt-avatar size-30" src="{{asset(Auth::user()->profil)}}" alt="{{Auth::user()->name}}">
              <span class="dt-avatar-info d-none d-sm-block">
              <span class="dt-avatar-name">{{Auth::user()->name}}</span>
              </span> </a>
            <!-- /dropdown link -->

            <!-- Dropdown Option -->
            <div class="dropdown-menu dropdown-menu-right" style="width: 60%">
                <div class="dt-avatar-wrapper flex-nowrap p-6 mt-n2 bg-gradient-purple text-white rounded-top">
                <img class="dt-avatar" src="{{asset(Auth::user()->profil)}}" alt="Domnic Harris">
                <span class="dt-avatar-info">
                <span class="dt-avatar-name">{{Auth::user()->name}}</span>
                  <span class="f-12 text-dark">{{Auth::user()->role}} -
                    @if(Auth::user()->direction != '0')
                         {{App\Direction::find(Auth::user()->direction)->nom_direction}}
                    @elseif(Auth::user()->service != '0')
                          {{App\Service::find(Auth::user()->service)->nom_service}}
                    @endif
                  </span>
                </span>
              </div>
              <a class="dropdown-item" href="{{route('account')}}"> <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Mon compte
              <a class="dropdown-item" href="{{route('user.logout')}} " onclick="return confirm('voulez-vous vraiment vous déconnecter?');"> <i class="icon icon-dashboard icon-fw mr-2 mr-sm-1"></i>Déconnexion
              </a>
            </div>
            <!-- /dropdown option -->

          </li>
        </ul>
        <!-- /header menu -->
      </div>
      <!-- Header Menu Wrapper -->

    </div>
    <!-- /header toolbar -->

  </div>
  <!-- /header container -->

</header>
<!-- /header -->
        <!-- Site Main -->
        <main class="dt-main">
            <!-- Sidebar -->
            @include("dashboard.layouts.sidemenu_bar")
            <!-- Site Content Wrapper -->
            @yield('content')
            <div class="modal fade" data-backdrop="false" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="model-8" 
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <!-- Modal Content -->
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h3 class="modal-title" id="model-8">Note d'informations sur les Relances </h3>  
                                                </div>
                                                <!-- /modal header -->

                                                <!-- Modal Body -->
                                                <div class="modal-body" id="courrier-list">
                                                </div>
                                                <!-- /modal body -->

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="fermer" data-dismiss="modal">Fermer
                                                    </button>
                                                </div>
             
                                                <!-- /modal footer -->

                                            </div>
                                            <!-- /modal content -->

                                        </div>
                                    </div>

                <!-- Footer -->
<footer class="dt-footer">
  Copyright  <b> SED </b> &copy; 2020 
  
</footer>
<!-- /customizer sidebar -->
        </main>
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
<script src="{{asset('node_modules/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/custom/charts/dashboard-listing.js')}}"></script>
<script src="{{asset('assets/js/custom/datetime-pickers.js')}}"></script><!-- Date-time Pickers -->
<script src="{{asset('node_modules/moment/min/moment.min.js')}}"></script>
<script src="{{asset('node_modules/moment/min/locales.min.js')}}"></script>
<script src="{{asset('node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/js/custom/data-table.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script>
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

    $('.form_datetime').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
</script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'fr'
                });
            });
        </script>

<script>
    @if(Auth::user()->role == "Agent cabinet")
        @foreach(App\Courrier::where('nature', 1)->get() as $item)
    // si nous sommes situés entre 10 min avant la date de relance et 10 min apres alors la relance s'affiche
    @if(time() - 600 <= strtotime($item->relance)|| time()  <= strtotime($item->relance) + 600)
        //$("#courrier").html( "{{$item->code}}" );
            //document.getElementById("id_courrier").value =  "{{$item->id}}" ;
            /*window.setTimeout(function(){
              $('#myModal').modal('toggle');
            },10*1);*/
            $('#courrier-list').append($("<p>La date de relance du courrier <a href=' {{route('courrier.interne.show', $item->id)}} '>{{$item->code}}</a> <span id='date' ></span> est presque atteinte ou dépassé de 10 min.</p>"));
            $('#myModal').modal('show');
          @endif
        @endforeach
    @endif
    @if(Auth::user()->role == "Chef service-courrier" || Auth::user()->role == "Agent service-courrier" || Auth::user()->role == "Agent cabinet")
        @foreach(App\Courrier::where('nature',0)->get() as $item)
// si nous sommes situés entre 10 min avant la date de relance et 10 min apres alors la relance s'affiche
        @if(time() - 600 <= strtotime($item->relance)|| time()  <= strtotime($item->relance) + 600)
            //$("#courrier").html( "{{$item->code}}" );
            //document.getElementById("id_courrier").value =  "{{$item->id}}" ;
            /*window.setTimeout(function(){
              $('#myModal').modal('toggle');
            },10*1);*/
            $('#courrier-list').append($("<p>La date de relance du courrier <a href=' {{route('courrier.show', $item->id)}} '>{{$item->code}}</a>  <span id='date' ></span> est presque atteinte ou est dépassé de 10 min.</p>"));
            $('#myModal').modal('show');
        @endif
        @endforeach
    @endif
</script>