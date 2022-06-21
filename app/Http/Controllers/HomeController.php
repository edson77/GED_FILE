<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function back()
    {
        return back();
    }

    public function login1()
    {
        
        //dd($date);
        return view('dashboard.login');
    }

    public function home()
    {
        $au=Auth::user()->direction;
       // dd( $au);
        return view('dashboard.index',compact('au'));
    }
    public function test(){

        /*$test =  DB::select("SELECT 
                        count(*) total
                        FROM courrier
                        WHERE nature = 0
                        GROUP BY EXTRACT( YEAR FROM created_at ),
                        EXTRACT( MONTH FROM created_at ) 
            ");*/
            $tab1 = 0;$tab2= 0;$tab3= 0;$tab4= 0;$tab5= 0;$tab6= 0;$tab7= 0;$tab8= 0;$tab9= 0;$tab10= 0;$tab11= 0;$tab12= 0;
      $tests =  DB::select("SELECT EXTRACT( YEAR FROM created_at ) annee,
                        EXTRACT( MONTH FROM created_at ) mois,
                        count(*) total
                        FROM courrier
                        WHERE nature = 0
                        GROUP BY annee, mois
            ");
            foreach($tests as $test){
                
                if($test->mois == 1){ $tab1= (int)$test->total;}if($test->mois == 2){ $tab2 = (int)$test->total;}if($test->mois == 3){ $tab3 = (int)$test->total;}
                if($test->mois == 4){ $tab4 = (int)$test->total;}if($test->mois == 5){ $tab5 =(int)$test->total;}if($test->mois == 6){ $tab6 = (int)$test->total;}
                if($test->mois == 7){ $tab7 = (int)$test->total;}if($test->mois == 8){ $tab8 = (int)$test->total;}if($test->mois == 9){ $tab9 = (int)$test->total;}
                if($test->mois == 10){ $tab10 = (int)$test->total;}if($test->mois == 11){ $tab11 = (int)$test->total;}if($test->mois == 12){ $tab12 =(int)$test->total;}
                
            }
            
                dump('janvier : '.$tab1);
                dump($tab3);
                dump($tab9);
                dump($tab11);
               
           
        
    }
}
