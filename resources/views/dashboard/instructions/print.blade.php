<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instructions</title>
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
            <th width="48%" scope="col"><div align="center">Républic du Cameroun</div></th>
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
    <br>
    <div>
        <p align="center" class="Style4"><span class="Style8">Liste des instructions </span></p>
       
            <table width="100%" border="1"  cellspacing="0">
               <tr >
                    <th>N°</th>
                    <th>Courrier</th>
                    <th>Coté à</th>
                    <th>Instruction</th>
                    <th>Date</th>
               </tr>
               @php $i = 1; @endphp
               @foreach($instructions as $item)
                <tr >
                        <td> @php echo $i++; @endphp </td>
                        <td > <a href=" {{route('courrier.show', $item->courrier)}} ">{{App\Courrier::find($item->courrier)->code}}</a>  </td>
                        <td >  @if($item->direction != '0') {{App\Direction::find($item->direction)->nom_direction }} @else {{App\Service::find($item->service)->nom_service }} @endif  </td>
                        <td > {{$item->instruction}} </td>
                         <td > {{$item->created_at->format('d/m/Y')}} </td>
                </tr>
            @endforeach
            </table>
        </div>
     <table width="40%" border="0" align="right">
            <tr align="left">
                <th  scope="col"><div align="left"><span class="Style1">Fait par: {{Auth::user()->name}}  le:  {{NOW()->format('d/m/Y')}} </span></div></th>
            </tr>
        </table>
</body>
</html>
