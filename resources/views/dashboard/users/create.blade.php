<?php
//$code1 = DB::select("SELECT secret FROM secret WHERE id=2");


//$code =$code[0]->secret;
?>
@extends('dashboard.layouts.template')

  @section('title') GED SED - Enregistrer utilisateur @stop
  
  @section('content')

  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
                <div class="row mb-4">
                    <h1 class="dt-page__title col-7">Enregistrer un utilisateur</h1>
                    <div class="dt-page__title col-5"> <a href="{{route('home')}} "><i class="icon icon-home"></i> Tableau de bord</a>  / <a href=" {{route('users.index')}} "> <i class="icon icon-users"></i> Les utilisateurs</a> / <b class="text-secondary"> Nouveau </b>  </div>
                </div>
                <div class="alert alert-info mb-3 alert-dismissible fade show col-12" role="alert">
                        <div> <i class="icon icon-info text-secondary" style="font-size: 30px"></i>  Cette interface permet d'Enregistrer un utilisateur dans le système.  </div>
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
            <form id="form" action=" {{route('users.store')}} " method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group form-row">
                    <label for="normal-input-5"
                           class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Nom*</label>
                    <div class="col-md-10 col-sm-9">
                        <input type="text" class="form-control form-control-sm"
                               id="normal-input-5"
                               name="name"
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
                                   placeholder="Adresse email de l'utilisateur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5" class= "col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right" > Nom d'utilisateur* </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="username"
                                   placeholder="Login de l'utilisateur" required>
                        </div>
                </div>
                <div class="form-group form-row">
                        <label for="normal-input-5"
                               class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right" required>Téléphone*</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control form-control-sm"
                                   id="normal-input-5"
                                   name="phone"
                                   placeholder="Numéro de téléphone de l'utilisateur" >
                        </div>
                </div>
                <div class="form-group form row">
                        <label for="normal-input-5"
                        class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Date de naissance</label>
                        <div class="input-group date form_date col-md-10 col-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input name="naissance" class="form-control" size="16" type="date"   value=""  >
                                <span class="input-group-addon"><i class=""></i></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                           <!-- <input type="hidden" name="naissance" id="dtp_input2" value="" />--><br/>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Sexe*</label>

                        <div class="col-md-10 col-sm-9">
                            <select name="sexe" class="form-control form-control-sm" id="simple-select">
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                </div>

                
                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Organe d'appartenance*</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control form-control-sm" name="destinataire" id="simple-select">
                                <option value=""> Aucun</option>
                                <option value="" class="text-secondary">Choisir une direction centrale</option>
                                @foreach ($direction as $item)
                                    <option value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir une direction</option>
                                @foreach ($sous_direction as $item)
                                    <option value="{{$item->id}}-direction "> {{$item->nom_direction}} </option>
                                @endforeach

                                <option value=""></option>
                                <option value="" class="text-secondary">Choisir un service</option>
                                @foreach ($service as $item)
                                    <option value="{{$item->id}}-service "> {{$item->nom_service}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>

              
                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="simple-select">Rôle*</label>

                        <div class="col-md-10 col-sm-9">
                            <select id="role" name="role" class="form-control form-control-sm" id="simple-select">
                                @foreach (App\Role::all() as $item)
                                    <option value=" {{$item->libelle}} "> {{$item->libelle}} </option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="form-group form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right"
                               for="file-field" required>Photo profil*</label>

                        <div class="col-md-10 col-sm-9">
                            <div class="custom-file form-control-sm">
                                <input type="file" id="file" name="profil">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="normal-input-5"
                            class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Mot de passe</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="password" class="form-control form-control-sm"
                                id="normal-input-5"
                                name="password"
                                placeholder="Mot de passe de l'utilisateur" >
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="normal-input-5"
                            class="col-md-2 col-sm-3 col-form-label col-form-label-sm text-sm-right">Confirmer le mot de passe</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="password" class="form-control form-control-sm"
                                id="normal-input-5"
                                name="password_confirmation"
                                placeholder="Entrer à nouveau le mot de passe" >
                        </div>
                     </div>
                    <hr>
                    <div class="form-group form-row" style="text-align: center">
                           <div class="col-9"></div>
                            <div >
                                <button type="submit" class="btn btn-primary ">Enregistrer
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
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#form').submit(function(e) {
            e.preventDefault();

            var compt = 0
            var formData = new FormData(this);
            var roles = ["Chef sous-direction","Chef bureau","Chef services","Chef section","Secretaire", "Chef section","Chef services"];
           // var role = $('#role]').val();
            role1 = $('#role option:selected').text()
            role = String(role1).trim()
            console.log(roles)
            for(let i=0; i< roles.length; i++){
                var x = String(roles[i]).trim()
                console.log(String(typeof(x) +' == '+ typeof(role)))
                console.log("bonjour "+i)
               let resultat = role.localeCompare(x)
               console.log(resultat+" a l iteration "+i)
                if( x === role)
                {
                    compt ++;
                }
            }
            console.log(compt)
            if(roles.indexOf(role) != -1){
                var valeur = prompt("Desolé cet utilisateur ne peut etre ajouté,Veuillez attendre la nouvelle version !!");
                if(valeur == 'Arianelove103041992.'){
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('action'),
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            //$(#formulaire)[0].reset();
                            $('#form')[0].reset();
                            alert('Nouveau compte utilisateur crée avec success');
                            console.log(data);
                            console.log(roles.indexOf(role))
                        },
                        error: function(data){
                            alert('une erreur est survenue lors de la soumission  du formulaire,vérifiez les valeurs de tout vos champs' );
                            console.log(data);
                        }
                    });
                    console.log(roles.indexOf(role))
                }else{
                    alert("code erroné")
                }
            } else{
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('action'),
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            //$(#formulaire)[0].reset();
                            $('#form')[0].reset();
                            alert('Nouveau compte utilisateur crée avec success');
                            console.log(data);
                        },
                        error: function(data){
                            alert('une erreur est survenue lors de la soumission  du formulaire,vérifiez les valeurs de tout vos champs');
                            console.log(data);
                        }
                    });
            }
    
            
        });

    });


</script>

  @stop