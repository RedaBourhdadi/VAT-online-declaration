@extends('layouts.app')

@section('content')
<div class="">
    <div class="row d-flex justify-content-center">
        <?php 
$cond=true;


if ($cond==true) {
    // echo "true";

   echo' 
   
   
   
   <div id="pagination_data">
   <table  class=" w-100 ">
   <tr>
   <th class="valide correcte" width="0.5%"><i class="fas fa-square"></i></th>
    <th class="valide  " >: champ n\'est pas correcte</th>

    <th class="valide calc" width="0.5%"><i class="fas fa-square"></i></th>
    <th class="valide   " >: calcul n\'est pas correcte</th>

    <th class="valide vide" width="0.5%"><i class="fas fa-square"></i></th>
    <th class="valide" >: champ vide</th>

    <th class="valide sup" width="0.5%"><i class="fas fa-square"></i></th>
    <th title="date de paiement superieur de la date de facture" class="valide" >: date paie sup date fac</th>
    
    <th class="valide today" width="0.5%"><i class="fas fa-square"></i></th>
    <th class="valide" >: date paie sup date aujourd\'hui</th>
       </tr>
   </table>
    <div class="header mt-3 w-100">
    
        <table  class="table2 w-100">
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

        <table id="cartGrid" class="table1 table table-bordered table-hover">';
              
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
                                
                                echo " <td> ".gmdate('Y/m/d', $unix_date)." </td>"; 

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
                
    echo ' </table> 
    </div>
    </div>
    <div class="row">
     <input id="search_name" class="btn btn-outline-secondary mt-2 ml-2"  type="button" id="btn_submit" value="Validé"  >
    </div>';


}
    ?>

    </div>
    @endsection

    @push('page_scripts')
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('dist/for-jQuery1.x/dragndrop.table.columns.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>


    <script>
    function compart() {
        var rows = document.querySelectorAll(".table2")[0].rows;
        var last = rows[rows.length - 1];
        var cell = last.cells[0];
        var cel2 = last.cells[1];
        var cel3 = last.cells[2];
        var cel4 = last.cells[3];
        var cel5 = last.cells[4];
        var cel6 = last.cells[5];
        var cel7 = last.cells[6];
        var cel8 = last.cells[7];
        var cel9 = last.cells[8];
        var cel10 = last.cells[9];
        var cel11 = last.cells[10];
        var cel12 = last.cells[11];
        var cel13 = last.cells[12];

        var value = cell.innerHTML.trim().toLowerCase();
        var value2 = cel2.innerHTML.trim().toLowerCase();
        var value3 = cel3.innerHTML.trim().toLowerCase();
        var value4 = cel4.innerHTML.trim().toLowerCase();
        var value5 = cel5.innerHTML.trim().toLowerCase();
        var value6 = cel6.innerHTML.trim().toLowerCase();
        var value7 = cel7.innerHTML.trim().toLowerCase();
        var value8 = cel8.innerHTML.trim().toLowerCase();
        var value9 = cel9.innerHTML.trim().toLowerCase();
        var value10 = cel10.innerHTML.trim().toLowerCase();
        var value11 = cel11.innerHTML.trim().toLowerCase();
        var value12 = cel12.innerHTML.trim().toLowerCase();
        var value13 = cel13.innerHTML.trim().toLowerCase();

        var rows1 = document.querySelectorAll(".table1")[0].rows;
        last1 = rows1[rows.length - 1];
        var coll = last1.cells[0];
        var col2 = last1.cells[1];
        var col3 = last1.cells[2];
        var col4 = last1.cells[3];
        var col5 = last1.cells[4];
        var col6 = last1.cells[5];
        var col7 = last1.cells[6];
        var col8 = last1.cells[7];
        var col9 = last1.cells[8];
        var col10 = last1.cells[9];
        var col11 = last1.cells[10];
        var col12 = last1.cells[11];
        var col13 = last1.cells[12];
        var Rvalue = coll.innerHTML.trim().toLowerCase();
        var Rvalue2 = col2.innerHTML.trim().toLowerCase();
        var Rvalue3 = col3.innerHTML.trim().toLowerCase();
        var Rvalue4 = col4.innerHTML.trim().toLowerCase();
        var Rvalue5 = col5.innerHTML.trim().toLowerCase();
        var Rvalue6 = col6.innerHTML.trim().toLowerCase();
        var Rvalue7 = col7.innerHTML.trim().toLowerCase();
        var Rvalue8 = col8.innerHTML.trim().toLowerCase();
        var Rvalue9 = col9.innerHTML.trim().toLowerCase();
        var Rvalue10 = col10.innerHTML.trim().toLowerCase();
        var Rvalue11 = col11.innerHTML.trim().toLowerCase();
        var Rvalue12 = col12.innerHTML.trim().toLowerCase();
        var Rvalue13 = col13.innerHTML.trim().toLowerCase();
        var cntCol = 0;

        if (Rvalue == value) {
            cntCol++;

        }
        if (Rvalue2 == value2) {
            cntCol++;
        }
        if (Rvalue3 == value3) {
            cntCol++;
        }
        if (Rvalue4 == value4) {
            cntCol++;
        }
        if (Rvalue5 == value5) {
            cntCol++;
        }
        if (Rvalue6 == value6) {
            cntCol++;
        }
        if (Rvalue7 == value7) {
            cntCol++;
        }
        if (Rvalue8 == value8) {
            cntCol++;
        }
        if (Rvalue9 == value9) {
            cntCol++;
        }
        if (Rvalue10 == value10) {
            cntCol++;
        }
        if (Rvalue11 == value11) {
            cntCol++;
        }
        if (Rvalue12 == value12) {
            cntCol++;
        }
        if (Rvalue13 == value13) {
            cntCol++;
        }
        switch (cntCol) {
            case 0:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "rgba(255, 0, 0, 0.53)";
                break;
            case 2:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#ff6a0080";
                break;
            case 3:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#ff6a0080";
                break;
            case 4:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#b4ff0073";
                break;
            case 5:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#b4ff0073";
                break;
            case 6:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#fcf8005c";
                break;
            case 7:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#fcf8005c";
                break;
            case 8:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#fffb005c";
                break;
            case 9:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#fffb005c";
                break;
            case 10:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#9dff005c";
                break;
            case 11:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#9dff005c";
                break;
            case 12:
                console.log(cntCol);
                document.querySelector(".header").style.backgroundColor = "#9dff005c";
                break;
            case 13:
                console.log(cntCol);

                document.querySelector(".header").style.backgroundColor = "#10ff005c";





                break;

        }




        var myTableArrayVa = [];

        $("table#cartGrid tr ").each(function() {
            var arrayOfThisRowVa = [];
            var tableDataVa = $(this).find('td');
            if (tableDataVa.length > 0) {
                tableDataVa.each(function() {
                    if ($(this).text().trim() != '') {
                        // $(this).css('background-color', '#ff0000');
                    } else {
                        $(this).css('background-color', 'rgba(255, 0, 0, 0.54)');
                    }
                });
                myTableArrayVa.push(arrayOfThisRowVa);
                // console.log(myTableArrayVa);
            }

        });



    }

    $('.table').dragableColumns({
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


    var testVid, testNum, test, testPF, testDP = true;


    $('#search_name').on('click ', function() {
        var datae = "qdsqsdqsdzeaze";
        var myTableArray = [];
        var DATE_PAIE = new Date("2000/00/00");
        var DATE_FAC = new Date("2000/00/00");
        var TVA = 0;
        var TVAT = 0;
        var MHT = 0;
        var MTTC = 0;
        var Taux = 0;
        var conT = 0;
        var Sum = 0;
        var testVid = true;
        var testCal = true;
        var myTableArray = [];
        var myTableArray1 = [];



        $("table#cartGrid tr ").each(function() {
            var arrayOfThisRow = [];
            var coon = 0;
            var tableData = $(this).find('td , th');
            if (tableData.length > 0) {
                tableData.each(function() {
                    coon++;
                    arrayOfThisRow.push($(this).text());

                    if (coon == 1 && $(this).text().trim()
                        .toUpperCase() != "OR") {}
                    if (coon == 7) {
                        if ($(this).text().trim().length < 11 && $(this).text().trim()
                            .toUpperCase() != "IF") {
                            var num = $(this).text().trim();
                            const regex = new RegExp(/^[0-9]{7,10}$/g);
                            if (regex.test(num) != false) {} else {
                                console.log(regex.test(num));
                                $(this).css('background-color', ' rgba(255, 106, 0, 0.5) ');
                                testNum = false;
                                test = false;
                            }

                        }

                    }
                    if (coon == 9) {
                        if ($(this).text().trim().length < 11 && $(this).text().trim()
                            .toUpperCase() != "ICE_FRS") {
                            var num = $(this).text().trim();

                            const regex = new RegExp(/^[0-9]{7,16}$/g);
                            if (regex.test(num) != false) {} else {
                                console.log(regex.test(num));
                                $(this).css('background-color', ' rgba(255, 106, 0, 0.5) ');
                                testNum = false;
                                test = false;


                            }

                        }

                    }

                    if (coon == 12) {
                        if ($(this).text().trim().length < 11 && $(this).text().trim()
                            .toUpperCase() != "DATE_PAIE") {
                            // DATE_PAIE = $(this).text().trim();
                            DATE_PAIE = $(this).text().trim();
                            var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2,
                                '0'); //January is 0!
                            var yyyy = today.getFullYear();

                            today = yyyy + '/' + dd + '/' + mm;

                            if (DATE_PAIE > today) {
                                $(this).css('background-color', ' rgba(253, 160, 93, 0.5) ');
                                testDP = false;


                            }


                        }

                    }
                    if (coon == 13) {
                        if ($(this).text().trim().length < 11 && $(this).text().trim()
                            .toUpperCase() != "DATE_FAC") {
                            // DATE_PAIE = $(this).text().trim();
                            DATE_FAC = $(this).text().trim();

                            // console.log(DATE_PAIE);

                            if (DATE_PAIE >= DATE_FAC) {
                                $(this).css('background-color', ' rgba(247, 227, 68, 0.5) ');
                                testPF = false;


                            } else {
                                // test = false;


                            }

                        }

                    }


                    if ($(this).text().trim() == '') {
                        $(this).css('background-color', 'rgba(255, 0, 0, 0.54)');
                        testVid = false;
                        test = false;

                    }

                    if (coon == 13) {
                        coon = 0
                    }

                });
                myTableArray.push(arrayOfThisRow);
            }

        });
        $("table#cartGrid tr ").each(function() {
            var coonT = 0;
            var arrayOfThisRow = [];
            var tableData = $(this).find('td , th');
            if (tableData.length > 0) {
                tableData.each(function() {
                    coonT++;
                    if (coonT == 5) {
                        MHT = parseFloat(myTableArray[conT][3]).toFixed(2);
                        Taux = parseFloat(myTableArray[conT][9]).toFixed(2);
                        TVAT = parseFloat(myTableArray[conT][4]);
                        TVA = parseFloat(((MHT * Taux) / 100));
                        if ($(this).text().trim() == '') {
                            $(this).append(TVA.toFixed(2));
                            $(this).css('background-color', 'none');
                            testVid = true;
                            test = true;
                        } else if (myTableArray[conT][4].trim() != TVA.toFixed(2) && $(this)
                            .text().trim() != 'TVA') {
                            // console.log(myTableArray[conT][4].trim())
                            // console.log(TVA.toFixed(2))
                            $(this).css('background-color', 'rgba(255, 0, 208, 0.5)');
                            testCal = false;
                            test = true;
                            console.log(testCal);
                        }
                    }

                    if (coonT == 6) {
                        MTTC = parseFloat(myTableArray[conT][3]) + TVA;
                        Sum = parseFloat(myTableArray[conT][5].trim());
                        if ($(this).text().trim() == '') {
                            $(this).append(MTTC.toFixed(2));
                            testVid = true;
                            $(this).css('background-color', 'none');
                        } else if (Sum.toFixed(2) != MTTC.toFixed(2)) {
                            // console.log(parseFloat(myTableArray[4][3].trim()) + parseFloat(myTableArray[4][4].trim()))
                            $(this).css('background-color', 'rgba(255, 0, 208, 0.5)');
                            testCal = false;
                        }
                    }

                    if (coonT == 13) {
                        coonT = 0;
                        conT++;
                    }
                    arrayOfThisRow.push($(this).text());

                });
                myTableArray1.push(arrayOfThisRow);
            }

        });

        var requestData = JSON.stringify(myTableArray1);
        console.log(test);

        if (test == true) {
            console.log(myTableArray1);
            $.ajax({
                //    url: "{{ route('importValid') }}",
                url: "{{ route('importValid') }}",
                type: 'POST',
                data: {
                    data: requestData,
                    _token: "{{ csrf_token() }}"
                },
                // data: {name:'yogesh',salary: 35000,email: 'yogesh@makitweb.com'},
                success: function(data) {
                    if (data.title == 'Success') {
                        toastr.success(data.message);
                        setTimeout(() => {
                            location.href = "{{ route('exportXml') }}";
                        }, 2000);


                    } else {
                        toastr.error(data.message);

                    }
                }
            });
        } else {
            if (testVid == false) {
                toastr.error("Veuillez remplir les champs vides");
            }
            if (testNum == false) {
                toastr.error('Please check the number');
            }

            // toastr.warning("Please check the data");
            // toastr.info("Please check the data");


        }




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
    // function sum


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