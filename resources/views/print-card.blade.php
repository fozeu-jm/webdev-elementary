<?php
ob_start();
?>
<style type="text/css">
    table {
        width:100%;
        font-family: times;
        border-collapse: collapse;
    }
    .bord {
        border: 0.6px solid black;

    }
    .text-center{
        text-align: center;
    }
    inline-block{
        display: inline;
    }
    .value{
        color: #4982c9;
        font-weight: bold;
    }
    .v-align{
        vertical-align: middle;
    }
    td.subject{
        text-align: left!important;
    }
    table.note-table td{
        border: 0.6px solid black;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }
    .red{
        color: red;
    }
    table.report-table td{
        padding-top: 3px;
        padding-bottom: 3px;
    }
    table.final-table td{
        width: 95%;
        text-align: right;
    }
</style>
<page style="border: 2px black solid;" backtop="0mm" backleft="2mm" backright="2mm" backbottom="2mm">
    <div style="border: 2px black solid; padding-bottom: 30px;">
        <table style="margin-left: 15px; margin-top: 25px; font-weight: bold; font-size: 12px;">
            <tr>
                <td style="padding-right: 20px; text-transform: uppercase; width: 270px;" class="text-center">{{ $student->college->name }}</td>

                <td style="width:80px;" rowspan="2" class="text-center" >
                    <img style="width:100%;" src="uploads/{{$setting->logo}}" alt="">
                </td>

                <td style="text-transform: uppercase; width: 270px;" class="text-center">{{$setting->name_en}}</td>
            </tr>
            <tr class="text-center">
                <td style="padding-right: 20px; width: 270px; text-transform: capitalize;" class="text-center">{{$setting->motto}}</td>
                <td style="padding-left: 20px; width: 270px; text-transform: capitalize;" class="text-center">{{$setting->motto_en }}</td>
            </tr>
        </table>

        <table style="margin-bottom: 40px;padding: 10px 0 10px 0; margin-top:5px;font-size: 10.4px; margin-left: 15px; border-collapse: unset;border-top: 1px black solid; border-bottom: 1px black solid;">
            <tr>
                <td>
                    <b>BP / P.O. Box</b> : {{$student->college->po_box}} &nbsp;
                </td>
                <td>
                    <b>Contact</b> : (237) {{$student->college->phoneno}} &nbsp; &nbsp;
                </td>
                <td>
                    <b>Site web / Web site </b> : {{$student->college->website}} &nbsp;
                </td>
                <td>
                    <b>Email </b> : {{$student->college->email}} &nbsp;
                </td>
            </tr>
        </table>

        <table style="margin-top: 10px;">
            <tr>
                <td style="font-style: italic;font-size: 36px;text-transform: capitalize;width: 100%; text-align: center;font-weight: bold;">
                    {{$inputs['the_title']}}
                </td>
            </tr>
        </table>

        <table style="width: 100%; font-size: 20px; margin-left: 8px; font-style: italic; margin-top: 2px;">
            <?php $result = breaker($student->level->name); ?>
            <tr>
                <td><b>Cycle:</b> &nbsp; <span class="value">{{ $result['filiere'] }}</span>  </td>
                <td rowspan="4" style="width: 150px; padding-left: 15px;"><b>Niveau:</b> &nbsp; <span class="value">{{ $student->levels}}</span></td>
                <td><b>Année Académique:</b> &nbsp; <span class="value">{{$student->AcademicYear->begin}} / {{$student->AcademicYear->end}}</span></td>
            </tr>
            <tr>
                <td><b>Noms:</b> &nbsp; <span class="value">{{$student->firstname}}</span></td>
                <td><b>Prenoms:</b> &nbsp; <span class="value">{{$student->lastname}}</span> </td>
            </tr>
            <tr>
                <td> <b>Née le:</b> &nbsp; <span class="value">{{ date('d F Y', strtotime($student->datebirth))}}</span> </td>
                <td> <b>À :</b> &nbsp; <span class="value">{{$student->birthplace}}</span> </td>
            </tr>
            <tr>
                <td> <b>Nationalité:</b> &nbsp; <span class="value">{{$student->nationality}}</span></td>
                <td><b>Adresse:</b>  &nbsp; <span class="value">{{$student->adress}}</span></td>
            </tr>
        </table>
        <table class="note-table" style="margin-left: 8px; margin-top: 8px;">
            <tr class="bord text-center v-align" style="font-size: 14px; background: lightgreen; ">
                <th class="bord" style="width: 330px;">Matières</th>
                <th class="bord" style="width: 80px;">Note(/20)</th>
                <th class="bord" style="width: 50px;">Coef.</th>
                <th class="bord" style="width: 80px;">Total</th>
                <th class="bord" style="padding-left: 5px;padding-right: 5px;width: 80px; word-break: break-all;">Moyenne de la classe</th>
                <th class="bord" style="width: 70px; ">Rang</th>
            </tr>
            <?php
            $coef = 0;
            $total = 0;
            ?>
            @foreach($subjects as $subject)
            <?php
            $coef += $subject['subject']->coefficient;
            $total += $subject['subject']->pivot->mark * $subject['subject']->coefficient;
            ?>
            <tr>
                <td style="text-align: left;" class="subject">{{$subject['subject']->name}}</td>
                <td class="<?php echo $subject['subject']->pivot->mark < 10 ? 'red' : ''; ?>">{{$subject['subject']->pivot->mark}}</td>
                <td>{{$subject['subject']->coefficient}}</td>
                <td>{{ $subject['subject']->pivot->mark * $subject['subject']->coefficient  }}</td>
                <td>{{ $subject['subAvg'] }}</td>
                <td>{{ $subject['subRank'] }}</td>
            </tr>
            @endforeach
            <tr class="bord text-center v-align" style="background: lightgreen; ">
                <td style="text-align: center;" class="subject">Total</td>
                <td></td>
                <td>{{$coef }}</td>
                <td>{{ $total  }}</td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <table  style="margin-left: 8px; background:lightgreen; margin-top: 8px; border-collapse: unset;" class="bord report-table">
            <tr>
                <td style="width: 386px;">
                    <b>
                        Moyenne de l'étudiant (/20) : &nbsp;&nbsp;&nbsp; 
                        <span class="<?php echo $nointern < 10 ? 'red' : ''; ?>">{{ round($nointern,3)  }}</span>
                    </b>
                </td>
                <td style="width: 320px;"><b>Heures d'abscences: &nbsp;&nbsp;&nbsp; 
                        {{ isset($abscences) ? $abscences : '-'  }}</b></td>
            </tr>
            <tr>
                <td><b>Moyenne de la classe (/20) : &nbsp;&nbsp;&nbsp; {{ $classAverage }}</b></td>
                <td><b>Nombre de retard : - </b></td>
            </tr>
            <tr>
                <td> <b>Moyenne maximale obtenu dans la classe (/20) : &nbsp;&nbsp;&nbsp; {{ $max }}</b>  </td>
                <td><b>Moyenne minimale (/20) : &nbsp;&nbsp;&nbsp; {{ $min }}</b></td>
            </tr>
            <tr>
                <td><b>Note du stage (/20) : 
                        <span class="<?php echo $internmark < 10 && isset($internmark) ? 'red' : ''; ?>">{{ isset($internmark) ? $internmark : '-' }}</span>
                    </b></td>
                <td><b>Moyenne définitif (/20) : &nbsp;&nbsp;&nbsp; 
                        <span class="<?php echo $average < 10 ? 'red' : ''; ?>">{{ $average }}</span>
                    </b></td>
            </tr>
            <tr>
                <td><b>Rang de l'étudiant : &nbsp;&nbsp;&nbsp; {{ $studentRank }} / {{$stdcount}} </b></td>
                <td>
                    <b>Discipline :
                        <span>{{ $inputs['the_discipline']}}</span>
                    </b> </td>
            </tr>
        </table>
        
        <table style="margin-left: 40px; font-style:16px;margin-top: 2px; border-collapse: unset;">
            <tr>
                <td ><b>Decision du Conseil Des Enseignants : 
                        <span style="display: table-cell;border-bottom: dotted black 2px;"> &nbsp;&nbsp;&nbsp;{{ $inputs['the_comment'] }}</span>
                    </b></td>
            </tr>
        </table>
        
        <table style=" font-weight: bold; text-align: right; width: 100%; " class="final-table">
            <tr>
                <td>{{ $setting->sign_title}}</td>
            </tr>
            <tr style="margin: 25px 0 25px 0;">
                <td>
                    <br>
                    <br>
                    
                </td>
            </tr>
            <tr>
                 <td>{{ $setting->sign_name}}</td>
            </tr>
        </table>

    </div>
</page>



<?php

function breaker($text) {
    $pieces = explode('-', $text);
    $n = count($pieces);
    $first = array();
    $last = '';

    for ($i = 0; $i < $n; $i++) {
        if ($i == $n - 1) {
            $last = $pieces[$i];
        } else {
            array_push($first, $pieces[$i]);
        }
    }

    $result = array(
        'filiere' => implode('', $first),
        'niveau' => $last
    );

    return $result;
}
?>



<?php
$content = ob_get_clean();
$name = $inputs['the_title']. ' - '.$student->firstname.' '.$student->lastname;
require('html2pdf/html2pdf.class.php');
try {
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    $pdf->pdf->setDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->output($name.'.pdf', 'D');
} catch (HTML2PDF_exception $e) {
    die($e);
}
?>
