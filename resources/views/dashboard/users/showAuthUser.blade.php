@extends('dashboard.layouts.template')

  @section('title') GED SED -  compte de {{$user->name}} @stop
  
  @section('content')

  <div class="dt-content-wrapper">

     <!-- Site Content -->
     <div class="dt-content">

        <!-- Profile -->
        <div class="profile">

            <!-- Profile Banner -->
            <div class="profile__banner">

                <!-- Profile Banner Top -->
                <div class="profile__banner-detail">
                    <!-- Avatar Wrapper -->
                    <div class="dt-avatar-wrapper">
                        <!-- /avatar -->

                        <!-- Info -->
                        <div class="dt-avatar-info">
                            <span class="dt-avatar-name display-4 mb-2 font-weight-light"> {{$user->name}} </span>
                            <span class="f-16">Profil utilisateur</span>
                        </div>
                        <!-- /info -->
                    </div>
                </div>
                <!-- /profile banner bottom -->

            </div>
            <!-- /profile banner -->

            <!-- Profile Content -->
            <div class="profile-content">
                  <!--  @if(session()->has('success'))
                    <div class="row">
                            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                                    <strong>Succès!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    </div>
                @endif
        
                @if($errors->any())
                    <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                                    <strong>Oups!</strong> {{ $errors->all()[0] }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
    
                    </div>
                @endif -->
                
                <!-- Grid -->
                <div class="row">

                    <!-- Grid Item -->
                    <div class="col-xl-4 order-xl-2">


                        <!-- Grid -->
                        <div class="row">

                            <!-- Grid Item -->
                            <div class="col-xl-12 col-md-6 col-12 order-xl-2">
                                <!-- /card -->

                            </div>
                            <!-- /grid item -->

                            <!-- Grid Item -->
                            <div class="col-xl-12 col-md-6 col-12 order-xl-1">

                                <!-- Card -->
                                <div class="dt-card dt-card__full-height">

                                    <!-- Card Header -->
                                    <div class="dt-card__header pt-6">

                                        <!-- Card Heading -->
                                        <div class="dt-card__heading" style="text-align: center">
                                            @if($user->profil != null)
                                                <img src="{{asset($user->profil)}} " class="dt-avatar size-100"  alt="" srcset="">
                                            @else
                                                <i class="icon icon-user-account" style="font-size: 100px"></i>
                                            @endif
                                        </div>
                                        <!-- /card heading -->

                                    </div>
                                    <!-- /card header -->

                                    <!-- Card Body -->
                                    <div class="dt-card__body">
                                        <!-- Media -->
                                        <div class="media mb-1">

                                            <!-- Media Body -->
                                            <div class="media-body" style="text-align:center">
                                                <h3> {{$user->name}} - {{$user->role}} </h3>
                                                <h3 style="margin-left: -10px">@if($user->direction != '0')
                                                        {{App\Direction::find($user->direction)->nom_direction}}
                                                    @else
                                                        @if($user->service != '0')
                                                            {{App\Service::find($user->service)->nom_service}}
                                                        @else
                                                            Aucun
                                                        @endif
                                                    @endif</h3>
                                                    <hr>
                                                      <!--      <a href="#" data-toggle="modal" data-target="#form-modal" class="btn btn-primary">Modifier paramétres connexion</a> -->
                                                    
                                            </div>
                                            <!-- /media body -->

                                        </div>
                                        <!-- /media -->
                                    </div>
                                    <!-- /card body -->

                                </div>
                                <!-- /card -->

                            </div>
                            <!-- /grid item -->

                        </div>
                        <!-- /grid -->

                    </div>
                    <!-- /grid item -->

                    <!-- Grid Item -->
                    <div class="col-xl-8 order-xl-1">

                        <!-- Card -->
                        <div class="card">

                            <!-- Card Header -->
                            <div class="card-header card-nav bg-transparent border-bottom d-sm-flex justify-content-sm-between">
                                <h3 class="mb-2 mb-sm-n5">Informations du compte</h3>
                                

                            </div>
                            <!-- /card header -->

                            <!-- Card Body -->
                            <div class="card-body pb-2">

                                <!-- Tab Content-->
                                <div class="tab-content mt-5">

                                        <div class="media mb-5">

                                                <i class="icon icon-user icon-xl mr-5"></i>
            
                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Nom</span>
                                                    <a href="javascript:void(0)">{{$user->name}} </a>
                                                </div>

                                                <!-- /media body -->
            
                                            </div>
                                            <div class="media mb-5">

                                                <i class="icon icon-user icon-xl mr-5"></i>
            
                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Nom d'utilisateur</span>
                                                    <a href="javascript:void(0)">{{$user->username}} </a>
                                                </div>
                                                <!-- /media body -->
            
                                            </div>
                                            <div class="media mb-5">

                                                <i class="icon icon-editors icon-xl mr-5"></i>
            
                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Matricule</span>
                                                    <a href="javascript:void(0)">{{$user->matricule}} </a>
                                                </div>
                                                <!-- /media body -->
            
                                            </div>
                                    
                                <div class="media mb-5">

                                        <i class="icon icon-mail icon-xl mr-5"></i>
    
                                        <!-- Media Body -->
                                        <div class="media-body">
                                            <span class="d-block text-light-gray f-12 mb-1">Adresse email</span>
                                            <a href="javascript:void(0)">{{$user->email}} </a>
                                        </div>
                                        <!-- /media body -->
    
                                    </div>
                                  
                                    <div class="media mb-5">

                                            <i class="icon icon-phone icon-xl mr-5"></i>
        
                                            <!-- Media Body -->
                                            <div class="media-body">
                                                <span class="d-block text-light-gray f-12 mb-1">Phone</span>
                                                <a href="javascript:void(0)">{{$user->telephone}} </a>
                                            </div>
                                            <!-- /media body -->
        
                                        </div>

                                        <div class="media mb-5">

                                                <i class="icon icon-user icon-xl mr-5"></i>
            
                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Rôle</span>
                                                    <a href="javascript:void(0)">{{$user->role}} </a>
                                                </div>
                                                <!-- /media body -->
            
                                            </div>
                                            <div class="media mb-5">

                                                <i class="icon icon-home icon-xl mr-5"></i>
            
                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Organe</span>
                                                    <a href="javascript:void(0)">
                                                        @if($user->direction != '0')
                                                            {{App\Direction::find($user->direction)->nom_direction}}
                                                        @else
                                                            @if($user->service != '0')
                                                                {{App\Service::find($user->service)->nom_service}}
                                                            @else
                                                                Aucun
                                                            @endif
                                                        @endif
                                                    </a>
                                                </div>
                                                <!-- /media body -->
            
                                            </div>
                                            <hr>

                                           <!-- <div class="media" style="text-align: right">
                                                    <a href=" @{{route('users.edit', $user->id)}} " class="btn btn-primary">Modifier</a>
                                                    <a href=" @{{route('user.print', $user->id)}} " target="_blank" class="btn btn-primary">Imprimer fiche utilisateur</a>
            
                                            </div>-->

                                 

                                </div>
                                <!-- /tab content-->

                            </div>
                            <!-- /card body -->

                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /grid item -->

                </div>
                <!-- /grid -->

            </div>
            <!-- /profile content -->

        </div>
        <!-- /profile -->

    </div>
    <!-- /site content -->
</div>

<div class="modal fade" id="form-modal" tabindex="-1" role="dialog"
                                         aria-labelledby="model-8"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <!-- Modal Content -->
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h3 class="modal-title" id="model-8">Modifier les paramétres de connexion</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- /modal header -->

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form method="post" action=" {{route('users.param', $user->id)}}  " enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group form-row">
                                                                    <label for="normal-input-5"
                                                                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nom d'utilisateur*</label>
                                                                    <div class="col-md-10 col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"
                                                                               id="normal-input-5"
                                                                               name="username"
                                                                               value=" {{request()->old('username') ? request()->old('username') : $user->username }}"
                                                                               placeholder="Nom d'utilisateur" required>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group form-row">
                                                                    <label for="normal-input-5"
                                                                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Mot de passe*</label>
                                                                    <div class="col-md-10 col-sm-9">
                                                                        <input type="password" class="form-control form-control-sm"
                                                                               id="normal-input-5"
                                                                               name="password"
                                                                               placeholder="Nouveau mot de passe" required>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group form-row">
                                                                    <label for="normal-input-5"
                                                                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Confirmer mot de passe*</label>
                                                                    <div class="col-md-10 col-sm-9">
                                                                        <input type="password" class="form-control form-control-sm"
                                                                               id="normal-input-5"
                                                                               name="password_confirmation"
                                                                               placeholder="Repéter le mot de passe" required>
                                                                    </div>
                                                            </div>
                                                </div>
                                                <!-- /modal body -->

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary btn-sm">Modifier
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                            data-dismiss="modal">Annuler
                                                    </button>
                                                </div>
                                                
                                            </form>
                                                <!-- /modal footer -->

                                            </div>
                                            <!-- /modal content -->

                                        </div>
                                    </div>

  @stop

  