<?php
use Illuminate\Support\Facades\DB;
$janvier=0;$fevrier=0;$mars=0;$avril=0;$mai=0;$juin=0;$juillet=0;$aout=0;$septembre=0;$octobre=0;$novembre=0;$decembre=0;
$janvier2=0;$fevrier2=0;$mars2=0;$avril2=0;$mai2=0;$juin2=0;$juillet2=0;$aout2=0;$septembre2=0;$octobre2=0;$novembre2=0;$decembre2=0;
$janvier3=0;$fevrier3=0;$mars3=0;$avril3=0;$mai3=0;$juin3=0;$juillet3=0;$aout3=0;$septembre3=0;$octobre3=0;$novembre3=0;$decembre3=0;
$janvier4=0;$fevrier4=0;$mars4=0;$avril4=0;$mai4=0;$juin4=0;$juillet4=0;$aout4=0;$septembre4=0;$octobre4=0;$novembre4=0;$decembre4=0;
$janvier5=0;$fevrier5=0;$mars5=0;$avril5=0;$mai5=0;$juin5=0;$juillet5=0;$aout5=0;$septembre5=0;$octobre5=0;$novembre5=0;$decembre5=0;
$janvier6=0;$fevrier6=0;$mars6=0;$avril6=0;$mai6=0;$juin6=0;$juillet6=0;$aout6=0;$septembre6=0;$octobre6=0;$novembre6=0;$decembre6=0;
$janvier7=0;$fevrier7=0;$mars7=0;$avril7=0;$mai7=0;$juin7=0;$juillet7=0;$aout7=0;$septembre7=0;$octobre7=0;$novembre7=0;$decembre7=0;
$janvier8=0;$fevrier8=0;$mars8=0;$avril8=0;$mai8=0;$juin8=0;$juillet8=0;$aout8=0;$septembre8=0;$octobre8=0;$novembre8=0;$decembre8=0;
$janvier9=0;$fevrier9=0;$mars9=0;$avril9=0;$mai9=0;$juin9=0;$juillet9=0;$aout9=0;$septembre9=0;$octobre9=0;$novembre9=0;$decembre9=0;
$janvier10=0;$fevrier10=0;$mars10=0;$avril10=0;$mai10=0;$juin10=0;$juillet10=0;$aout10=0;$septembre10=0;$octobre10=0;$novembre10=0;$decembre10=0;
$janvier11=0;$fevrier11=0;$mars11=0;$avril11=0;$mai11=0;$juin11=0;$juillet11=0;$aout11=0;$septembre11=0;$octobre11=0;$novembre11=0;$decembre11=0;
$janvier12=0;$fevrier12=0;$mars12=0;$avril12=0;$mai12=0;$juin12=0;$juillet12=0;$aout12=0;$septembre12=0;$octobre12=0;$novembre12=0;$decembre12=0;

$tests =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 0
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests as $test){
                                        
                                        if($test->mois == 1){ $janvier= (int)$test->total;}if($test->mois == 2){ $fevrier = (int)$test->total;}if($test->mois == 3){ $mars = (int)$test->total;}
                                        if($test->mois == 4){ $avril = (int)$test->total;}if($test->mois == 5){ $mai =(int)$test->total;}if($test->mois == 6){ $juin = (int)$test->total;}
                                        if($test->mois == 7){ $juillet = (int)$test->total;}if($test->mois == 8){ $aout = (int)$test->total;}if($test->mois == 9){ $septembre = (int)$test->total;}
                                        if($test->mois == 10){ $octobre = (int)$test->total;}if($test->mois == 11){ $novembre = (int)$test->total;}if($test->mois == 12){ $decembre =(int)$test->total;}
                                        
                                    }

$tests2 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 0
                                                AND deleted = 1
                                                GROUP BY annee, mois
                                                 
                                    ");
                                    foreach($tests2 as $test2){
                                        
                                        if($test2->mois == 1){ $janvier2= (int)$test2->total;}if($test2->mois == 2){ $fevrier2 = (int)$test2->total;}if($test2->mois == 3){ $mars2 = (int)$test2->total;}
                                        if($test2->mois == 4){ $avril2 = (int)$test2->total;}if($test2->mois == 5){ $mai2 =(int)$test2->total;}if($test2->mois == 6){ $juin2 = (int)$test2->total;}
                                        if($test2->mois == 7){ $juillet2 = (int)$test2->total;}if($test2->mois == 8){ $aout2 = (int)$test2->total;}if($test2->mois == 9){ $septembre2 = (int)$test2->total;}
                                        if($test2->mois == 10){ $octobre2 = (int)$test2->total;}if($test2->mois == 11){ $novembre2 = (int)$test2->total;}if($test2->mois == 12){ $decembre2 =(int)$test2->total;}
                                        
                                    }

$tests3 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 1
                                                AND categorie = 'Courrier confidentiel'
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests3 as $test){
                                        
                                        if($test->mois == 1){ $janvier3= (int)$test->total;}if($test->mois == 2){ $fevrier3 = (int)$test->total;}if($test->mois == 3){ $mars3 = (int)$test->total;}
                                        if($test->mois == 4){ $avril3 = (int)$test->total;}if($test->mois == 5){ $mai3 =(int)$test->total;}if($test->mois == 6){ $juin3 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet3 = (int)$test->total;}if($test->mois == 8){ $aout3 = (int)$test->total;}if($test->mois == 9){ $septembre3 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre3 = (int)$test->total;}if($test->mois == 11){ $novembre3 = (int)$test->total;}if($test->mois == 12){ $decembre3 =(int)$test->total;}
                                        
                                    }
 
 $tests4 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 1
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests4 as $test){
                                        
                                        if($test->mois == 1){ $janvier4= (int)$test->total;}if($test->mois == 2){ $fevrier4 = (int)$test->total;}if($test->mois == 3){ $mars4 = (int)$test->total;}
                                        if($test->mois == 4){ $avril4 = (int)$test->total;}if($test->mois == 5){ $mai4 =(int)$test->total;}if($test->mois == 6){ $juin4 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet4 = (int)$test->total;}if($test->mois == 8){ $aout4 = (int)$test->total;}if($test->mois == 9){ $septembre4 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre4 = (int)$test->total;}if($test->mois == 11){ $novembre4 = (int)$test->total;}if($test->mois == 12){ $decembre4 =(int)$test->total;}
                                        
                                    }

 $tests5 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 1
                                                AND categorie = 'Correspondance confidentielle'
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests5 as $test){
                                        
                                        if($test->mois == 1){ $janvier5= (int)$test->total;}if($test->mois == 2){ $fevrier5 = (int)$test->total;}if($test->mois == 3){ $mars5 = (int)$test->total;}
                                        if($test->mois == 4){ $avril5 = (int)$test->total;}if($test->mois == 5){ $mai5 =(int)$test->total;}if($test->mois == 6){ $juin5 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet5 = (int)$test->total;}if($test->mois == 8){ $aout5 = (int)$test->total;}if($test->mois == 9){ $septembre5 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre5 = (int)$test->total;}if($test->mois == 11){ $novembre5 = (int)$test->total;}if($test->mois == 12){ $decembre5 =(int)$test->total;}
                                        
                                    }       
                                    
 $tests6 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM audiences
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests6 as $test){
                                        
                                        if($test->mois == 1){ $janvier6= (int)$test->total;}if($test->mois == 2){ $fevrier6 = (int)$test->total;}if($test->mois == 3){ $mars6 = (int)$test->total;}
                                        if($test->mois == 4){ $avril6 = (int)$test->total;}if($test->mois == 5){ $mai6 =(int)$test->total;}if($test->mois == 6){ $juin6 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet6 = (int)$test->total;}if($test->mois == 8){ $aout6 = (int)$test->total;}if($test->mois == 9){ $septembre6 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre6 = (int)$test->total;}if($test->mois == 11){ $novembre6 = (int)$test->total;}if($test->mois == 12){ $decembre6 =(int)$test->total;}
                                        
                                    }

?>
 <?php                                   

 $tests7 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE direction = $au
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests7 as $test){
                                        
                                        if($test->mois == 1){ $janvier7= (int)$test->total;}if($test->mois == 2){ $fevrier7 = (int)$test->total;}if($test->mois == 3){ $mars7 = (int)$test->total;}
                                        if($test->mois == 4){ $avril7 = (int)$test->total;}if($test->mois == 5){ $mai7 =(int)$test->total;}if($test->mois == 6){ $juin7 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet7 = (int)$test->total;}if($test->mois == 8){ $aout7 = (int)$test->total;}if($test->mois == 9){ $septembre7 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre7 = (int)$test->total;}if($test->mois == 11){ $novembre7 = (int)$test->total;}if($test->mois == 12){ $decembre7 =(int)$test->total;}
                                        
                                    } 
 ?>                                     
  
 <?php                                   
  $tests8 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM sessions
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests8 as $test){
                                        
                                        if($test->mois == 1){ $janvier8= (int)$test->total;}if($test->mois == 2){ $fevrier8 = (int)$test->total;}if($test->mois == 3){ $mars8 = (int)$test->total;}
                                        if($test->mois == 4){ $avril8 = (int)$test->total;}if($test->mois == 5){ $mai8 =(int)$test->total;}if($test->mois == 6){ $juin8 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet8 = (int)$test->total;}if($test->mois == 8){ $aout8 = (int)$test->total;}if($test->mois == 9){ $septembre8 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre8 = (int)$test->total;}if($test->mois == 11){ $novembre8 = (int)$test->total;}if($test->mois == 12){ $decembre8 =(int)$test->total;}
                                        
                                    }   
                                   
$tests9 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE nature = 1
                                                AND categorie = 'Dossier disciplinaire' 
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests9 as $test){
                                        
                                        if($test->mois == 1){ $janvier9= (int)$test->total;}if($test->mois == 2){ $fevrier9 = (int)$test->total;}if($test->mois == 3){ $mars9 = (int)$test->total;}
                                        if($test->mois == 4){ $avril9 = (int)$test->total;}if($test->mois == 5){ $mai9 =(int)$test->total;}if($test->mois == 6){ $juin9 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet9 = (int)$test->total;}if($test->mois == 8){ $aout9 = (int)$test->total;}if($test->mois == 9){ $septembre9 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre9 = (int)$test->total;}if($test->mois == 11){ $novembre9 = (int)$test->total;}if($test->mois == 12){ $decembre9 =(int)$test->total;}
                                        
                                    }   
                                   
$tests10 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE service = 7
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests10 as $test){
                                        
                                        if($test->mois == 1){ $janvier10= (int)$test->total;}if($test->mois == 2){ $fevrier10 = (int)$test->total;}if($test->mois == 3){ $mars10 = (int)$test->total;}
                                        if($test->mois == 4){ $avril10 = (int)$test->total;}if($test->mois == 5){ $mai10 =(int)$test->total;}if($test->mois == 6){ $juin10 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet10 = (int)$test->total;}if($test->mois == 8){ $aout10 = (int)$test->total;}if($test->mois == 9){ $septembre10 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre10 = (int)$test->total;}if($test->mois == 11){ $novembre10 = (int)$test->total;}if($test->mois == 12){ $decembre10 =(int)$test->total;}
                                        
                                    } 
                                    
                                    
$tests12 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM sessions
                                                WHERE role = 'Agent service-courrier'
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests12 as $test){
                                        
                                        if($test->mois == 1){ $janvier12= (int)$test->total;}if($test->mois == 2){ $fevrier12 = (int)$test->total;}if($test->mois == 3){ $mars12 = (int)$test->total;}
                                        if($test->mois == 4){ $avril12 = (int)$test->total;}if($test->mois == 5){ $mai12 =(int)$test->total;}if($test->mois == 6){ $juin12 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet12 = (int)$test->total;}if($test->mois == 8){ $aout12 = (int)$test->total;}if($test->mois == 9){ $septembre12 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre12 = (int)$test->total;}if($test->mois == 11){ $novembre12 = (int)$test->total;}if($test->mois == 12){ $decembre12 =(int)$test->total;}
                                        
                                    }     
                                                               
?>
@extends('dashboard.layouts.template')

  @section('title') GED SED - Accueil @stop
  
  @section('content')
  <div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
            <h1 class="dt-page__title">Tableau de bord</h1>
        </div>
        <!-- /page header -->

        <!-- Grid -->
        @if(Auth::user()->role == "SED"  || Auth::user()->role == "Agent cabinet" )
        <div class="row">
            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                       
                       
                        <h4 class="text-body text-uppercase mb-2">Courriers arrivés publics ({{App\Courrier::where('nature',0)->count()}})</h4>
                        <canvas  class="courrier-chart" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> 4545 </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-primary"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.index') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <div class="dt-card__body px-5 py-4">
                        
                        <h4 class="text-body text-uppercase mb-2">Courriers supprimés({{ App\Courrier::where('nature',0)->where('deleted',1)->count() }})</h4>
                        <canvas  class="sup-courrier-chart" width="800" height="450"></canvas>
                       <!-- <div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> {{ App\Courrier::where('nature',0)->where('deleted',1)->count() }} </span>
                        </div> 
                        
                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href=" {{route('courrier.delete')}} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>

                </div>
                <!-- /card -->

            </div>

             <!-- Grid Item -->
             <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <div class="dt-card__body px-5 py-4">
                        
                        <h4 class="text-body text-uppercase mb-2">Courriers confidentiels ({{App\Courrier::where('nature',1)->where('categorie','Courrier confidentiel')->count()}})</h4>
                        <canvas  class="conf-courrier-chart" width="800" height="450"></canvas>
                       <!-- <div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('nature',1)->where('categorie','Courrier confidentiel')->count()}} </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href=" {{route('courrier.confidentiel')}} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>

                </div>
                <!-- /card -->

            </div>

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <div class="dt-card__body px-5 py-4">
                    
                        <h4 class="text-body text-uppercase mb-2">Courriers internes ({{App\Courrier::where('nature',1)->count()}})</h4>
                        <canvas  class="int-courrier-chart" width="800" height="450"></canvas>
                       <!-- <div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('nature',1)->count()}} </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href=" {{route('courrier.interne.index')}} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>

                </div>
                <!-- /card -->

            </div>

        </div>
        <div class="row">
                <!-- Grid Item -->
             <div class="col-xl-3 col-sm-6 col-12">

                    <!-- Card -->
                    <div class="dt-card">
    
                        <div class="dt-card__body px-5 py-4">
                            <h5 class="text-body text-uppercase mb-2">Correspondances confidentiels ({{App\Courrier::where('nature',1)->where('categorie', 'Correspondance confidentielle')->count()}})</h5>
                        
                        <canvas  class="conf-correspondance" width="800" height="450"></canvas>
                           <!-- <div class="d-flex align-items-baseline mb-4">
                                <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('nature',1)->where('categorie', 'Correspondance confidentielle')->count()}} </span>
                            </div>
    
                            <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                <div class="dt-indicator-item__bar">
                                    <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                </div>
                            </div>-->
                            <br>
                            <div class="d-flex align-items-baseline">
                                <a href=" {{route('courrier.correspondance')}} "> <i class="icon icon-eye"></i> Détails</a>
                            </div>
                        </div>
    
                    </div>
                    <!-- /card -->
    
                </div>
                <!-- Grid Item -->
                <div class="col-xl-3 col-sm-6 col-12">
    
                    <!-- Card -->
                    <div class="dt-card">
    
                        <div class="dt-card__body px-5 py-4">
                           
                            <h4 class="text-body text-uppercase mb-2">Audiences ({{App\Audience::all()->count()}})</h4>
                            <canvas  class="audience" width="800" height="450"></canvas>
                           <!-- <div class="d-flex align-items-baseline mb-4">
                                <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Audience::all()->count()}} </span>
                            </div>
    
                            <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                <div class="dt-indicator-item__bar">
                                    <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                </div>
                            </div>-->
                            <br>
                            <div class="d-flex align-items-baseline">
                                <a href=" {{route('audiences.index')}} "> <i class="icon icon-eye"></i> Détails</a>
                            </div>
                        </div>
    
                    </div>
                    <!-- /card -->
    
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
    
                    <!-- Card -->
                    <div class="dt-card">
    
                        <div class="dt-card__body px-5 py-4">
                           
                            <h4 class="text-body text-uppercase mb-2">Courriers reçus ({{App\Courrier::where('direction', Auth::user()->direction)->count()}})</h4>
                            <canvas  class="res-courier" width="800" height="450"></canvas>
                            <!--<div class="d-flex align-items-baseline mb-4">
                                <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('direction', Auth::user()->direction)->count()}} </span>
                            </div>
    
                            <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                <div class="dt-indicator-item__bar">
                                    <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                </div>
                            </div>-->
                            <br>
                            <div class="d-flex align-items-baseline">
                                <a href=" {{route('courrier.direction') }} "> <i class="icon icon-eye"></i> Détails</a>
                            </div>
                        </div>
    
                    </div>
                    <!-- /card -->
    
                </div>
             @if(Auth::user()->role == "SED" )

                <div class="col-xl-3 col-sm-6 col-12">
    
                        <!-- Card -->
                        <div class="dt-card">
        
                            <div class="dt-card__body px-5 py-4">
    
                                <h4 class="text-body text-uppercase mb-2">Historique des connections ({{App\Session::all()->count()}})</h4>
                                <canvas  class="users-con" width="800" height="450"></canvas>
                               <!-- <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Session::all()->count()}} </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href=" {{route('sessions.all')}} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                            </div>
        
                        </div>
                        <!-- /card -->
        
                    </div>
                @endif
                    <!-- /card -->
    
                </div>
    
            </div>
        @endif

        @if(Auth::user()->role == "Super admin")
              <!-- Grid -->
        <div class="row">

                <div class="col-xl-3 col-sm-6 col-12">
    
                        <!-- Card -->
                        <div class="dt-card">
        
                            <div class="dt-card__body px-5 py-4">
                                <h4 class="text-body text-uppercase mb-2">Historique des connections ({{App\Session::all()->count()}})</h4>
                                <canvas  class="users-con" width="800" height="450"></canvas>
                                <!--<div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Session::all()->count()}} </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href=" {{route('sessions.all')}} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                            </div>
        
                        </div>
                        <!-- /card -->
        
                    </div>
            <!-- /grid item -->

        </div>
        @endif

        @if(Auth::user()->role == "Chef service-courrier")
              <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Courriers publics ({{App\Courrier::where('nature', 0)->count()}})</h4>
                        <canvas  class="courrier-chart" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2">
                                {{App\Courrier::where('nature', 0)->count()}}
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.index') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>

            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Courriers supprimés ({{App\Courrier::where('nature',0)->where('deleted', 1)->count()}})</h4>
                        <canvas  class="sup-courrier-chart" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> 
                                {{App\Courrier::where('nature',0)->where('deleted', 1)->count()}}
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.delete') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>

            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Dossiers disciplinaires ({{App\Courrier::where('nature',1)->where('categorie','Dossier disciplinaire')->count()}})</h4>
                        <canvas  class="dicipline" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> 
                                    {{App\Courrier::where('nature',1)->where('categorie','Dossier disciplinaire')->count()}}
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.service_discipline') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>

            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Mes agents connectés ({{App\Session::where('role', "Agent service-courrier")->count()}})</h4>
                        <canvas  class="connect" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Session::where('role', "Agent service-courrier")->count()}} </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('sessions.agent_courrier') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>

            <div class="col-xl-3 col-sm-6 col-12">

            @foreach(App\Service::where('id', Auth::user()->service)->get() as $item)
                <!-- Grid Item -->
                @if($item->nom_service == "SCDA")
                  
    
                        <!-- Card -->
                        <div class="dt-card">
        
                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h4 class="text-body text-uppercase mb-2">Mes Courriers</h4>
                                <canvas  class="sda-courrier" width="800" height="450"></canvas>
                                <!--<div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">
                                            @php echo App\Courrier::where('service', 7)->count(); @endphp
                                    </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href=" {{route('courrier.service', $item->id) }}"> <i class="icon icon-eye"></i> Détails</a> </div>
                            </div>
                            <!-- /bard body -->
        
                        </div>
                        <!-- /card -->
        
                    
    
                </div>
                @endif
            @endforeach
            <!-- /grid item -->

        </div>
        @endif

        @if(Auth::user()->role == "Agent service-courrier")
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Courriers publics ({{App\Courrier::where('nature', 0)->count()}})</h4>
                        <canvas  class="courrier-chart" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2">
                                    {{App\Courrier::where('nature', 0)->count()}}    
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.index') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

        </div>

        @endif

        @if(Auth::user()->role == "Chef courrier-confidentiel")
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Courriers confidentiels ({{App\Courrier::where('nature',1)->where('categorie','Courrier confidentiel')->count()}})</h4>
                        <canvas  class="conf-courrier-chart" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> 
                                    {{App\Courrier::where('nature',1)->where('categorie','Courrier confidentiel')->count()}}
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.confidentiel') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>

            <div class="col-xl-3 col-sm-6 col-12">

                    <!-- Card -->
                    <div class="dt-card">
    
                        <!-- Card Body -->
                        <div class="dt-card__body px-5 py-4">
                                <h4 class="text-body text-uppercase mb-2">Dossier disciplinaires ({{App\Courrier::where('categorie','Dossier disciplinaire')->where('nature', 1)->count()}})</h4>
                                <canvas  class="dicipline" width="800" height="450"></canvas>
                                <!--<div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2"> 
                                            {{App\Courrier::where('categorie','Dossier disciplinaire')->where('nature', 1)->count()}}
                                    </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href="{{route('courrier.service_discipline') }} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                        </div>
                        <!-- /bard body -->
    
                    </div>
                    <!-- /card -->
    
                </div>
            <!-- /grid item -->

        </div>       
        @endif

        @if(Auth::user()->role == "Agent cabinet-dcc")

        <div class="row">

            <!-- Grid Item -->
        
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <div class="dt-card__body px-5 py-4">
                        <h4 class="text-body text-uppercase mb-2">Courriers reçus ({{App\Courrier::where('direction', Auth::user()->direction)->count()}})</h4>
                        <canvas  class="res-courier" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('direction', Auth::user()->direction)->count()}} </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href=" {{route('courrier.direction') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>

                </div>
                <!-- /card -->

            </div>


        </div>

        @endif

        @if(Auth::user()->role == "Chef direction" || Auth::user()->role == "Chef sous-direction" || Auth::user()->role == "Chef sections" || Auth::user()->role ==" Chef services")
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6 col-12">

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        @if(Auth::user()->direction != null AND Auth::user()->service != null)
                        <h4 class="text-body text-uppercase mb-2">Courriers reçus ({{App\Courrier::where('direction', Auth::user()->direction)->count()}})</h4>
                                        
                         @endif
                        <canvas  class="res-courier" width="800" height="450"></canvas>
                        <!--<div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 font-weight-500 text-dark mr-2">
                                    @if(Auth::user()->direction != null )
                                        {{App\Courrier::where('direction', Auth::user()->direction)->count()}}
                                    @elseif(Auth::user()->service != null)
                                        {{App\Courrier::where('service', Auth::user()->service)->count()}};
                                    @endif
                            </span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                            </div>
                        </div>-->
                        <br>
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('courrier.direction') }} "> <i class="icon icon-eye"></i> Détails</a>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

        </div> 


        @if(App\Direction::find(Auth::user()->direction)->nom_direction == "DAG" )
        <div class="row">
                <!-- Grid Item -->
                <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">
        
                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h4 class="text-body text-uppercase mb-2">Courriers publics ({{App\Courrier::where('nature',0)->count()}})</h4>
                                <canvas  class="courrier-chart" width="800" height="450"></canvas>
                               <!-- <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2"> {{App\Courrier::where('nature',0)->count()}} </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-primary"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href="{{route('courrier.index') }} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                            </div>
                            <!-- /bard body -->
        
                        </div>
                        <!-- /card -->
        
                    </div>
                <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">
        
                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h4 class="text-body text-uppercase mb-2">Dossier disciplinaires ({{App\Courrier::where('categorie','Dossier disciplinaire')->where('nature', 1)->count()}})</h4>
                                <canvas  class="dicipline" width="800" height="450"></canvas>
                                <!--<div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2"> 
                                            {{App\Courrier::where('categorie','Dossier disciplinaire')->where('nature', 1)->count()}}
                                    </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href="{{route('courrier.service_discipline') }} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                            </div>
                            <!-- /bard body -->
        
                        </div>
                        <!-- /card -->
        
                    </div>
                <!-- /grid item -->
    
            </div>  
        <div class="row">
                @foreach(App\Service::where('id_direction', Auth::user()->direction)->get() as $item)
                <!-- Grid Item -->
                @if($item->nom_service == "SCDA")
                  
                <div class="col-xl-3 col-sm-6 col-12">
    
                        <!-- Card -->
                        <div class="dt-card">
        
                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
        
                                <h4 class="text-body text-uppercase mb-2">Courriers  {{$item->nom_service}} ( @php echo App\Courrier::where('service', 7)->count(); @endphp) </h4>
                                <canvas  class="sda-courrier" width="800" height="450"></canvas>
                               <!-- <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">
                                            @php echo App\Courrier::where('service', 7)->count(); @endphp
                                    </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href=" {{route('courrier.service', $item->id) }}"> <i class="icon icon-eye"></i> Détails</a> </div>
                            </div>
                            <!-- /bard body -->
        
                        </div>
                        <!-- /card -->
        
                    </div>
                @else
                <div class="col-xl-3 col-sm-6 col-12">
    
                        <!-- Card -->
                        <div class="dt-card">
        
                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <?php
                                $janvier11=0;$fevrier11=0;$mars11=0;$avril11=0;$mai11=0;$juin11=0;$juillet11=0;$aout11=0;$septembre11=0;$octobre11=0;$novembre11=0;$decembre11=0;
                                        $item1 = $item->id;
                                $tests11 =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                                                EXTRACT( MONTH FROM created_at ) mois,
                                                count(*) total
                                                FROM courrier
                                                WHERE service =  $item1
                                                GROUP BY annee, mois
                                    ");
                                    foreach($tests11 as $test){
                                        
                                        if($test->mois == 1){ $janvier11= (int)$test->total;}if($test->mois == 2){ $fevrier11 = (int)$test->total;}if($test->mois == 3){ $mars11 = (int)$test->total;}
                                        if($test->mois == 4){ $avril11 = (int)$test->total;}if($test->mois == 5){ $mai11 =(int)$test->total;}if($test->mois == 6){ $juin11 = (int)$test->total;}
                                        if($test->mois == 7){ $juillet11 = (int)$test->total;}if($test->mois == 8){ $aout11 = (int)$test->total;}if($test->mois == 9){ $septembre11 = (int)$test->total;}
                                        if($test->mois == 10){ $octobre11 = (int)$test->total;}if($test->mois == 11){ $novembre11 = (int)$test->total;}if($test->mois == 12){ $decembre11 =(int)$test->total;}
                                        
                                    }
                                ?>
                                <h4 class="text-body text-uppercase mb-2">Courriers  {{$item->nom_service}} ({{ App\Courrier::where('service', $item->id)->count() }})</h4>
                                <canvas  class="{{$item->id}}-courrier" width="800" height="450"></canvas>
                                <!--<div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">
                                           {{ App\Courrier::where('service', $item->id)->count() }}
                                    </span>
                                </div>
        
                                <div class="dt-indicator-item__info mb-2" data-fill="2" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>-->
                                <br>
                                <div class="d-flex align-items-baseline">
                                    <a href="{{route('courrier.service', $item->id) }} "> <i class="icon icon-eye"></i> Détails</a>
                                </div>
                            </div>
                            <!-- /bard body -->
        
                        </div>
                        <!-- /card -->
        
                    </div>
                @endif
            @endforeach
                <!-- /grid item -->
    
            </div>  
        @endif
            
        @endif
        
        <!-- /grid -->

        
        <!-- /grid -->

    </div>
    <!-- /site content -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script type="text/javascript">
       // $janvier=0;$fevrier=0;$mars=0;$avril=0;$mai=0;$juin=0;$juillet=0;$aout=0;$septembre=0;$octobre=0;$novembre=0;$decembre=0;
       //les vartiables pour le graphe1
       let janvier = <?=$janvier?>;
        let fevrier = <?=$fevrier?>;
        let mars = <?=$mars?>;
        let avril = <?=$avril?>;
        let mai = <?=$mai?>;
        let juin = <?=$juin?>;
        let juillet = <?=$juillet?>;
        let aout = <?=$aout?>;
        let septembre = <?=$septembre?>;
        let octobre = <?=$octobre?>;
        let novembre = <?=$novembre?>;
        let decembre = <?=$decembre?>;

        //les vartiables pour le graphe2
        let janvier2 = <?=$janvier2?>;
        let fevrier2 = <?=$fevrier2?>;
        let mars2 = <?=$mars2?>;
        let avril2 = <?=$avril2?>;
        let mai2 = <?=$mai2?>;
        let juin2 = <?=$juin2?>;
        let juillet2 = <?=$juillet2?>;
        let aout2 = <?=$aout2?>;
        let septembre2 = <?=$septembre2?>;
        let octobre2 = <?=$octobre2?>;
        let novembre2 = <?=$novembre2?>;
        let decembre2 = <?=$decembre2?>;

        //les vartiables pour le graphe3
       let janvier3 = <?=$janvier3?>;
       let fevrier3 = <?=$fevrier3?>;
       let mars3 = <?=$mars3?>;
       let avril3 = <?=$avril3?>;
       let mai3 = <?=$mai3?>;
       let juin3 = <?=$juin3?>;
       let juillet3 = <?=$juillet3?>;
       let aout3 = <?=$aout3?>;
       let septembre3 = <?=$septembre3?>;
       let octobre3 = <?=$octobre3?>;
       let novembre3 = <?=$novembre3?>;
       let decembre3 = <?=$decembre3?>;

       //les vartiables pour le graphe4
       let janvier4 = <?=$janvier4?>;
        let fevrier4 = <?=$fevrier4?>;
        let mars4 = <?=$mars4?>;
        let avril4 = <?=$avril4?>;
        let mai4 = <?=$mai4?>;
        let juin4 = <?=$juin4?>;
        let juillet4 = <?=$juillet4?>;
        let aout4 = <?=$aout4?>;
        let septembre4 = <?=$septembre4?>;
        let octobre4 = <?=$octobre4?>;
        let novembre4 = <?=$novembre4?>;
        let decembre4 = <?=$decembre4?>;

        //les vartiables pour le graphe1
       let janvier5 = <?=$janvier5?>;
       let fevrier5 = <?=$fevrier5?>;
       let mars5 = <?=$mars5?>;
       let avril5 = <?=$avril5?>;
       let mai5 = <?=$mai5?>;
       let juin5 = <?=$juin5?>;
       let juillet5 = <?=$juillet5?>;
       let aout5 = <?=$aout5?>;
       let septembre5 = <?=$septembre5?>;
       let octobre5 = <?=$octobre5?>;
       let novembre5 = <?=$novembre5?>;
       let decembre5 = <?=$decembre5?>;

       //les vartiables pour le graphe1
       let janvier6 = <?=$janvier6?>;
        let fevrier6 = <?=$fevrier6?>;
        let mars6 = <?=$mars6?>;
        let avril6 = <?=$avril6?>;
        let mai6 = <?=$mai6?>;
        let juin6 = <?=$juin6?>;
        let juillet6 = <?=$juillet6?>;
        let aout6 = <?=$aout6?>;
        let septembre6 = <?=$septembre6?>;
        let octobre6 = <?=$octobre6?>;
        let novembre6 = <?=$novembre6?>;
        let decembre6 = <?=$decembre6?>;

        //les vartiables pour le graphe7
       let janvier7 = <?=$janvier7?>;
       let fevrier7 = <?=$fevrier7?>;
       let mars7 = <?=$mars7?>;
       let avril7 = <?=$avril7?>;
       let mai7 = <?=$mai7?>;
       let juin7 = <?=$juin7?>;
       let juillet7 = <?=$juillet7?>;
       let aout7 = <?=$aout7?>;
       let septembre7 = <?=$septembre7?>;
       let octobre7 = <?=$octobre7?>;
       let novembre7 = <?=$novembre7?>;
       let decembre7 = <?=$decembre7?>;

       //les vartiables pour le graphe8
       let janvier8 = <?=$janvier8?>;
        let fevrier8 = <?=$fevrier8?>;
        let mars8 = <?=$mars8?>;
        let avril8 = <?=$avril?>;
        let mai8 = <?=$mai8?>;
        let juin8 = <?=$juin8?>;
        let juillet8 = <?=$juillet8?>;
        let aout8 = <?=$aout8?>;
        let septembre8 = <?=$septembre8?>;
        let octobre8 = <?=$octobre8?>;
        let novembre8 = <?=$novembre8?>;
        let decembre8 = <?=$decembre8?>;

        //les vartiables pour le graphe1
       let janvier9 = <?=$janvier9?>;
       let fevrier9 = <?=$fevrier9?>;
       let mars9 = <?=$mars9?>;
       let avril9 = <?=$avril9?>;
       let mai9 = <?=$mai9?>;
       let juin9 = <?=$juin9?>;
       let juillet9 = <?=$juillet9?>;
       let aout9 = <?=$aout9?>;
       let septembre9 = <?=$septembre9?>;
       let octobre9 = <?=$octobre9?>;
       let novembre9 = <?=$novembre9?>;
       let decembre9 = <?=$decembre9?>;

       //les vartiables pour le graphe1
       let janvier10 = <?=$janvier10?>;
        let fevrier10 = <?=$fevrier10?>;
        let mars10 = <?=$mars10?>;
        let avril10 = <?=$avril10?>;
        let mai10 = <?=$mai10?>;
        let juin10 = <?=$juin10?>;
        let juillet10 = <?=$juillet10?>;
        let aout10 = <?=$aout10?>;
        let septembre10 = <?=$septembre10?>;
        let octobre10 = <?=$octobre10?>;
        let novembre10 = <?=$novembre10?>;
        let decembre10 = <?=$decembre10?>;

        let janvier11 = <?=$janvier11?>;
        let fevrier11 = <?=$fevrier11?>;
        let mars11 = <?=$mars11?>;
        let avril11 = <?=$avril11?>;
        let mai11 = <?=$mai11?>;
        let juin11 = <?=$juin11?>;
        let juillet11 = <?=$juillet11?>;
        let aout11 = <?=$aout11?>;
        let septembre11 = <?=$septembre11?>;
        let octobre11 = <?=$octobre11?>;
        let novembre11 = <?=$novembre11?>;
        let decembre11 = <?=$decembre11?>;

        //les vartiables pour le graphe1
       let janvier12 = <?=$janvier12?>;
       let fevrier12 = <?=$fevrier12?>;
       let mars12 = <?=$mars12?>;
       let avril12 = <?=$avril12?>;
       let mai12 = <?=$mai12?>;
       let juin12 = <?=$juin12?>;
       let juillet12 = <?=$juillet12?>;
       let aout12 = <?=$aout12?>;
       let septembre12 = <?=$septembre12?>;
       let octobre12 = <?=$octobre12?>;
       let novembre12 = <?=$novembre12?>;
       let decembre12 = <?=$decembre12?>;
        //console.log(janvier)
        new Chart(document.getElementsByClassName("sup-courrier-chart"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers supprimés",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier2,fevrier2,mars2,avril2,mai2,juin2,juillet2,aout2,septembre2,octobre2,novembre2,decembre2]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });
        new Chart(document.getElementsByClassName("courrier-chart"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });
        new Chart(document.getElementsByClassName("conf-courrier-chart"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier3,fevrier3,mars3,avril3,mai3,juin3,juillet3,aout3,septembre3,octobre3,novembre3,decembre3]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("int-courrier-chart"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier4,fevrier4,mars4,avril4,mai4,juin4,juillet4,aout4,septembre4,octobre4,novembre4,decembre4]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("conf-correspondance"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers confidentiels",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier5,fevrier5,mars5,avril5,mai5,juin5,juillet5,aout5,septembre5,octobre5,novembre5,decembre5]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("audience"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier6,fevrier6,mars6,avril6,mai6,juin6,juillet6,aout6,septembre6,octobre6,novembre6,decembre6]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("res-courier"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier7,fevrier7,mars7,avril7,mai7,juin7,juillet7,aout7,septembre7,octobre7,novembre7,decembre7]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("users-con"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Historique des connections",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier8,fevrier8,mars8,avril8,mai8,juin8,juillet8,aout8,septembre8,octobre8,novembre8,decembre8]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("dicipline"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "dicipline",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier9,fevrier9,mars9,avril9,mai9,juin9,juillet9,aout9,septembre9,octobre9,novembre9,decembre9]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        new Chart(document.getElementsByClassName("sda-courrier"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Courriers",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier10,fevrier10,mars10,avril10,mai10,juin10,juillet10,aout10,septembre10,octobre10,novembre10,decembre10]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });

        for(let i=0; i<= 1500; i++){
            new Chart(document.getElementsByClassName(i+"-courrier"), {
                type: 'bar',
                data: {
                  labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
                  datasets: [
                    {
                      label: "Courriers",
                      backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                      data: [janvier11,fevrier11,mars11,avril11,mai11,juin11,juillet11,aout11,septembre11,octobre11,novembre11,decembre11]
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  title: {
                    display: true,
                    text: 'Annee 2020'
                  }
                }
            });
        }

        new Chart(document.getElementsByClassName("connect"), {
            type: 'bar',
            data: {
              labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
              datasets: [
                {
                  label: "Historique de connections",
                  backgroundColor: ["#253279", "#2b9131","#877e28","#bc3838","#42c2c6","#b83ac1","#cec460","#180c2b","#1a5720","#523618","##c18adc","#734dc9"],
                  data: [janvier12,fevrier12,mars12,avril12,mai12,juin12,juillet12,aout12,septembre12,octobre12,novembre12,decembre12]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Annee 2020'
              }
            }
        });
        
    </script>
   


  @stop

  @section('script')
  <script type ="text/javascript">
    setTimeout(function() {
        location.reload();
    },55000); 
    /* function loadlink(){
        $('.dt-header__toolbar').load('/home');
        console.log('Ok');
    }
    loadlink();
    setInterval(function() {
        loadlink();
    }, 10000); */
    </script>

  @endsection