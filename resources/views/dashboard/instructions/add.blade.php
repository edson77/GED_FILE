@extends('dashboard.layouts.template')

  @section('title') GED SED - Enregistrer une instruction @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-9">Enregistrer une instruction sur le courrier <span class="text-secondary">{{$courrier->code}}</span>  </h1>
                    <div class="dt-page__title col-3"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> Instruction </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet d'enregistrer une instruction sur un courrier.  </div>
                </div>
  <div class="row">

  <div class="col-12">

    <!-- Card -->
    <div class="dt-card">

        <!-- Card Header -->
        <div class="dt-card__header">

            <!-- Card Heading -->
            <div class="dt-card__heading">
                <h6 class="dt-card__title">Veuillez remplir tous les champs marqués d'une  étoile, ils sont obligatoires.</h6>
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

            <!-- Form -->
            <form action=" {{route('instructions.save', $courrier->id)}} " method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Côté à</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="destinataire" id="simple-select">
                                <option value="" class="text-secondary">Choisir une direction</option>
                                @foreach ($direction as $item)
                                    <option value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir une sous direction</option>
                                @foreach ($sous_direction as $item)
                                    <option value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir un service</option>
                                @foreach ($service as $item)
                                    <option value="{{$item->id}}-service "> {{$item->nom_service}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Instruction</label>
                        <div class="col-md-10 col-sm-9">
                            <textarea rows="5" name="instruction" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Libellé de l'instruction" > </textarea>
                        </div>
                </div>
                    <hr>
                    <div class="form-group form-row" style="text-align: center">
                           <div class="col-9"></div>
                            <div >
                                <button type="submit" class="btn btn-primary ">Enregistrer
                                </button>
                            </div>

                            <div style="margin-left:3px">
                                    <button type="reset" class="btn btn-secondary ">Annuler
                                    </button>
                                </div>
                    </div>
                
            </form>
            <!-- /form -->

        </div>
        <!-- /card body -->

    </div>
    <!-- /card -->

</div>
</div>

</div>
</div>

  @stop