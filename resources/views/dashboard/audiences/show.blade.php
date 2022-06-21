<?php 
use App\Http\Controllers\Controller;
?>
@extends('dashboard.layouts.template')

  @section('title') GED SED - Détails audiences @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Détails audiences</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('audiences.index')}} "> <i class="icon icon-eye"></i> audiences</a> / <span class="text-secondary"> Détails </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de consulter les détails d'une demande d'audience.  </div>
                </div>
  <div class="row">

  <div class="col-12">

    <!-- Card -->
    <div class="dt-card">

        <!-- Card Header -->
        <div class="dt-card__header">

            <!-- Card Heading -->
            <div class="dt-card__heading">
                <h6 class="dt-card__title">Détails de l'audience</h6>
            </div>
            <!-- /card heading -->
            

        </div>
        <!-- /card header -->

        <!-- Card Body -->
        
        <div class="dt-card__body">
                @if(session()->has('success'))
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
            @endif
            <br>

            <div class="row" >
                    <div class="col-6">
                        <p>Visiteur: <strong>{{$audience->guest}} </strong> </p>
                        <p>Téléphone: <strong>{{$audience->phone}} </strong> </p>
                        <p>Date demande: <strong>{{$audience->created_at->format('d/m/Y')}} </strong> </p>
                    </div>
                    <div class="col-6">
                         <p>Fonction: <strong>{{$audience->quality}} </strong></p>
                         <p>Objet: <strong>{{$audience->objet}} </strong> </p>
                    </div>
                </div>
                <hr>
                <div class="dt-card__heading">
                        
                        <h6 class="dt-card__title"> @if(App\InstructionAudience::where('audience', $audience->id)->count() > 0) Liste des instructions relatives à cette audience @else
                        = Aucune instruction ajoutée  
                        @endif</h6>
                    </div>
                    <br>
                    <!-- debut code à probleme -->
                <div class="row" >
                      @foreach (App\InstructionAudience::where('audience', $audience->id)->get() as $item)
                      <?php
                       $item1 = (int)$item->by;
                       $bys = DB::select("SELECT * FROM users WHERE id = :id",['id'=>$item1]);
                       //dump($bys);
                       ?> 
                           @foreach ($bys as $by)
                            <div class="col-12" style="margin-left: 15px">
                                <p> <strong>{{$item->libelle}} </strong>, instruction enregistré par <span class="text-secondary"> {{$by->name}} : {{$by->role}}, le {{$item->created_at->format('d/m/Y')}}</span> </p>
                            </div>
                            @endforeach
                      @endforeach
                </div>
                <!-- fin code à probleme -->
                <hr>
                 <br>
                <div class="row" >
                        <div class="col-8"></div>
                        <div >
                                @if(Auth::user()->role == 'Agent cabinet' || Auth::user()->role == 'Chef agent-cabinet')
                                  <a href="{{route('instructions.audience.add', $audience->id)}} " class="btn btn-warning text-white ">Ajouter instruction</a>
                                @endif
                            </div>
                            <div style="margin-left:5px">
                                @if(Auth::user()->role == 'Agent cabinet' ||  Auth::user()->role == 'Chef agent-cabinet')
                                  <a href="{{route('audiences.edit', $audience->id)}} " class="btn btn-info ">Modifier
                                  </a>
                                @endif
                            </div>
                            <div style="margin-left:5px">
                                    <a href=" {{route('audiences.index')}} " class="btn btn-secondary ">Retour</a>
                            </div>
                    </div>

        </div>
        <!-- /card body -->

    </div>
    <!-- /card -->

</div>
</div>

</div>
</div>

  @stop