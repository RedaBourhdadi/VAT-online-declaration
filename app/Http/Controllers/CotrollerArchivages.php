<?php

namespace App\Http\Controllers;
use App\Models\archivages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CotrollerArchivages extends Controller
{
    public function afficherArchivages($idd)
    {$seconds = 1;
        // $societes =  Societe::where([
        //         'user_id' , Auth::user()->id,
        //         'identifiantFiscale' , $idd
        // ]);
        $firstRow = DB::table('archivages')->latest('created_at')->first();
        // $firstRow = ExcelTva::whereEmail($email)->first();


        $archivages =  archivages::where('user_id' , Auth::user()->id,)->where('identifiantFiscale', $idd)->where('created_at','>=', date("Y-m-d H:i:s", (strtotime(date($firstRow->created_at)) - $seconds)))->get();

        // $societes = Societe::where('id', Auth::user()->id)->get()->first();
   
        return view('afficherArchivages' , compact('archivages'));
    }
    //

    public function afficherByDate(Request $request)
    {
        
        $data = $request->all();
        $data = json_decode($data['data'], true);
        $data = array_filter($data);
        $data = array_values($data);
        // return $data;
        // $idd
        $archivages =  archivages::where('user_id' , Auth::user()->id)->where('identifiantFiscale', $data[2])->whereYear('created_at', $data[0])->whereMonth('created_at', $data[1])->get();
        // return $value;

        return $archivages;

        $firstRow = DB::table('archivages')->latest('created_at')->first();



        // $societes = Societe::where('id', Auth::user()->id)->get()->first();
   
        return view('afficherArchivages' , compact('archivages'));
    }



}