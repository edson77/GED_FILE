<aside id="main-sidebar" class="dt-sidebar">
    <div class="dt-sidebar__container">

        <!-- Sidebar Navigation -->
        <ul class="dt-side-nav">

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Navigation</span>
            </li>
            <li class="dt-side-nav__item">
                <a href="{{route('home')}} " class="dt-side-nav__link" title="Metrics">
                    <i class="icon icon-home icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Accueil</span>
                </a>
            </li>

            @if(Auth::user()->role == "SED" || Auth::user()->role == "Agent cabinet" )
            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Les courriers reçus">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers reçus</span>
                </a>

                <ul class="dt-side-nav__sub-menu">

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.direction')}} " class="dt-side-nav__link" title="Consulter les courriers reçus">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href=" {{route('direction.deleted')}} " class="dt-side-nav__link" title="Les courriers supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul>
            </li> 
            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Courriers publics">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers Arrivés publics</span>
                </a>

                <ul class="dt-side-nav__sub-menu">
                  @if(Auth::user()->role != "SED")
                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.create')}} " class="dt-side-nav__link" title="Enregistrer un courrier public">
                            <i class="icon icon-plus icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Nouveau</span>
                        </a>
                    </li>
                  @endif

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.index')}} " class="dt-side-nav__link" title="Consulter les courriers publics">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href=" {{route('courrier.delete')}} " class="dt-side-nav__link" title="Courriers publics supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Courriers internes">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Opérations internes</span>
                </a>

                <ul class="dt-side-nav__sub-menu">
                 @if(Auth::user()->role != "SED")
                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.interne.create')}} " class="dt-side-nav__link" title="Enregistrer un courrier interne">
                            <i class="icon icon-plus icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Nouveau</span>
                        </a>
                    </li>
                 @endif

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.interne.index')}} " class="dt-side-nav__link" title="Consulter courrier interne">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href=" {{route('courrier.interne.delete')}} " class="dt-side-nav__link" title="Courriers internes supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Courriers confidentiels">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers confidentiel</span>
                </a>

                <ul class="dt-side-nav__sub-menu">

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.confidentiel')}} " class="dt-side-nav__link" title="Consulter courriers confidentiels">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href=" {{route('confidentiel.deleted')}} " class="dt-side-nav__link" title="Courriers confidentiels supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Correspondance confidentielle">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Correspondance confidentielle</span>
                </a>

                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.correspondance')}} " class="dt-side-nav__link" title="Consulter correspondances confidentielle">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href=" {{route('correspondance.deleted')}} " class="dt-side-nav__link" title="Correspondances confidentielles supprimées">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Les audiences">
                    <i class="icon icon-user icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Audiences</span>
                </a>

                <ul class="dt-side-nav__sub-menu">
                        @if(Auth::user()->role != "SED")
                    <li class="dt-side-nav__item">
                        <a href="{{route('audiences.create')}} " class="dt-side-nav__link" title="Enregistrer une audience">
                            <i class="icon icon-plus icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Nouveau</span>
                        </a>
                    </li>
                  @endif
                    <li class="dt-side-nav__item">
                        <a href="{{route('audiences.index')}} " class="dt-side-nav__link" title="Consulter les audiences">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>
                </ul>
            </li>

            
            @if(Auth::user()->role == "Agent cabinet")
            <li class="dt-side-nav__item">
                    <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Consulter les instructions sur les courriers">
                        <i class="icon icon-task-manager icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Instructions</span>
                    </a>
    
                    <ul class="dt-side-nav__sub-menu">
                        <li class="dt-side-nav__item">
                            <a href="{{route('instructions.index')}} " class="dt-side-nav__link" title="Consulter les instructions">
                                <i class="icon icon-eye icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Consulter</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @endif

            @if(Auth::user()->role == "Agent service-courrier" || Auth::user()->role == "Chef service-courrier")
            <li class="dt-side-nav__item">
                @if(Auth::user()->role == "Agent service-courrier")
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Instructions Chef Service-courrier">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers SCDA</span>
                </a>
                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <li class="dt-side-nav__item">
                            <a href="{{route('instructions.recu')}} " class="dt-side-nav__link" title="Mes courriers cotés">
                                    <i class="icon icon-task-manager icon-fw icon-lg"></i>
                                    <span class="dt-side-nav__text">Consulter</span>
                            </a>
                        </li>
                    </li>
                </ul> 
                @endif
                
            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Courriers Public">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers Arrivés publics</span>
                </a>

                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.create')}} " class="dt-side-nav__link" title="Enregistrer nouveau Courrier">
                            <i class="icon icon-plus icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Nouveau</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.index')}} " class="dt-side-nav__link" title="Liste des Courriers Publics">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>
                    @if(Auth::user()->role == "Chef service-courrier")
                        <li class="dt-side-nav__item">
                            <a href=" {{route('courrier.delete')}} " class="dt-side-nav__link" title="Courrier Supprimés">
                                <i class="icon icon-trash icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Supprimés</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            @if(Auth::user()->role == "Chef service-courrier")
            <li class="dt-side-nav__item">
                <a href="{{route('courrier.service_discipline')}} " class="dt-side-nav__link" title="Dossier disciplinaire">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Dossier disciplinaire</span>
                </a>

                <!-- <ul class="dt-side-nav__sub-menu">

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.service_discipline')}} " class="dt-side-nav__link" title="Consulter Dossier disciplinaire">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>
                     <li class="dt-side-nav__item">
                        <a href=" {{route('service_discipline.deleted')}} " class="dt-side-nav__link" title="Dossier disciplinaire supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                </ul> -->
            </li>

            <li class="dt-side-nav__item">
            @php $ser = App\Service::where('id', Auth::user()->service)->get(); @endphp
                @foreach ($ser as $item) 
                        
                             <li class="dt-side-nav__item">
                                <a href="{{route('courrier.service', $item->id) }} " class="dt-side-nav__link" title="Mes courriers">
                                    <i class="icon icon-description icon-fw icon-lg"></i>
                                    <span class="dt-side-nav__text">Mes Courriers </span>
                                </a>
                            </li>
                            <li class="dt-side-nav__item">
                                <a href="{{route('instructions.recu')}} " class="dt-side-nav__link" title="Mes courriers cotés">
                                    <i class="icon icon-task-manager icon-fw icon-lg"></i>
                                    <span class="dt-side-nav__text">Instructions cotées</span>
                                </a>
                            </li>
                        
                @endforeach
                    <!-- <a href="{{route('instructions.recu')}} " class="dt-side-nav__link" title="Mes Courriers">
                        <i class="icon icon-task-manager icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Mes Courriers</span>
                    </a> -->
            </li>
            
            @endif

            @endif

            @if(Auth::user()->role == "Agent cabinet-dcc")
            <li class="dt-side-nav__item">
                    <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Les courriers reçus">
                        <i class="icon icon-description icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Courriers DCC</span>
                    </a>
    
                    <ul class="dt-side-nav__sub-menu">
    
                        <li class="dt-side-nav__item">
                            <a href="{{route('courrier.direction')}} " class="dt-side-nav__link" title="Consulter les courriers reçus">
                                <i class="icon icon-eye icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Consulter</span>
                            </a>
                        </li>
    
                        <li class="dt-side-nav__item">
                            <a href=" {{route('direction.deleted')}} " class="dt-side-nav__link" title="Les courriers supprimés">
                                <i class="icon icon-trash icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Supprimés</span>
                            </a>
                        </li>
                    </ul>
                </li> 
                
                <!-- <li class="dt-side-nav__item">
                    <a href="{{route('instructions.recu')}} " class="dt-side-nav__link" title="Mes courriers cotés">
                        <i class="icon icon-task-manager icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Instructions cotées</span>
                    </a>
                </li> -->
            @endif

            @if(Auth::user()->role == "Chef courrier-confidentiel" )
                <li class="dt-side-nav__item">
                    <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Courriers confidentiels">
                        <i class="icon icon-description icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Courriers confidentiels</span>
                    </a>
    
                    <ul class="dt-side-nav__sub-menu">
    
                        <li class="dt-side-nav__item">
                            <a href="{{route('courrier.confidentiel')}} " class="dt-side-nav__link" title="Consulter courriers confidentiels">
                                <i class="icon icon-eye icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Consulter</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href=" {{route('confidentiel.deleted')}} " class="dt-side-nav__link" title="Courriers confidentiels supprimés">
                                <i class="icon icon-trash icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Supprimés</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="dt-side-nav__item">
                    <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Dossier disciplinaire">
                        <i class="icon icon-description icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Dossier disciplinaire</span>
                    </a>
    
                    <ul class="dt-side-nav__sub-menu">
    
                        <li class="dt-side-nav__item">
                            <a href="{{route('courrier.service_discipline')}} " class="dt-side-nav__link" title="Consulter Dossier disciplinaire">
                                <i class="icon icon-eye icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Consulter</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href=" {{route('service_discipline.deleted')}} " class="dt-side-nav__link" title="Dossier disciplinaire supprimés">
                                <i class="icon icon-trash icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Supprimés</span>
                            </a>
                        </li>
                    </ul>
                </li>

            @endif

           @if(Auth::user()->role == "Chef direction" || Auth::user()->role == "Chef sous-direction" || Auth::user()->role == "Chef sections" || Auth::user()->role =="Chef services")
            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Les courriers reçus">
                    <i class="icon icon-description icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Courriers reçus</span>
                </a>

                <ul class="dt-side-nav__sub-menu">

                    <li class="dt-side-nav__item">
                        <a href="{{route('courrier.direction')}} " class="dt-side-nav__link" title="Consulter les courriers reçus">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href=" {{route('direction.deleted')}} " class="dt-side-nav__link" title="Les courriers supprimés">
                            <i class="icon icon-trash icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Supprimés</span>
                        </a>
                    </li>
                    
                </ul>
            </li> 
            @if(Auth::user()->direction != '0')
                   @php $sub = App\Direction::where('parent', Auth::user()->direction)->get(); @endphp
                    @foreach ($sub as $item) 
                        @php $cour = App\Courrier::where('direction', $item->id)->count(); @endphp
                        @if($cour > 0)
                                <li class="dt-side-nav__item" style="margin-left: 5px">
                                    <a href="{{route('courrier.subdiv', $item->id)}} " class="dt-side-nav__link" title="Metrics">
                                        <i class="icon icon-description icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Courrier de la {{$item->nom_direction}} </span>
                                    </a>
                                </li>
                        @endif
                    @endforeach
                    @php $ser = App\Service::where('id_direction', Auth::user()->direction)->get(); @endphp
                    @foreach ($ser as $item) 
                        @php $cour = App\Courrier::where('service', $item->id)->count(); @endphp
                        @if($cour > 0)
                                <li class="dt-side-nav__item">
                                    <a href="{{route('courrier.service', $item->id) }} " class="dt-side-nav__link" title="Service">
                                        <i class="icon icon-description icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Courrier {{$item->nom_service}} </span>
                                    </a>
                                </li>
                        @endif
                    @endforeach
                @elseif(Auth::user()->service != '0')
                    @php $sub = App\Service::where('direction_id', Auth::user()->direction)->get(); @endphp
                    @foreach ($sub as $item) 
                        @php $cour = App\Courrier::where('direction', $item->id)->count(); @endphp
                        @if($cour > 0)
                            <li class="dt-side-nav__item">
                                <a href="{{route('courrier.subdiv', $item->id)}} " class="dt-side-nav__link" title="Sous direction">
                                    <i class="icon icon-description icon-fw icon-lg"></i>
                                    <span class="dt-side-nav__text">Courrier {{$item->nom_direction}} </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
                    <li class="dt-side-nav__item">
                            <a href="{{route('instructions.recu')}} " class="dt-side-nav__link" title="Courriers cotés">
                                <i class="icon icon-task-manager icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Instructions cotées</span>
                            </a>
                    </li>
           @endif
           @if( Auth::user()->role == "Super admin")
           <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Les utilisateurs">
                    <i class="icon icon-users icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Les utilisateurs</span>
                </a>

                <ul class="dt-side-nav__sub-menu">

                    <li class="dt-side-nav__item">
                        <a href="{{route('users.create')}} " class="dt-side-nav__link" title="Enregistrer un utilisateur">
                            <i class="icon icon-plus icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Nouveau</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href=" {{route('users.index')}} " class="dt-side-nav__link" title="Consulter les utilisateurs">
                            <i class="icon icon-eye icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Consulter</span>
                        </a>
                    </li>
                </ul>
            </li>

            @endif
            @if(Auth::user()->role == "SED" || Auth::user()->role == "Super admin")
                <li class="dt-side-nav__item">
                    <a href="{{route('logs')}} " class="dt-side-nav__link" title="Metrics">
                        <i class="icon icon-forms-basic icon-fw icon-lg"></i>
                        <span class="dt-side-nav__text">Fichier journal</span>
                    </a>
                </li>

            @endif




            <!-- /menu item -->

            <!-- 
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Data Visualization</span>
            </li> -->

            <!-- Menu Item -->
       
        </ul>
        <!-- /sidebar navigation -->

    </div>
</aside>
<!-- /sidebar -->