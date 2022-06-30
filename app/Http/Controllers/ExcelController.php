<?php

namespace App\Http\Controllers;
use Excel;
use App\imports\ImportExcel;
use App\Models\ExcelTva;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{
    public function importExcel()
    {
        return view('homeExcel');
    }

    public function showArticle(Request $request){
        $path =storage_path().'/app/'.$request->file('file')->store('tmp');
        function fromExcelToLinux($excel_time) {
            return ($excel_time-25569)*86400;
        }
        
        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $worksheetInfo = $reader->listWorksheetInfo($path);
        $totalRows = $worksheetInfo[0]['totalRows'];
        $table = array();
        $num=0;
        for($row = 1; $row < $totalRows; $row++){
            $table[] = array(
                $col1 = $sheet->getCell("A{$row}")->getValue(),
                $col2 = $sheet->getCell("B{$row}")->getValue(),
                $col3 = $sheet->getCell("C{$row}")->getValue(),
                $col4 = $sheet->getCell("D{$row}")->getValue(),
                $col5 = $sheet->getCell("E{$row}")->getValue(),
                $col6 = $sheet->getCell("F{$row}")->getValue(),
                $col7 = $sheet->getCell("G{$row}")->getValue(),
                $col8 = $sheet->getCell("H{$row}")->getValue(),
                $col9 = $sheet->getCell("I{$row}")->getValue(),
                $col10 = $sheet->getCell("J{$row}")->getValue(),
                $col11 = $sheet->getCell("K{$row}")->getValue(),
                $col12=  $sheet->getCell("L{$row}")->getValue(),
                $col13= $sheet->getCell("M{$row}")->getValue(),
            );
        }


        // $excel_date = 42370; 
        // $unix_date = ($excel_date - 25569) * 86400;
        // $excel_date = 25569 + ($unix_date / 86400);
        // $unix_date = ($excel_date - 25569) * 86400;
        // echo gmdate("d/m/Y", $unix_date);


        // $col12= date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("L{$row}")->getValue()))
        // $unix_date = ((25569 + ((($sheet->getCell("L{$row}")->getValue() - 25569) * 86400) / 86400)) - 25569) * 86400;

        

        // ExcelTva::create(['user_id' => Auth::id(),'col1' => $col1,'col2' => $col2,'col3' => $col3]);
        // $path = $request->file('file')->get_resources_path();
       // dd($worksheetInfo);


        // return view(back()->with('success', 'All good!'), compact('cars'));
       return view('validation',compact('table')) ;
    // return $table;
     //   view('admin.home.edit',compact('homeabout'))->with('success', 'All good!'); 
     }


    public function import(Request $request)
    {
        //  return $request;

           $data = $request->all();


            $data = json_decode($data['data'], true);
            $data = array_filter($data);
            $data = array_values($data);
            $num=0;
            $cond= false;
          //  return $data;
            foreach ($data as $key => $value) {
                if ($num==0){

                    if (  $value[0] == " OR "  && $value[1] == " FACT_NUM "  && $value[2] == " DESIGNATION "  && $value[3] == " M_HT "  && $value[4] == " TVA "  && $value[5] == " M_TTC "  && $value[6] == " IF "  && $value[7] == " LIB_FRSS "  && $value[8] == " ICE_FRS "  && $value[9] == " TAUX "  && $value[10] == " ID_PAIE "  && $value[11] == " DATE_PAIE "  && $value[12] == " DATE_FAC "  ){
                        $num++;
                        $cond= true;
                    }else{
                        $notification = array( 
                            'title' => 'error',
                            'message' => 'please order columns in the right way',
                        );
                        return $notification;
                    }
                   
                } else {
                    if ($cond==true){
                        ExcelTva::insert(['user_id' => Auth::id(),'OR' => $value[0],'FACT_NUM' => $value[1],'DESIGNATION' => $value[2],'M_HT' => $value[3],'TVA' => $value[4],'M_TTC' => $value[5],'IF' => $value[6],'LIB_FRSS' => $value[7],'ICE_FRS' => $value[8],'TAUX' => $value[9],'ID_PAIE' => $value[10],'DATE_PAIE' => $value[11]." 00:00:00",'DATE_FAC' => $value[12]." 00:00:00", 'created_at' => now(), 'updated_at' => now()]);

                        // ExcelTva::insert(['user_id' => Auth::id(),'col1' => $value[0],'col2' => $value[1],'col3' =>  $value[2], 'created_at' => now(), 'updated_at' => now()]);
                    }
                }

}
$notification = array( 
    'title' => 'Success',
    'message' => 'success',
);
return $notification;
        // ExcelTva::insert([
        //     'user_id' => $request->user_id,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

    
    //   $data = $request->all();


        // foreach ($data as $key => $value) {
        //     ExcelTva::create(['col1' => $value[0],'col2' => $value[1],'col3' => $value[2]]);
        // }

    //   return $data;
                //    $data = $request->all();
                // $data = json_decode($data['data'], true);

                // ExcelTva::insert($data);
                // ExcelTva::insert(['user_id' => Auth::id(),'col1' => $data['col1'],'col2' => $data['col2'],'col3' => $data['col3']]);

// DB::table('excel_tvas')->insert($data); // Query Builder approach
                



        // dd(data);

    //     $this->validate($request, [
    //         'file' => 'required|mimes:xls,xlsx,csv'
    //     ]);
    //     $path = $request->file('file')->getRealPath();
    //     
    //     return ;
    
    // $request->validate([
    //     'file' => 'required|max:10000|mimes:xlsx,xls',
    // ]);

    // $path = $request->file('file');

    //     Excel::import(new ImportExcel, $path);
        
  // Excel::import(new ImportExcel, $request->file('file'));

  //  Excel::import(new ImportExcel, $request->file('file'));
   // dd($data);
    // $path = $request->file('file')->getRealPath();

    // return back()->with('success', 'All good!');


 
    }
}
