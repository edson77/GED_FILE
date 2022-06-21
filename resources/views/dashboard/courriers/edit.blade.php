@extends('dashboard.layouts.template')

  @section('title') GED SED - Modifier courrier @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Modifier un courrier</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('courrier.index')}} "> <i class="icon icon-description"></i> Courriers</a> / <b class="text-secondary"> Modifier </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de modifier les informations d'un courrier.  </div>
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
            <form action=" {{route('courrier.update', $courrier->id)}} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-row">
                    <label for="normal-input-5"
                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Institution</label>
                    <div class="col-md-10 col-sm-9">
                        <input type="text" class="form-control form-control-sm"
                               id="normal-input-5"
                               name="entreprise"
                               placeholder="Nom de l'entreprise" 
                               value = {{request()->old('entreprise') ? request()->old('entreprise') : $courrier->entreprise }}
                               >
                    </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nature</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="naturecourrier" id="simple-select">
                                <option @if($courrier->naturecourrier == "IGGN") selected="selected" @endif value="IGGN">IGGN</option>
                                <option @if($courrier->naturecourrier == "DCC") selected="selected" @endif value="DCC">DCC</option>
                                <option @if($courrier->naturecourrier == "DP") selected="selected" @endif value="DP">DP</option>
                                <option @if($courrier->naturecourrier == "DES") selected="selected" @endif value="DES">DES</option>
                                <option @if($courrier->naturecourrier == "DCAL") selected="selected" @endif value="DCAL">DCAL</option>
                                <option @if($courrier->naturecourrier == "DTL") selected="selected" @endif value="DTL">DTL</option>
                                <option @if($courrier->naturecourrier == "DP") selected="selected" @endif value="DP">DP</option>
                                <option @if($courrier->naturecourrier == "DAAFD") selected="selected" @endif value="DAAFD">DAAFD</option>
                                <option @if($courrier->naturecourrier == "DAG") selected="selected" @endif value="DAG">DAG</option>
                                <option @if($courrier->naturecourrier == "CT1") selected="selected" @endif value="CT1">CT1</option>
                                <option @if($courrier->naturecourrier == "CT2") selected="selected" @endif value="CT2">CT2</option>
                                <option @if($courrier->naturecourrier == "CT3") selected="selected" @endif value="CT3">CT3</option>
                                <option @if($courrier->naturecourrier == "CT4") selected="selected" @endif value="CT4">CT4</option>
                                <option @if($courrier->naturecourrier == "Autres") selected="selected" @endif value="Autres">Autres</option>
                            </select>
                        </div>
                </div>
                
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Signataire</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="signataireExt" class="form-control form-control-sm" id="normal-input-5" value="{{request()->old('signataire') ? request()->old('signataire') : $courrier->signataire }} " placeholder="Nom de la personne qui signe">
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Coursier</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="coursier"
                                   value="{{ request()->old('coursier') ? request()->old('coursier') : $courrier->coursier }} "
                                   placeholder="Nom de la personne qui dépose le courrier">
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Type</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="type" id="simple-select">
                                <option @if($courrier->type == "Fichier") selected="selected" @endif value="Fichier">Fichier</option>
                                <option @if($courrier->type == "MP") selected="selected" @endif value="MP">MP</option>
                                <option @if($courrier->type == "MPP") selected="selected" @endif value="MPP">MPP</option>
                                <option @if($courrier->type == "Message") selected="selected" @endif value="Message">Message</option>
                                <option @if($courrier->type == "Compte rendu") selected="selected" @endif value="Compte rendu">Compte rendu</option>
                                <option @if($courrier->type == "Rapport") selected="selected" @endif value="Rapport">Rapport</option>
                                <option @if($courrier->type == "Note") selected="selected" @endif value="Note">Note</option>
                                <option @if($courrier->type == "Note service") selected="selected" @endif value="Note service">Note service</option>
                                <option @if($courrier->type == "Plis fermé") selected="selected" @endif value="Plis fermé">Plis fermé</option>
                                <option @if($courrier->type == "Plainte") selected="selected" @endif value="Plainte">Plainte</option>
                                <option @if($courrier->type == "Requete") selected="selected" @endif value="Requete">Requete</option>
                                <option @if($courrier->type == "Demande") selected="selected" @endif value="Demande">Demande</option>
                                <option @if($courrier->type == "Transmis") selected="selected" @endif value="Transmis">Transmis</option>
                                <option @if($courrier->type == "BE") selected="selected" @endif value="BE">BE</option>
                                <option @if($courrier->type == "Autres") selected="selected" @endif value="Autres">Autres</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">N° Traitement</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="numero" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   value="{{request()->old('numero') ? request()->old('numero') : $courrier->numero }}"
                                   placeholder="Numéro du courrier">
                        </div>
                </div>

                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">N° d'ordre</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="ordre" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   value="{{request()->old('order') ? request()->old('order') : $courrier->ordre}} "
                                   placeholder="Numéro d'ordre du courrier">
                        </div>
                </div>

                <div class="form-group form row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date Traitement</label>
                        <div class="input-group date form_date col-md-10 col-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" data-target-input="nearest">
                                <input name="reception" readonly="true" class="form-control" size="16" type="date"   value="{{request()->old('reception') ? request()->old('reception') : $courrier->reception}}"  >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                                
                        </div>
                            <!--<input type="hidden" name="reception" id="dtp_input2" value="" required />--><br/>
                </div>
                <div class="form-group form row">
                        <label for="normal-input-5"  class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date relance</label>
                        <!-- <div class='input-group date col-md-10 col-sm-9' id='datetimepicker2'>
                            <input name="relance" class="form-control" size="16" type="date"   value=""  >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            
                        </div> -->
                        <div class='input-group date col-md-10 col-sm-9' id='datetimepicker2'>
                            <input type='text' name = "relance" class="form-control" value="{{request()->old('relance') ? request()->old('relance') : $courrier->relance}}" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            
                        </div> 
            
                </div>
                
                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Destinataire</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="destinataire" id="simple-select">
                                <option value="" class="text-secondary">Choisir une direction</option>
                                @foreach ($direction as $item)
                                    <option @if($courrier->direction != NULL && $courrier->direction == $item->id) selected="selected" @endif value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir une sous direction</option>
                                @foreach ($sous_direction as $item)
                                    <option @if($courrier->direction != NULL && $courrier->direction == $item->id) selected="selected" @endif  value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir une sous direction</option>
                                @foreach ($service as $item)
                                    <option @if($courrier->service != NULL && $courrier->service == $item->id) selected="selected" @endif  value="{{$item->id}}-service "> {{$item->nom_service}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="text-area-1">Objet</label>

                        <div class="col-md-10 col-sm-9">
                            <textarea name="objet" class="form-control" id="text-area-1" rows="3"
                                      placeholder="Objet du courrier"> {{$courrier->objet}} </textarea>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="text-area-1">Contenu</label>

                        <div class="col-md-10 col-sm-9">
                            <textarea name="contenu" class="form-control" id="text-area-1" rows="3"
                                      placeholder="Decription du courrier (facultatif)">{{$courrier->contenu}}
                            </textarea>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Mention</label>

                        <div class="col-md-10 col-sm-9">
                            <select name="mention" class="form-control form-control-sm" id="simple-select">
                                <option @if($courrier->mention == "Urgent") selected="selected" @endif value="Urgent">Urgent</option>
                                <option @if($courrier->mention == "Très urgent") selected="selected" @endif value="Très urgent">Très urgent</option>
                                <option @if($courrier->mention == "Normal") selected="selected" @endif value="Normal">Normal</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="file-field">Pièce jointe (PDF)</label>

                        <div class="col-md-10 col-sm-9">
                            <div class="custom-file form-control-sm">
                                <input type="file" name="fichier" value=" {{request()->old('fichier') ? request()->old('fichier') : $courrier->fichier }} ">
                            </div>
                        </div>
                </div>
                    <hr>
                    <div class="form-group form-row" style="text-align: center">
                           <div class="col-9"></div>
                            <div >
                                <button type="submit" class="btn btn-primary ">Modifier
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