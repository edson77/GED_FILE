<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Mpdf\Mpdf;
use App\Audience;
use App\Courrier;
use App\Direction;
use Carbon\Carbon;
use App\Instruction;
use App\CourrierDeleted;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function detailsCourrier($id)
    {
        $courrier = Courrier::find($id);
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression du détail du courrier '.$courrier->code;
        $log->auteur = Auth::user()->id;
        $log->save();

        ob_start();
        echo view('dashboard.courriers.print', compact('courrier'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function courriersPublics()
    {
        $courriers = Courrier::where('nature', 0)->orderBy('created_at', 'asc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");
        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers publics';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.publics.print', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function publicsDeleted()
    {
        $courriers = Courrier::where('nature', 0)->where('deleted', 1)->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers publics supprimés';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.publics.print_deleted', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function courriersInternes()
    {
        $courriers = Courrier::where('nature', 1)->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers internes';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.internes.print', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function internesDeleted()
    {
        $courriers = Courrier::where('nature', 1)->where('deleted', 1)->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers internes supprimés';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.internes.print_deleted', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function courriersRecus()
    {
        if (Auth::user()->direction != null) {
            $courriers = Courrier::where('direction', Auth::user()->direction)->orderBy('created_at', 'asc')->get();
        } elseif (Auth::user()->service != null) {
            $courriers = Courrier::where('service', Auth::user()->service)->orderBy('created_at', 'asc')->get();
        }
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers reçus';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.direction.print', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function courriersDirectionSupprimes()
    {
        if (Auth::user()->direction != null) {
            $courriers = Courrier::where('direction', Auth::user()->direction)->where('deleted', 1)->orderBy('created_at', 'desc')->get();
            foreach ($courriers as $item) {
                $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'desc')->first();
                $item->by = $by->id_suppresseur;
            }
        } elseif (Auth::user()->service != null) {
            $courriers = Courrier::where('service', Auth::user()->service)->where('deleted', 1)->orderBy('created_at', 'desc')->get();
            foreach ($courriers as $item) {
                $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'desc')->first();
                $item->by = $by->id_suppresseur;
            }
        }
        $c = $courriers->count();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers reçus qui ont été supprimé';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.direction.print_deleted', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function courriersConfidentiels()
    {
        $courriers = Courrier::where('categorie', 'Courrier confidentiel')->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        ob_start();
        echo view('dashboard.courriers.confidentiels.print', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers confidentiels';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function confidentielsDeleted()
    {
        $courriers = Courrier::where('categorie', 'Courrier confidentiel')->where('deleted', 1)->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des courriers confidentiels supprimés';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.confidentiels.print_deleted', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function correspondance()
    {
        $courriers = Courrier::where('categorie', 'Correspondance confidentielle')->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des correspondances confidentielles';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.correspondances.print', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function correspondancesDeleted()
    {
        $courriers = Courrier::where('categorie', 'Correspondance confidentielle')->where('deleted', 1)->orderBy('created_at', 'desc')->get();
        $c = $courriers->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des correspondances confidentielles supprimées';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.correspondances.print_deleted', compact('courriers', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printAudiences()
    {
        $audiences = Audience::orderBy('created_at', 'desc')->get();
        $c = $audiences->count();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des audiences';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.audiences.print', compact('audiences', 'c'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printInstructionsRecus()
    {
        //$courrier = Courrier::find($id);
        if (Direction::find(Auth::user()->direction)->nom_direction == 'DAG') {
            $instructions = Instruction::where('service', 7)->get();
        } else {
            if (Auth::user()->direction != null) {
                $instructions = Instruction::where('direction', Auth::user()->direction)->get();
            } elseif (Auth::user()->service != null) {
                $instructions = Instruction::where('service', Auth::user()->service)->get();
            }
        }
        $instructions = Instruction::orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des instructions';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.instructions.print_recu', compact('instructions'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printInstructions()
    {
        $instructions = Instruction::orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des instructions';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.instructions.print', compact('instructions'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function fichier()
    {
        $logs = Log::orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression du fichier journal';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.logs.print', compact('logs'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printServiceDiscipline()
    {
        if (Auth::user()->role = 'Chef service-courrier') {
            $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->orderBy('created_at', 'desc')->get();
        } else {
            $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->orderBy('created_at', 'desc')->get();
        }
        $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des dossiers disciplinaires';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.services_disciplines.print', compact('courriers'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printServiceDisciplineDelete()
    {
        $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->where('deleted', 1)->orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des dossiers disciplinaires supprimés';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.courriers.services_disciplines.print_deleted', compact('courriers'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la liste des utilisateurs du système';
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.users.print', compact('users'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printUser($id)
    {
        $user = User::find($id);
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'landscape']);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->setHTMLFooter("<div align='center' style='font-size: 11px'><b>Copyright GED SED</b> Plateforme de Gestion des courriers.<br>-- ");

        $log = new Log();
        $log->libelle = 'Impression de la fiche de l\'utilisateur: '.$user->name;
        $log->auteur = Auth::user()->id;
        $log->created_at =Carbon::now();
        $log->updated_at =Carbon::now();
        $log->save();

        ob_start();
        echo view('dashboard.users.print_user', compact('user'));
        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
