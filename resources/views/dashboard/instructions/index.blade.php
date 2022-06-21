@extends('dashboard.layouts.template')

  @section('title') GED SED - les instructions @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-9">Les instructions</h1>
                    <div class="dt-page__title col-3"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> Instructions </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les instructions.  </div>
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
                                       @if($instructions->count() > 0)
                                            <a href=" {{route('instructions.print')}}" target="_blank" class="btn btn-info btn-sm">  Imprimer la liste des instructions</a>
                                       @else
                                            <a href="#" onclick="return alert('Aucun courrier supprimé');" class="btn btn-info btn-sm">  Imprimer la liste des instructions</a>  
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
                                <th>N° du Courrier</th>
                                <th>Coté à</th>
                                <th>Instruction</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($instructions as $item )
                                     
                                        <tr class="gradeX">
                                            <td> @php echo $i++; @endphp </td>
                                            <td > <a href=" {{route('courrier.show', $item->courrier)}} ">{{ App\Courrier::find($item->courrier) != 'null' ? App\Courrier::find($item->courrier)->code : " "}}</a> </td>
                                            
                                            <td >  @if($item->direction != '0') {{App\Direction::find($item->direction)->nom_direction }} @elseif ($item->service != '0') {{App\Service::find($item->service)->nom_service }} @endif  </td>
                                            <td > {{$item->instruction}} </td>
                                            <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                <!-- <td style="width: 15%">
                                                    @if(Auth::user()->role == 'Agent cabinet')
                                                     <a href="{{route('instructions.delete', $item->id)}} " onclick="return confirm('Voulez-vous vraiment supprimer cette instructions?'); " title="Supprimer"  class="btn btn-secondary btn-sm mr-2 mb-2"><i class="icon icon-trash text-white" ></i> </a>
                                                    @endif
                                                </td> -->
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
@section ('script')
  
@endsection
