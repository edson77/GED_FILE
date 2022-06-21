@extends('dashboard.layouts.template')

  @section('title') GED SED - Enregistrer courrier interne @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Enregistrer un courrier interne</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('courrier.interne.index')}} "> <i class="icon icon-description"></i> Courriers internes</a> / <b class="text-secondary"> Nouveau </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet d'Enregistrer un courrier interne.  </div>
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
            <form action=" {{route('courrier.interne.store')}} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Catégorie</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="categorie" id="simple-select">
                                <option value="Correspondance confidentielle">Correspondance confidentielle</option>
                                <option value="Dossier disciplinaire">Dossier disciplinaire</option>
                                <option value="Courrier confidentiel">Courrier confidentiel</option>
                                <option value="Courrier Départ Public">Courrier Départ Public</option>
                                <option value="Courrier Interne">Courrier Interne</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nature</label>

                        <div class="col-md-10 col-sm-9">
                        <select class="form-control form-control-sm" name="naturecourrier" id="simple-select">
                                <option value="DCC">DCC</option>
                                <option value="DP">DP</option>
                                <option value="DES">DES</option>
                                <option value="DCAL">DCAL</option>
                                <option value="DTL">DTL</option>
                                <option value="DAAFD">DAAFD</option>
                                <option value="DAG">DAG</option>
                                <option value="IGGN">IGGN</option>
                                <option value="CT1">CT1</option>
                                <option value="CT2">CT2</option>
                                <option value="CT3">CT3</option>
                                <option value="CT4">CT4</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
                </div>
                
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Initiateur interne </label>
                            <div class="col-md-10 col-sm-9">
                                <select class="form-control form-control-sm" name="emetteur" id="simple-select">
                                    <option value="" class="text-secondary">Choisir une direction centrale</option>
                                    @foreach ($direction as $item)
                                        <option value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                    @endforeach

                                    <option value=""></option>
                                    <option value="" class="text-secondary">Choisir une direction</option>
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
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Initiateur externe </label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="signataire"
                                   placeholder="Entrez l'initiateur du courrier externe">
                            </div>
                        
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Coursier</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="coursier"
                                   placeholder="Nom de la personne qui dépose le courrier">
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Type</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="type" id="simple-select">
                                <option value="Fiche">Fiche</option>
                                <option value="MP">MP</option>
                                <option value="MRP">MRP</option>
                                <option value="Message">Message</option>
                                <option value="Lettre">Lettre</option>
                                <option value="Compte rendu">Compte rendu</option>
                                <option value="Rapport">Rapport</option>
                                <option value="Note">Note</option>
                                <option value="Note service">Note service</option>
                                <option value="Plis fermé">Plis fermé</option>
                                 <option value="Correspondance administrative">Correspondance administrative</option>
                                <option value="Note spéciale">Note spéciale</option>
                                <option value="Autorisation d'absences">Autorisation d'absence</option>
                                <option value="Plainte">Plainte</option>
                                <option value="Requete">Requete</option>
                                <option value="Demande">Demande</option>
                                <option value="Transmis">Transmis</option>
                                <option value="BE">BE</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">N° Traitement</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="numero" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   placeholder="Numéro du courrier" >
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Destinataire</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="destinataire"
                                   placeholder="Personne à qui le courrier est destiné">
                        </div>
                </div>

            <div class="form-group form row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date traitement</label>
                            <div class="input-group date form_date col-md-10 col-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input name="reception" class="form-control" size="16" type="date"   value="" >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                                
                            </div>
                            <!--<input type="hidden" name="reception" id="dtp_input2" value="" required />--><br/>
            </div>

                <div class="form-group form row">
                        <label for="normal-input-5"
                          class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date relance</label>
                        <!-- <div class='input-group date col-md-10 col-sm-9' id='datetimepicker2'>
                            <input name="relance" class="form-control" size="16" type="date"   value=""  >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            
                        </div> -->
                        <div class='input-group date col-md-10 col-sm-9' id='datetimepicker2'>
                                     <input type='text' name="relance" size="16" class="form-control" value=""  >
                                    <span class="input-group-addon"><i class=""></i></span>
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                            
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="text-area-1">Objet*</label>

                        <div class="col-md-10 col-sm-9">
                            <textarea name="objet" class="form-control" id="text-area-1" rows="3"
                                      placeholder="Objet du courrier" required></textarea>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="text-area-1">Contenu</label>

                        <div class="col-md-10 col-sm-9">
                            <textarea name="contenu" class="form-control" id="text-area-1" rows="3"
                                      placeholder="Decription du courrier (facultatif)"></textarea>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Mention</label>

                        <div class="col-md-10 col-sm-9">
                            <select name="mention" class="form-control form-control-sm" id="simple-select">
                                <option value="Urgent">Urgent</option>
                                <option value="Très urgent">Très urgent</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="file-field">Pièce jointe (PDF)</label>

                        <div class="col-md-10 col-sm-9">
                            <div class="custom-file form-control-sm">
                                <input type="file" name="fichier">
                            </div>
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