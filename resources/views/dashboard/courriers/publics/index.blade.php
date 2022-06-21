@extends('dashboard.layouts.template')

  @section('title') GED SED - les courriers publics @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Les courriers publics</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> Courriers publics </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                    <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les courriers publics .  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">

                        <div class="row">
                                <div class="col-10"><form class="form-inline" action= "{{route('courrier.public.search')}} " method="post" >
                                       @csrf
                                       <div class="form-group mr-4">
                                           <label for="email-3" class="sr-only">Nature</label>
                                           <select class="form-control form-control-sm" name="naturecourrier" id="simple-select">
                                                   <option selected="selected" value="">Choisir une nature de courrier</option>
                                                   <option value="DCC">DCC</option>
                                                    <option value="DP">DP</option>
                                                    <option value="DES">DES</option>
                                                    <option value="DCAL">DCAL</option>
                                                    <option value="DCAL-A">DCAL-A</option>
                                                    <option value="DTL">DTL</option>
                                                    <option value="DAAFD">DAAFD</option>
                                                    <option value="IGGN">IGGN</option>
                                                    <option value="DAG">DAG</option>
                                                    <option value="CT1">CT1</option>
                                                    <option value="CT2">CT2</option>
                                                    <option value="CT3">CT3</option>
                                                    <option value="CT4">CT4</option>
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
                                                            <option value="Plainte">Plainte</option>
                                                            <option value="Requete">Requete</option>
                                                            <option value="Demande">Demande</option>
                                                            <option value="Transmis">Transmis</option>
                                                            <option value="BE">BE</option>
                                                            <option value="Autres">Autres</option>                                                       </select>
                                               </div>
                                       <div class="form-group">
                                           <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                                       </div>
                                   </form>
                                </div>
                                <div class="col-2">
                                   <div class="form-group">
                                       <a href=" {{route('courriers.public.print')}}"   target="_blank" class="btn btn-info btn-sm">  Imprimer la liste</a>
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
                                <th >N°</th>
                                <th>Code</th>
                                <th>Institution</th>
                                <th>Numéro d'ordre</th>
                                <th>Nature</th>
                                <th>Date</th>
                                <th>Objet</th>
                            @if( Auth::user()->role == 'Chef service-courrier' || Auth::user()->role == 'Agent cabinet' || Auth::user()->role == 'Agent service-courrier')
                                <th>Actions</th>
                            @endif
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($courriers as $item)
                                  @if($item->deleted == 0)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('courrier.show', $item->id)}} ">{{$item->code}}</a>  </td>
                                                <td > {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td > {{$item->ordre}} </td>
                                                <td > {{$item->naturecourrier}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 20%"> {{$item->objet}} </td>
                                                @if( Auth::user()->role == 'Chef service-courrier'   || Auth::user()->role == 'Agent cabinet' || Auth::user()->role == 'Agent service-courrier')
                                                <td >
                                                    @if( Auth::user()->role == 'Chef service-courrier' || Auth::user()->role == 'Agent cabinet')  
                                                        @if($item->nature == 0 )
                                                           <a href="{{route('courrier.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                           <a href="{{route('courrier.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ce courrier?');" title="Supprimer" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                        @else
                                                           <a href="{{route('courrier.interne.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                        @endif
                                                    
                                                    @else(Auth::user()->role == 'Agent service-courrier')
                                                    <a href="{{route('courrier.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ce courrier?');" title="Supprimer" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                    @endif
                                               @else  

                                                @endif
                                                </td>
                                        </tr>
                                    @else
                                        <tr class="gradeX bg-dark">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > {{$item->code}}  </td>
                                                <td > {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td > {{$item->ordre}} </td>
                                                <td > {{$item->naturecourrier}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 20%"> {{$item->objet}} </td>
                                                @if( Auth::user()->role == 'Chef service-courrier'   || Auth::user()->role == 'Agent cabinet' || Auth::user()->role == 'Agent service-courrier')
                                                <td >
                                                    @if(Auth::user()->role == 'Agent service-courrier')
                                                    <a href=""> </a>
                                                    @endif
                                               @else  

                                                @endif
                                                </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /tables -->

                </div>
                <!-- /card body -->

            </div>

</div>
</div>

    </div>
 </div>

  @stop