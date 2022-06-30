
@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row d-flex justify-content-center">

    <div id="pagination_data">
    <div class="header mt-3 w-100">
        <table  class=" w-100">
        <tr>
                <th width="5%">OR</th>
                <th width="9%">FACT_NUM</th>
                <th width="12%">DESIGNATION</th>
                <th width="6%">M_HT</th>
                <th width="6%">TVA</th>
                <th width="6%">M_TTC</th>
                <th width="5%">IF</th>
                <th width="13%">LIB_FRSS</th>
                <th width="7%">ICE_FRS</th>
                <th width="7%">TAUX</th>
                <th width="7%">ID_PAIE</th>
                <th width="9%">DATE_PAIE</th>
                <th width="8%">DATE_FAC</th>
            </tr>
        </table>
    </div>

        <table id="cartGrid" class="table table-bordered table-hover">
                <?php
                $num=0;

                foreach ($table as $t)
                { 
                    if( $num==0){
                           
                        echo "<thead>" ;

                        
                    }
                    else{
                        echo "<tbody>" ;
                        
    
                    }
                    echo " <tr class='dnd-moved'>" ;
                    $col=0;
                    foreach ($t as $key=>$value)
                    { $col++;
                        if( $num==0){
                           
                            echo " <th> $value </th>"; 
                        }

                        else{
                            if($col==12 || $col==13){
                                $excel_date = (int) $value; //here is that value 41621 or 41631
                                $unix_date = ($excel_date - 25569) * 86400;
                                $excel_date = 25569 + ($unix_date / 86400);
                                $unix_date = ($excel_date - 25569) * 86400;
                                
                                echo " <td> ".gmdate('Y-m-d', $unix_date)." </td>"; 

                            }else{
                                echo " <td> $value </td>"; 
                            }
                            
                        }

                    }
                    echo " <tr>" ;
                    if( $num==0){
                           
                        echo "</thead>" ;  
                    }
                    else{
                        echo "</tbody>" ;
                    }
                    $num++;
                }
                ?>
            </table>    

        </div>
    </div>
    <div class="row">
    <input id="search_name" class="btn btn-outline-secondary mt-2 ml-2"  type="button" id="btn_submit" value="Validé"  >
    </div>
</div>
@endsection

 @push('page_scripts')
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('dist/for-jQuery1.x/dragndrop.table.columns.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>


 <script>


function compart() {
    var rows = document.querySelectorAll("table")[0].rows;
var last = rows[rows.length - 1];
var cell = last.cells[0];
var cel2 = last.cells[1];
var cel3 = last.cells[2];
var value = cell.innerHTML.trim().toLowerCase() ;
var value2 = cel2.innerHTML.trim().toLowerCase();
var value3 = cel3.innerHTML.trim().toLowerCase();
var rows1 = document.querySelectorAll(".table")[0].rows;
last1 = rows1[rows.length - 1];
var coll = last1.cells[0];
var col2 = last1.cells[1];
var col3 = last1.cells[2];
var Rvalue = coll.innerHTML.trim().toLowerCase();
var Rvalue2 = col2.innerHTML.trim().toLowerCase();
var Rvalue3 = col3.innerHTML.trim().toLowerCase();
var cntCol = 0;
if(Rvalue==value){
    cntCol++;

    }
if(Rvalue2==value2){
    cntCol++;
    }
if(Rvalue3==value3){
    cntCol++;
    }
switch(cntCol){
    case 0:
        console.log(cntCol);
        document.querySelector(".header").style.backgroundColor = "rgba(255, 0, 0, 0.53)";
        break;
    case 1:
        console.log(cntCol);
        document.querySelector(".header").style.backgroundColor = "#ff6a0080";

        break;
    case 2:
        console.log(cntCol);
        document.querySelector(".header").style.backgroundColor = "#b4ff0073";
        break;
    case 3:
        console.log(cntCol);
        document.querySelector(".header").style.backgroundColor = "#10ff005c";
        break;

    }

}

$('.table').dragableColumns( {
    draggable: 'th',
    exclude: '',
    scrollContainer: '',
    scrollSpeed: 10,
    scrollSensitivity: 10,
    revert: true,
    revertDuration: 0,
    onDragEnd: function(table, row) {
        compart();
    }
});




$('#search_name').on('click ',function(){
    // var datae= "qdsqsdqsdzeaze";

    var myTableArray = [];

$("table#cartGrid tr ").each(function() {
    var arrayOfThisRow = [];
    var tableData = $(this).find('td , th');
    if (tableData.length > 0) {
        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArray.push(arrayOfThisRow);
    }
   
});


var requestData = JSON.stringify(myTableArray);

$.ajax({
//    url: "{{ route('importValid') }}",
  url: "{{ route('importValid') }}",
   type: 'POST',
  data: { data : requestData , _token: "{{ csrf_token() }}" },
    // data: {name:'yogesh',salary: 35000,email: 'yogesh@makitweb.com'},
   success: function(data){
    if (data.title == 'Success') {
        toastr.success(data.message);
    } else {
        toastr.error(data.message);
    }
   }
});



// console.log(myTableArray);







});
// alert(myTableArray);



//     var new_tab =  ['test1','test2']; 
//       var requestData = JSON.stringify(new_tab);
//     $.ajax({
//            type: 'GET',
//            url: "{{ route('importValid') }}",
//             //data: {data : requestData},
//             data: "qdsqsdqsdzeaze" ,
//               dataType: 'json',
//               success: function(data) {
//                 console.log(data);
//             }
//             error : function(data) {
//                 console.log("saqdesfqsf");
//             }
//         })
// });




// function myFunction() {

//       var new_tab =  ['test1','test2']; 
//       var requestData = JSON.stringify(new_tab);
// $.ajax({
//            type: 'GET',
//            url: "{{ route('importValid') }}",
//            data: {data : requestData},
// //    success: function( data ) {document.getElementById("p").innerHTML =data;},
// //    error: function(xhr, status, error) {alert(error);},
// //      dataType: 'json'
//  })
// }

//   var tab = document.getElementsByName('tr');
//   var new_tab =  ['test1','test2']; 
//  for (var i =0 ; i<tab.length; i++){
//     //new_tab [i][i] = tab[i].innerHTML;

//  }


// var requestData = JSON.stringify(new_tab);
// $.ajax({
//            type: 'GET',
//            url: "{{ route('importValid') }}",
//            data: {data : requestData},
// //    success: function( data ) {document.getElementById("p").innerHTML =data;},
// //    error: function(xhr, status, error) {alert(error);},
// //      dataType: 'json'
//  })

            </script>
 @endpush