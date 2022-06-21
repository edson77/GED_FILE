@extends('dashboard.layouts.template')

  @section('title') GED SED - les utilisateurs @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Les utilisateurs</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> utilisateurs </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                    <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les utilisateurs du système.  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">
                <div class="row">
                                <div class="col-10">
                                </div>
                                <div class="col-2">
                                   <div class="form-group">
                                       <a href=" {{route('users.print')}}"   target="_blank" class="btn btn-info btn-sm">  Imprimer la liste des utilisateurs</a>
                                   </div> 
                               </div>
       
                            </div>
                        
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
                                <th>Nom</th>
                                <th>Matricule</th>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Organe</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($users as $item)
                                  @if($item->deleted == 0)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('users.show', $item->id)}} ">{{$item->name}}</a>  </td>
                                                <td > {{ $item->matricule }}</td>
                                                <td > {{$item->username}} </td>
                                                <td > {{$item->email}} </td>
                                                <td > 
                                                    @if($item->direction != '0')
                                                      {{App\Direction::find($item->direction)->nom_direction}}
                                                    @else
                                                       @if($item->service != '0')
                                                         {{App\Service::find($item->service)->nom_service}}
                                                       @else
                                                           Aucun
                                                       @endif
                                                    @endif
                                                </td>
                                                <td > {{$item->role}} </td>
                                                <td style="width: 15%">
                                                    <a href="{{route('users.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment désactiver le compte cet utilisateur?');" title="Supprimer" class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                </td>
                                        </tr>
                                    @else
                                    <tr class="gradeX bg-dark" >
                                        <td> @php echo $i++; @endphp </td>
                                        <td > <a href=" {{route('users.show', $item->id)}} ">{{$item->name}}</a>  </td>
                                        <td > {{ $item->matricule }}</td>
                                        <td > {{$item->username}} </td>
                                        <td > {{$item->email}} </td>
                                        <td > 
                                            @if($item->direction != '0')
                                                {{App\Direction::find($item->direction)->nom_direction}}
                                            @else
                                                @if($item->service != '0')
                                                    {{App\Service::find($item->service)->nom_service}}
                                                @else
                                                    Aucun
                                                @endif
                                            @endif
                                        </td>
                                        <td > {{$item->role}} </td>
                                        <td style="width: 15%">
                                            <a href="{{route('users.desactivate', $item->id)}}" onclick="return confirm('voulez-vous vraiment réactiver ce compte utilisateur?');" title="Réactiver" class="btn btn-success btn-sm mr-2 mb-2"><i class="icon icon-check text-white" ></i> </a>
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