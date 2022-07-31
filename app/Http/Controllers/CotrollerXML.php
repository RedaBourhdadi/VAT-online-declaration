<?php

namespace App\Http\Controllers;
use App\Models\Archivages;
// pmport DOMDocument
use DOMDocument;
// pmport Response
use Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ExcelTva;
use App\Models\Societe;
use Illuminate\Support\Facades\Auth;



class CotrollerXML extends Controller
{
    public function afficherXML()
    {$seconds = 1;


        // echo date("Y-m-d H:i:s", (strtotime(date($firstRow->created_at)) - $seconds));

        // $firstRow = ExcelTva::all()->first();
        $firstRow = DB::table('excel_tvas')->latest('created_at')->first();
        // $firstRow = ExcelTva::whereEmail($email)->first();
        $Tvatable = ExcelTva::where('created_at','>=', date("Y-m-d H:i:s", (strtotime(date($firstRow->created_at)) - $seconds)))->get();
        // $Tvatable = ExcelTva::all();
        $societes = Societe::where('user_id', Auth::user()->id)->get()->first();
        if ($societes != null) {
            return view('exportXml',compact('Tvatable', 'societes'));
        } else {
            return view('societe.create');
        }
    }

    public function exportXml(Request $request)
    {  $data = $request->all();
        $data = json_decode($data['data'], true);
        $data = array_filter($data);
        $data = array_values($data);

        // $xmlDoc = new DOMDocument();
        $xmlDoc = new DOMDocument();
        $xmlDoc->formatOutput = true;
        // $root = $xmlDoc->createElement("TVA");
        // $xmlDoc->appendChild($root);


        $root = $xmlDoc->appendChild($xmlDoc->createElement("DeclarationReleveDeduction"));
        // $root->appendChild($xmlDoc->createElement("Version", "1.0", "yes"));
        $con=0;
        $identifiantFiscal =1;
        foreach ($data as $key => $value) {




            $con++;
            if ($con==1){
                $identifiantFiscal=$value[1];
            $root->appendChild($xmlDoc->createElement("identifiantFiscal",$value[0]));
            $root->appendChild($xmlDoc->createElement("annee",$value[2]));
            $root->appendChild($xmlDoc->createElement("periode",$value[3]));
            $root->appendChild($xmlDoc->createElement("regime",$value[4]));
            $releveDeductions = $root->appendChild($xmlDoc->createElement("releveDeductions"));

            }
            if ($con>3){

              $rd=$releveDeductions->appendChild($xmlDoc->createElement("rd"));
              $rd->appendChild($xmlDoc->createElement("ord",$value[0]));
              $rd->appendChild($xmlDoc->createElement("num",$value[1]));
              $rd->appendChild($xmlDoc->createElement("des",$value[2]));
              $rd->appendChild($xmlDoc->createElement("mht",$value[3]));
              $rd->appendChild($xmlDoc->createElement("tva",$value[4]));
              $rd->appendChild($xmlDoc->createElement("ttc",$value[5]));
              $refF=$rd->appendChild($xmlDoc->createElement("refF"));
              $refF->appendChild($xmlDoc->createElement("if",$value[6]));
              $refF->appendChild($xmlDoc->createElement("nom",$value[7]));
              $refF->appendChild($xmlDoc->createElement("ice",$value[8]));
              $rd->appendChild($xmlDoc->createElement("tx",$value[9]));
              $mp=$rd->appendChild($xmlDoc->createElement("mp"));
              $mp->appendChild($xmlDoc->createElement("id",$value[10]));
              $rd->appendChild($xmlDoc->createElement("dpai",$value[11]));
              $rd->appendChild($xmlDoc->createElement("dfac",$value[12]));
              Archivages::insert(['user_id' => Auth::id(),'identifiantFiscale'=>$identifiantFiscal ,'OR' => $value[0],'FACT_NUM' => $value[1],'DESIGNATION' => $value[2],'M_HT' => $value[3],'TVA' => $value[4],'M_TTC' => $value[5],'IF' => $value[6],'LIB_FRSS' => $value[7],'ICE_FRS' => $value[8],'TAUX' => $value[9],'ID_PAIE' => $value[10],'DATE_PAIE' => $value[11]." 00:00:00",'DATE_FAC' => $value[12]." 00:00:00", 'created_at' => now(), 'updated_at' => now()]);
              
            }

            // echo "<script>     console.log(" . . ");</script>";
            // $root->appendChild($xmlDoc->createElement("identifiantFiscal",$value[0]));


            // $root->appendChild($xmlDoc->createElement("SL",$value[0]));
            // $root->appendChild($xmlDoc->createElement("col1",$value[1]));
            // $root->appendChild($xmlDoc->createElement("col2",$value[2]));
            // $root->appendChild($xmlDoc->createElement("col3",$value[3]));

        }

        return  $xmlDoc->saveXML();
        // $xmlDoc->save("TVA.xml");
        // $xmlDoc->saveXML();
        // return Response::download('TVA.xml');
        // return response()->download('TVA.xml');





        // $xmlDoc->saveXML();
        // $xmlDoc->saveHTML($root);
        // $xml = $xmlDoc->saveXML($xmlDoc->documentElement);
        /*  $xml = str_replace('<?xml version="1.0"?>', '', $xml); */

// return Response::download($xmlDoc -> saveXML(), 'TVA.xml');

// return Response::download($xmlDoc -> saveXML(), 'output.XML', ['Content-Type: application/xml']);




// return "$xmlDoc"
// $xmlDoc->save("TVA.xml");
// $xmlDoc->saveXML();
// return "$xmlDoc" ;
// return Response::download($xmlDoc, 'TVA.xml');
// return response()->$xmlDoc;

// return $xmlDoc->save("TVA.xml"); //in public folder
// $contents = (string) $xmlDoc;
// return response()-> $xmlDoc;



// $contents = 'Get the contents from somewhere';
// $filename = 'test.txt';
// return response()->streamDownload(function () use ($contents) {
// echo $contents;
// }, $filename);



}

}
// for ($i = 0; $i < count($data); $i++) { // $root->appendChild($xmlDoc->createElement($data[$i]));
    // }
    // return count($days=>$value);
    // return count($data);
    // $xmlDoc->save("TVA.xml");
    // return response()->download('TVA.xml');
    // save xml file in computer path of your choice
    // return $xmlDoc->save("C:/Users/redar/Desktop/TVA.xml");