@extends('dashboard.layouts.template')

  @section('title') GED SED - le fichier journal @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-8">Le fichier journal</h1>
                    <div class="dt-page__title col-4"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a> / <span class="text-secondary"> Fichier Journal </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de consulter la liste des opérations effectuées dans le système.  </div>
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
                                        <a href=" {{route('fichier.print')}}" target="_blank" class="btn btn-info btn-sm">  Imprimer le fichier journal</a>
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
                                <th>Libelle</th>
                                <th>Auteur</th>
                                <th>Rôle</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($logs as $item)
                                        <tr class="gradeX">
                                                <td> @php echo $i++; @endphp </td>
                                                <td > {{$item->libelle}} </td>
                                                <td > {{App\User::find($item->auteur)->name}} </td>
                                                <td > {{App\User::find($item->auteur)->role}}</td>
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