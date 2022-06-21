<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Courrier {{$courrier->code}}</title>
    <style type="text/css">
        <!--
        .Style1 {font-family: Georgia, "Times New Roman", Times, serif;
           color: white;
           padding-top: 5px;
           padding-bottom: 5px;
        }
        .Style4 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; font-size: 16px; }
        .Style8 {
            font-size: 24px;
            font-weight: bold;
        }
        .Style9 {font-size: 12px; font-weight: normal}
        .Style10 {
            font-size: 14px;
            font-weight: bold;
        }
        .Style11 {
            font-size: 14px;
            font-family: Georgia, "Times New Roman", Times, serif;
        }
        .Style13 {font-size: 16px}
        -->
    </style>
</head>

<body>
<div>
    <table width="100%" border="0">
    <tr>
            <th width="48%" scope="col"><div align="center">République du Cameroun</div></th>
            <th width="13%" rowspan="8" scope="col">
                <img src="assets/images/nation.png" width="100" height="100" />
            </th>
            </th>
            <th width="48%" scope="col"><div align="center">Republic of Cameroon</div></th>
        </tr>
        <tr>
            <th scope="row" class="Style9"><div align="center">Paix-Travail-Patrie</div></th>
            <th scope="row" class="Style9"><div align="center">Peace-Work-Fatherland</div></th>
        </tr>
        <tr>
            <th scope="row" class="Style9"><div align="center">Ministère de la Défense</div></th>
            <th scope="row" class="Style9"><div align="center">Ministry of Defense</div></th>
        </tr>
        <tr>
            <th scope="row" class="Style9"><div align="center">Gendarmerie Nationale</div></th>
            <th scope="row" class="Style9"><div align="center">National Gendarmerie</div></th>
        </tr>
    </table>
    <div>
        <p align="center" class="Style4"><span class="Style8">Détails du courrier (Code : {{$courrier->code}} )  </span></p>
       
            <table width="100%" border="1"  cellspacing="0">
               <tr >
                  <th bgcolor="grey"  class="Style1" colspan="2" > Courrier {{$courrier->code}}, reçu par M/Mme {{App\User::find($courrier->recepteur)->name}} le {{$courrier->created_at->format('d/m/Y')}}   </th>
               </tr>
                <tr>
                        <td  width="50%" align="justify">
                                <br>
                                <p > Code courrier :  <strong>{{$courrier->code}}</strong></p><br>
                                <p > Numéro courrier :  <strong>{{$courrier->numero}}</strong></p><br>
                                <p > Numéro d'ordre :  <strong>{{$courrier->ordre}}</strong></p>
                                <br>
                                <p > Objet :  <strong>{{$courrier->objet}}</strong></p><br>
                                <p > Date Traitement :  <strong>{{$courrier->created_at->format('d/m/Y')}}</strong></p><br>
                                <p > Nature :  <strong>{{$courrier->naturecourrier}}</strong></p><br>
                                <p > Type :  <strong>{{$courrier->type}}</strong></p>
                         </td>
                         <td  width="50%" align="justify">
                                @if($courrier->nature == 0) <p> Institution:<strong> {{$courrier->entreprise}} </strong></p> @else <p> Provenance courrier:<strong> Interne</strong></p> @endif <br>
                                <p > Signataire :  <strong>{{$courrier->signataire}}</strong></p><br>
                                <p > Coursier :  <strong>{{$courrier->coursier}}</strong></p><br>
                                <p > Reçu par :  <strong>{{App\User::find($courrier->recepteur)->name}}</strong></p><br> 
                                 @if($courrier->nature == 1)
                                   <p>  @if($courrier->direction != NULL) Initiateur Interne (Direction): <strong>{{App\Direction::find($courrier->direction)->nom_direction}}</strong> @elseif($courrier->service != NULL) Initiateur Interne (Service) : <strong> {{App\Service::find($courrier->service)->nom_service}}  </strong> @endif </p>
                                 @else
                                    <p>  @if($courrier->direction != NULL) Destinataire (Direction): <strong>{{App\Direction::find($courrier->direction)->nom_direction}}</strong> @elseif($courrier->service != NULL) Destinataire (Service) : <strong> {{App\Service::find($courrier->service)->nom_service}}  </strong> @endif </p>
                                 @endif
                                <br>
                                <p > Mention :  <strong>{{$courrier->mention}}</strong></p><br>
                                <p > Pièce jointe :  <strong>{{$courrier->fichier != null ? "Oui" : "Non"}}</strong></p>
                         </td>
                </tr>
            </table>
        <table width="40%" border="0" align="right">
            <tr align="left">
                <th  scope="col"><div align="left"><span class="Style1">Fait par: {{Auth::user()->name}}  le:  {{NOW()->format('d/m/Y')}} </span></div></th>
            </tr>
        </table>
</body>
</html>
