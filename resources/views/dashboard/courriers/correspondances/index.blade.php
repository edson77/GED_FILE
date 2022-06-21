@extends('dashboard.layouts.template')

  @section('title') GED SED - les correspondances confidentielles @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Les correspondances confidentielles</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> correspondances confidentielles </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les correspondances confidentielles.  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">

                        <div class="row">
                                <div class="col-10"><form class="form-inline" action= "{{route('correspondance.search')}} " method="post" >
                                       @csrf
                                       <div class="form-group mr-4">
                                           <label for="email-3" class="sr-only">Catégorie</label>
                                           <select class="form-control form-control-sm" name="categorie" id="simple-select">
                                                   <option selected="selected" value="">Choisir une catégorie</option>
                                                   <option  value="Correspondance Confidentielle">Correspondance Confidentielle</option>
                                                   <option value="Chancellerie">Chancellerie</option>
                                                   <option value="Service discipline contentieux">Service discipline contentieux</option>
                                                   <option value="Courrier confidentiel">Courrier confidentiel</option>
                                                   <option value="Logistique">Logistique</option>
                                                   <option value="Finance">Finance</option>
                                           </select>
                                       </div>
                                       <div class="form-group mr-4">
                                               <label for="email-3" class="sr-only">Choisir une mention</label>
                                               <select class="form-control form-control-sm" name="mention" id="simple-select">
                                                       <option selected="selected" value="">Choisir une mention</option>
                                                       <option value="Urgent">Urgent</option>
                                                       <option value="Très urgent">Très urgent</option>
                                                       <option value="Normal">Normal</option>
                                               </select>
                                           </div>
       
                                           <div class="form-group mr-4">
                                                   <label for="email-3" class="sr-only">Choisir un type</label>
                                                   <select class="form-control form-control-sm" name="type" id="simple-select">
                                                           <option selected="selected" value="">Choisir un type</option>
                                                           <option value="Fichier">Fichier</option>
                                                           <option value="MP">MP</option>
                                                           <option value="MPP">MPP</option>
                                                           <option value="Message">Message</option>
                                                           <option value="Compte rendu">Compte rendu</option>
                                                           <option value="Rapport">Rapport</option>
                                                           <option value="Note">Note</option>
                                                           <option value="Note service">Note service</option>
                                                           <option value="Plis fermé">Plis fermé</option>
                                                           <option value="Plainte">Plainte</option>
                                                            <option value="Requete">Requete</option>
                                                            <option value="Demande">Demande</option>
                                                            <option value="Transmis">Transmis</option>
                                                            <option value="BE">BE</option>
                                                            <option value="Autres">Autres</option>
                                                       </select>
                                               </div>
                                       <div class="form-group">
                                           <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                                       </div>
                                   </form>
                                </div>
                                <div class="col-2">
                                   <div class="form-group">
                                       <a href=" {{route('correspondance.print')}}"   target="_blank" class="btn btn-info btn-sm">  Imprimer la liste</a>
                                   </div> 
                               </div>
       
                            </div>
                            <hr>
                        
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

                    <!-- Tables -->
                    
                    <div class="table-responsive">

                        <table id="data-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Code</th>
                                <th>Institution</th>
                                <th>Signataire</th>
                                <th>Catégorie</th>
                                <th>type</th>
                                <th>Date Traitement</th>
                                <th>Objet</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($courriers as $item)
                                  @if($item->deleted == 0)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('courrier.interne.show', $item->id)}} ">{{$item->code}}</a>  </td>
                                                <td > {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td > {{$item->signataire}} </td>
                                                <td > {{$item->categorie}} </td>
                                                <td > {{$item->type}} </td>
                                                <td > {{$item->reception}} </td>
                                                <td style="width: 25%"> {{$item->objet}} </td>
                                                <td style="width: 15%">
                                                    @if($item->nature == 0 )
                                                        <a href="{{route('courrier.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                    @else
                                                        <a href="{{route('courrier.interne.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                    @endif
                                                    <a href="{{route('courrier.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ce courrier?');" title="Supprimer" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                </td>
                                        </tr>
                                    @else
                                        <tr class="gradeX bg-dark">
                                                <td> @php echo $i++; @endphp </td>
                                                <td> {{$item->code}}  </td>
                                                <td> {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td> {{$item->signataire}} </td>
                                                <td> {{$item->categorie}} </td>
                                                <td> {{$item->type}} </td>
                                                <td> {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 25%" > {{$item->objet}} </td>
                                                <td style="width: 15%">
                                                    <a   class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                    <a   title="Desactiver" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /tables -->
                    <!--
                    <div class="form-group">
                        <a href=" {{route('courriers.print.all')}}" target="_blank" class="btn btn-primary btn-sm">Imprimer</a>
                    </div> -->

                </div>
                <!-- /card body -->

            </div>

</div>
</div>

    </div>
 </div>

  @stop