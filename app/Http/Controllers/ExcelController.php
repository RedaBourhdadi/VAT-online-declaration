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

        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $worksheetInfo = $reader->listWorksheetInfo($path);
        $totalRows = $worksheetInfo[0]['totalRows'];
        $cars = array();
        $num=0;
        for($row = 1; $row < $totalRows; $row++){
            $cars[] = array(
                $col1 = $sheet->getCell("A{$row}")->getValue(),
                $col2 = $sheet->getCell("B{$row}")->getValue(),
                $col3 = $sheet->getCell("C{$row}")->getValue(),
            );
        }

        

        // ExcelTva::create(['user_id' => Auth::id(),'col1' => $col1,'col2' => $col2,'col3' => $col3]);
        // $path = $request->file('file')->get_resources_path();
       // dd($worksheetInfo);


        // return view(back()->with('success', 'All good!'), compact('cars'));
       return view('validation',compact('cars')) ;
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

                    if (  $value[0] == " col1 "  && $value[1]==" col2 "  && $value[2]==" col3 " ){
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
                        ExcelTva::insert(['user_id' => Auth::id(),'col1' => $value[0],'col2' => $value[1],'col3' =>  $value[2], 'created_at' => now(), 'updated_at' => now()]);
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
