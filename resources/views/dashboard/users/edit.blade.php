@extends('dashboard.layouts.template')

  @section('title') GED SED - Modifier compte utilisateur @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Modifier compte utilisateur</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('users.index')}} "> <i class="icon icon-users"></i> Les utilisateurs</a> / <span class="text-secondary"> Modifier </span>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet de modifier  un compte utilisateur dans le système.  </div>
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
            <form action=" {{route('users.update', $user->id)}} " method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group form-row">
                    <label for="normal-input-5"
                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nom*</label>
                    <div class="col-md-10 col-sm-9">
                        <input type="text" class="form-control form-control-sm"
                               id="normal-input-5"
                               name="name"
                               value=" {{request()->old('name') ? request()->old('name')  : $user->name }} "
                               placeholder="Nom complet de l'utilisateur" required>
                    </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Matricule*</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="matricule"
                                   value=" {{request()->old('matricule') ? request()->old('matricule')  : $user->matricule }} "
                                   placeholder="Matricule de l'utilisateur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Adresse email*</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="email" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="email"
                                   value=" {{request()->old('email') ? request()->old('email')  : $user->email }} "
                                   placeholder="Adresse email de l'utilisateur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nom d'utilisateur*</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="username"
                                   value=" {{request()->old('username') ? request()->old('username')  : $user->username }} "
                                   placeholder="Login de l'utilisateur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Téléphone</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="telephone"
                                   value=" {{request()->old('telephone') ? request()->old('telephone')  : $user->telephone }} "
                                   placeholder="Numéro de téléphone de l'utilisateur" >
                        </div>
                </div>
                <div class="form-group form row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date de naissance</label>
                        <div class="input-group date form_date col-md-10 col-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value=" {{request()->old('naissance') ? request()->old('naissance')  : $user->naissance }} "   value="" readonly >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" name="naissance" id="dtp_input2" value=" {{request()->old('naissance') ? request()->old('naissance')  : $user->naissance }} "  /><br/>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Sexe*</label>

                        <div class="col-md-10 col-sm-9">
                            <select name="sexe" class="form-control form-control-sm" id="simple-select">
                                <option @if($user->sexe == "M")  selected = "selected" @endif value="M">Masculin</option>
                                <option @if($user->sexe == "F")  selected = "selected" @endif value="F">Féminin</option>
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Organe d'appartenance*</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="destinataire" id="simple-select">
                                <option value=""> Aucun</option>
                                <option value="" class="text-secondary">Choisir une direction</option>
                                @foreach ($direction as $item)
                                    <option @if($user->direction == $item->id) selected = "selected" @endif value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir une sous direction</option>
                                @foreach ($sous_direction as $item)
                                    <option @if($user->direction == $item->id) selected = "selected" @endif value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir un service</option>
                                @foreach ($service as $item)
                                    <option @if($user->service == $item->id) selected = "selected" @endif value="{{$item->id}}-service "> {{$item->nom_service}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>

              
                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Rôle*</label>

                        <div class="col-md-10 col-sm-9">
                            <select name="role" class="form-control form-control-sm" id="simple-select">
                                @foreach (App\Role::all() as $item)
                                    <option @if($user->role == $item->libelle) selected = "selected" @endif value=" {{$item->libelle}} "> {{$item->libelle}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>
                    <hr>
                    <div class="form-group form-row" style="text-align: center">
                           <div class="col-9"></div>
                            <div >
                                <button type="submit" class="btn btn-primary ">Modifier
                                </button>
                            </div>

                            <div style="margin-left:3px">
                                    <button type="reset" class="btn btn-secondary ">Annuler
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