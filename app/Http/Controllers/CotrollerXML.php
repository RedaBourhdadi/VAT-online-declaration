<?php

namespace App\Http\Controllers;
// pmport DOMDocument
use DOMDocument;
// pmport Response
use Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ExcelTva;

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
        return view('exportXml',compact('Tvatable'));
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
        foreach ($data as $key => $value) {
            $root->appendChild($xmlDoc->createElement("SL",$value[0]));
            $root->appendChild($xmlDoc->createElement("col1",$value[1]));
            $root->appendChild($xmlDoc->createElement("col2",$value[2]));
            $root->appendChild($xmlDoc->createElement("col3",$value[3]));

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