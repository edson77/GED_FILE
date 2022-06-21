@extends('dashboard.layouts.template')

  @section('title') GED SED - Enregistrer une audience @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Enregistrer une nouvelle audience</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('audiences.index')}} "> <i class="icon icon-description"></i> Audiences</a> / <b class="text-secondary"> Nouveau </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet d'enregistrer une audience.  </div>
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
            <form action=" {{route('audiences.store')}} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Personne demandée</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="role" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   value = "SED/CGN"
                                   readonly="true"
                                   placeholder="Personne demandé" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Visiteur</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="guest" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Nom du visiteur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Contact</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="phone" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Téléphone du visiteur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Qualité</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="quality" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Fonction du visiteur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Objet</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="objet" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Objet de l'audience" required>
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