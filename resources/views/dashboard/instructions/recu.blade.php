@extends('dashboard.layouts.template')

  @section('title') GED SED - les instructions reçus @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-9">Les instructions reçus</h1>
                    <div class="dt-page__title col-3"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> Instructions reçus </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de gérer les instructions reçus.  </div>
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
                                <th>Code Courrier</th>
                                <th>Coté à</th>
                                <th>Numéro Traitement</th>
                                <th>Instructions</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                
                                
                                @php $services = App\Service::where('id_direction', Auth::user()->direction)->get();@endphp
                                          @foreach($services as $item)
                                              @php $inst = App\Instruction::where('service', $item->id)->get();@endphp
                                              @if($inst != '0')
                                                  @foreach($inst as $item)
                                                  <tr class="gradeX">
                                                        <td> @php echo $i++; @endphp </td>
                                                        <td > <a href=" {{route('courrier.interne.show', $item->courrier)}} ">{{App\Courrier::find($item->courrier) != null ? App\Courrier::find($item->courrier)->code : ""}}</a>  </td>
                                                        <td >  @if($item->direction != '0') {{App\Direction::find($item->direction)->nom_direction }} @elseif($item->service != '0') {{App\Service::find($item->service)->nom_service }} @endif  </td>
                                                        <td > {{App\Courrier::find($item->courrier) != null ? App\Courrier::find($item->courrier)->ordre : ""}} </td>
                                                        <td > {{$item->instruction}} </td>
                                                        <td > {{$item->created_at->format('d/m/Y')}} </td>
                                                  </tr>
                                                  @endforeach
                                              @endif
                                          @endforeach
                                @foreach ($instructions as $item)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > <a href=" {{route('courrier.interne.show', $item->courrier)}} ">{{App\Courrier::find($item->courrier) != null ? App\Courrier::find($item->courrier)->code : ""}}</a>  </td>
                                                <td >  @if($item->direction != '0') {{App\Direction::find($item->direction)->nom_direction }} @elseif($item->service != '0'){{App\Service::find($item->service)->nom_service }} @endif  </td>
                                                <td > {{App\Courrier::find($item->courrier) != null ? App\Courrier::find($item->courrier)->ordre : ""}} </td>
                                                <td > {{$item->instruction}} </td>
                                                <td > {{$item->created_at->format('d/m/Y')}} </td>
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
