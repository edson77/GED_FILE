@extends('dashboard.layouts.template')

  @section('title') GED SED - Détails courrier @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Détails courrier</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <b class="text-secondary"> Détails </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de consulter les détails d'un courrier.  </div>
                </div>
  <div class="row">

  <div class="col-12">

    <!-- Card -->
    <div class="dt-card">

        <!-- Card Header -->
        <div class="dt-card__header">

            <!-- Card Heading -->
            <div class="dt-card__heading">
                <h6 class="dt-card__title">Détails du courrier (code: {{$courrier->code}}).</h6>
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
                    <div class="col-4">
                        <p>Code: <strong>{{$courrier->code}} </strong> </p>
                        <p > Nature :  <strong>{{$courrier->naturecourrier}}</strong></p>
                        <p>Categorie: <strong>{{$courrier->categorie}} </strong> </p>
                        <p>Reçu par: <strong>{{App\User::find($courrier->recepteur)->name}} </strong> </p>
                        <p>Objet: <strong>{{$courrier->objet}} </strong> </p>
                    </div>
                    <div class="col-4">
                         <p>Numéro traitement: <strong>{{$courrier->ordre}} </strong></p>
                         <p>Initiateur Externe (Signataire): <strong>{{$courrier->signataire}} </strong> </p>
                         <p>Type: <strong>{{$courrier->type}} </strong> </p>
                         <p>Date Traitement: <strong>{{$courrier->reception}} </strong> </p>
                         <p>Description: <strong>{{$courrier->contenu}} </strong> </p>
                    </div>
                    <div class="col-4">
                        <!-- <p>Ordre: <strong>{{$courrier->ordre}} </strong> </p> -->
                        <p>  @if($courrier->direction != NULL) Initiateur Interne (Direction): <strong>{{App\Direction::find($courrier->direction)->nom_direction}}</strong> @elseif($courrier->service != NULL) Initiateur Interne (Service) :<strong>{{App\Service::find($courrier->service)->nom_service}} </strong> @else Initiateur Interne  :<strong> RAS </strong> @endif 
                        </p>
                        <p>Coursier: <strong>{{$courrier->coursier}} </strong> </p>
                        <p>Mention: <strong>{{$courrier->mention}} </strong> </p>
                        
                        <p>Pièce jointe: <strong><a href="{{asset($courrier->fichier)}} " target="_blank">  {{$courrier->fichier}}</a>
                            <!-- <a href="#" data-toggle="modal"
                            data-target="#form-modal"><i class="icon icon-editors text-secondary"></i></a>  --> </strong> </p>
                    </div>
                    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog"
                                         aria-labelledby="model-8"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <!-- Modal Content -->
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h3 class="modal-title" id="model-8">Modifier la piéce jointe du courrier (code: {{$courrier->code}})</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- /modal header -->

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form method="post" action=" {{route('courrier.changePdf', $courrier->id)}} " enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group form-row">
                                                                    <label class="col-md-3 col-sm-4 col-form-label text-sm-right"
                                                                           for="file-field">Pièce jointe (PDF) :</label>
                                            
                                                                    <div class="col-md-9 col-sm-8">
                                                                        <div class="custom-file form-control-sm">
                                                                            <input type="file" name="fichier" required>
                                                                        </div>
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
                </div>
                <hr>
                 <br>
                     <div class="dt-card__heading">
                        
                        <h6 class="dt-card__title"> 
                                @if(Auth::user()->role == "Chef service-courrier" || Auth::user()->role == "Agent cabinet" || Auth::user()->role == "Chef courrier-confidentiel" || Auth::user()->role == "Chef direction" || Auth::user()->role == "Chef sous-direction" || Auth::user()->role == "Chef services" || Auth::user()->role == "DAG" || Auth::user()->role == "SED")
                                    @if(App\Instruction::where('courrier', $courrier->id)->count() > 0) Liste des instructions relatives à ce courrier (code: {{$courrier->code}}). @else
                                    Aucune instruction ajoutée @endif
                                @endif
                        </h6>
                </div>
                    <br>
                <div class="row" >
                
                      @php
                        if(Auth::user()->role == "Chef service-courrier" || Auth::user()->role == "Agent cabinet" || Auth::user()->role == "Chef courrier-confidentiel" || Auth::user()->role == "Chef direction" || Auth::user()->role == "Chef sous-direction" || Auth::user()->role == "Chef services" || Auth::user()->role == "DAG" || Auth::user()->role == "SED"){
                            $instructions =  App\Instruction::where('courrier', $courrier->id)->get();
                         }
                      @endphp
                      @foreach (App\Instruction::where('courrier', $courrier->id)->get() as $item)
                            <div class="col-12" style="margin-left: 15px">
                               
                                <p>Coté à :<span class="text-secondary"><strong>@if($item->direction != '0') {{App\Direction::find($item->direction)->nom_direction }} @elseif($item->service != '0') {{App\Service::find($item->service)->nom_service }} @endif : </strong> </span> instruction <span class="text-secondary"><strong>{{$item->instruction}}</strong> </span>,  enregistré par <span class="text-secondary"> {{App\User::find($item->by)->name}} : {{App\User::find($item->by)->role}}, le {{$item->created_at->format('d/m/Y')}}</span> </p>
                              
                            </div>
                      @endforeach
                      <!-- @foreach (App\Instruction::where('courrier', $courrier->id)->where('service', Auth::user()->role == "Chef service-courrier")->get() as $item)
                            <div class="col-12" style="margin-left: 15px">
                              <p> <strong>{{$item->instruction}} </strong>, instruction enregistré par <span class="text-secondary"> {{App\User::find($item->by)->name}} : {{App\User::find($item->by)->role}}, le {{$item->created_at->format('d/m/Y')}}</span> </p>
                            </div>  
                      @endforeach  -->
                    </div>
                    <hr>
                 <br>
                <div class="row" >
                        <div class="col-8"></div>
                        <div >
                                @if(Auth::user()->role == 'Agent cabinet' || Auth::user()->role == 'Chef agent-cabinet')
                                  <a href="{{route('instructions.add', $courrier->id)}} " class="btn btn-warning text-white ">Ajouter instruction</a>
                                @endif
                            </div>
                            <div >
                                @if(Auth::user()->role != 'Chef direction')
                                <a href="{{route('courrier.interne.edit', $courrier->id)}} " class="btn btn-info ">Modifier</a>
                                @endif
                            </div>
                            <div style="margin-left:5px"> 
                                    <a href=" {{route('courrier.print', $courrier->id)}} " target="_blank" class="btn btn-primary ">Imprimer
                                    </a>
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