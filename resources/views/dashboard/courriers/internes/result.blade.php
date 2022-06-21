@extends('dashboard.layouts.template')

  @section('title') GED SED - Résultat de la recherche dans le courrier interne @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Résultat recherche courrier interne</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <a href="{{route('courrier.interne.index')}} "><i class="icon icon-description"></i> Courriers internes</a> / <b class="text-secondary"> Résultats </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface affiche les résultats de votre recherche dans les courriers internes.  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">

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
                                <th>Date</th>
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
                                                <td > <a href=" {{route('courrier.show', $item->id)}} ">{{$item->code}}</a>  </td>
                                                <td > {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td > {{$item->signataire}} </td>
                                                <td > {{$item->categorie}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 25%"> {{$item->objet}} </td>
                                                <td style="width: 15%">
                                                    @if(Auth::user()->role != "SED")
                                                     <a href="{{route('courrier.interne.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                    @endif
                                                    <a href="{{route('courrier.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ce courrier?');" title="Supprimer" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                </td>
                                        </tr>
                                    @else
                                        <tr class="gradeX bg-dark">
                                                <td> @php echo $i++; @endphp </td>
                                                <td> {{$item->code}}  </td>
                                                <td> {{$item->entreprise}} </td>
                                                <td> {{$item->signataire}} </td>
                                                <td> {{$item->categorie}} </td>
                                                <td> {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 25%" > {{$item->objet}} </td>
                                                <td style="width: 15%">
                                                  @if(Auth::user()->role != "SED")
                                                    <a   class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                  @endif
                                                    <a  class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
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