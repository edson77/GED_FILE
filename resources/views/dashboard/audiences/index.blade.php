@extends('dashboard.layouts.template')

  @section('title') GED SED - les demandes d'audiences @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Les demandes d'audiences</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> demandes d'audiences </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les demandes d'audiences.  </div>
                </div>
  <div class="row">

  <div class="col-12">

        <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">
                        <div class="row">
                                <div class="col-9">
                                </div>
                                <div class="col-3">
                                   <div class="form-group">
                                       @if($audiences->count() > 0)
                                            <a href=" {{route('audiences.print')}}" target="_blank" class="btn btn-info btn-sm">  Imprimer la liste des audiences</a>
                                       @else
                                            <a href="#" onclick="return alert('Aucun courrier supprimé');" class="btn btn-info btn-sm">  Imprimer la liste des audiences</a>  
                                       @endif
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
                                <th>Noms Visiteurs</th>
                                <th>Contacts</th>
                                <th>Fonctions</th>
                                <th>Objet</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($audiences as $item)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('audiences.show', $item->id)}} ">{{$item->guest}}</a>  </td>
                                                <td > {{$item->phone}} </td>
                                                <td > {{$item->quality}} </td>
                                                <td > {{$item->objet}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <td style="width: 15%">
                                                    @if(Auth::user()->role == 'Agent cabinet')
                                                     <a href="{{route('audiences.edit', $item->id)}} " title="Modifier"  class="btn btn-primary btn-sm mr-2 mb-2"><i class="icon icon-editors text-white" ></i> </a>
                                                    @else
                                                      <span class="text-primary">Aucune action définie</span>
                                                    @endif
                                                </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- /card body -->

            </div>

</div>
</div>

    </div>
 </div>

  @stop