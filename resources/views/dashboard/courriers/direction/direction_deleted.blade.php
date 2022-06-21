@extends('dashboard.layouts.template')

  @section('title') GED SED - les courriers @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Les courriers supprimés</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <a href="{{route('courrier.direction')}} "><i class="icon icon-description"></i> Courriers</a> / <b class="text-secondary">Courriers supprimés </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les courriers supprimés.  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">
                <br>
                <div class="row">
                        <div class="col-9">
                        </div>
                        <div class="col-3">
                           <div class="form-group">
                               @if($courriers->count() > 0)
                                    <a href=" {{route('direction.print.deleted')}}" target="_blank" class="btn btn-info btn-sm">  Imprimer la liste des courriers supprimés</a>
                               @else
                                    <a href="#" onclick="return alert('Aucun courrier supprimé');" class="btn btn-info btn-sm">  Imprimer la liste des courriers supprimés</a>  
                               @endif
                           </div> 
                       </div>

                    </div>

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
                                <th>type</th>
                                <th>Date</th>
                                <th>Objet</th>
                                <th>supprimé par</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($courriers as $item)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('courrier.show', $item->id)}} ">{{$item->code}}</a>  </td>
                                                <td >  {{$item->entreprise == null ? "Non défini (Courrier interne) " :  $item->entreprise }} </td>
                                                <td > {{$item->signataire}} </td>
                                                <td > {{$item->categorie}} </td>
                                                <td> {{$item->type}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 22%"> {{$item->objet}} </td>
                                                <td > {{App\User::find($item->by) != null ? App\User::find($item->by)->name : " "}} </td>
                                                <td >
                                                    <a href="{{route('courrier.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment réactiver ce courrier?');" title="Réactiver" class="btn btn-success btn-sm mr-2 mb-2"><i class="icon icon-check text-white" ></i> </a>
                                                </td>
                                        </tr>
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