<?php

use App\Code;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
       // DB::insert("INSERT INTO secret (code) VALUES (:code)", [code => bcrypt('Arianelove103041992')]);
       for ($i=2600; $i<=3500 ; $i++) { 

       		DB::table('courrier')->insert([
       		"created_at" => "2020-09-08 15:34:30",
	        "updated_at" => "2020-09-08 15:34:30",
	        "entreprise" => "destabilisation",
	        "emetteur" => null,
	        "coursier" => "elmar2132",
	        "recepteur" => "95",
	        "type" => "Message",
	        "numero" => "123123",
	        "ordre" => $i,
	        "reception" => "2020-09-08",
	        "sortie" => "2020-09-08",
	        "direction" => "1",
	        "service" => null,
	        "objet" => "le teste est tres btettet",
	        "contenu" => "le rtejdsgjdhklds rtejdsgjdhklds rtejdsgjdhklds",
	        "fichier" => null,
	        "deleted" => 0,
	        "mention" => "Urgent",
	        "categorie" => null,
	        "naturecourrier" => "DCC",
	        "code" => "JNAL$i",
	        "signataire" => "edslsp",
	        "destinataire" => "RAS",
	        "nature" => 0,
	        "relance" => "2020-09-01 05:30",

	       ]);

       }
       
        
       
    }
}
