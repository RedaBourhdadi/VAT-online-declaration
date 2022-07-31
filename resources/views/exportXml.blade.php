@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<style>


</style>

<div class="">

    <div class="d-flex justify-content-between">
        <div class="p-2">
            <table id="cartGridS" class="table">
                <tr>
                    <th class="table-light my-1 py-1  ">RAISON SOCIAL</th>
                    <td class=" my-1 py-1  ">{{$societes->raisonSociale}}</td>
                </tr>
                <tr>
                    <th class="table-light my-1 py-1">ID_FISCAL</th>
                    <td class=" my-1 py-1">{{$societes->identifiantFiscale}}</td>
                </tr>
                <tr>
                    <th class="table-light my-1 py-1  ">Annee</th>
                    <td class=" my-1 py-1  "> 2022</td>
                </tr>
                <tr>
                    <th class="table-light my-1 py-1  ">PERIODE</th>
                    <td class=" my-1 py-1  ">{{$societes->periode}}</td>
                </tr>

                <tr>
                    <th class="table-light my-1 py-1  ">REGIME</th>
                    <td class=" my-1 py-1  ">{{$societes->regime}}</td>
                </tr>
            </table>
        </div>
        <div class="p-2 text-center">
            <img src="{{ asset('images/logoR.png')}} " class="roy " alt="">
            <table class="table textR ">
                <tr>
                    <td class="text-center border border-secondary"> RELEVE de déduction </td>
                </tr>
                <tr>
                    <td class="text-center border border-secondary"> (Article 112 du Code Général des Impôts) </td>
                </tr>
            </table>
        </div>
        <div class="p-2">
            <img src="{{ asset('images/logoTVAA.png')}} " class="tva" alt="">
        </div>
    </div>
    <div class="row">





        <table id="cartGrid" class="table table-striped table-bordered " cellspacing="0">
            <thead>
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

                    <!-- <th >OR</th>
                <th >FACT_NUM</th>
                <th >DESIGNATION</th>
                <th >M_HT</th>
                <th >TVA</th>
                <th >M_TTC</th>
                <th >IF</th>
                <th >LIB_FRSS</th>
                <th >ICE_FRS</th>
                <th >TAUX</th>
                <th >ID_PAIE</th>
                <th >DATE_PAIE</th>
                <th >DATE_FAC</th> -->


                </tr>
            </thead>
            <thead>
                <tr>
                    <th><input type="text" id="search1" placeholder="OR"></td>
                    <th><input type="text" id="search2" placeholder="FACT_NUM"></td>
                    <th><input type="text" id="search3" placeholder="DESIGNATION"></td>
                    <th><input type="text" id="search4" placeholder="M_HT"></td>
                    <th><input type="text" id="search5" placeholder="TVA"></td>
                    <th><input type="text" id="search6" placeholder="M_TTC"></td>
                    <th><input type="text" id="search7" placeholder="IF"></td>
                    <th><input type="text" id="search8" placeholder="LIB_FRSS"></td>
                    <th><input type="text" id="search9" placeholder="ICE_FRS"></td>
                    <th><input type="text" id="search10" placeholder="TAUX"></td>
                    <th><input type="text" id="search11" placeholder="ID_PAIE"></td>
                    <th><input type="text" id="search12" placeholder="DATE_PAIE"></td>
                    <th><input type="text" id="search13" placeholder="DATE_FAC"></td>
                </tr>
            </thead>

            <tbody>
                @php($i = 1)
                @foreach($Tvatable as $Tva)
                <tr>
                    <th scope="row"> {{ $i++  }} </th>
                    <!-- <td> {{ $Tva->OR }} </td> -->
                    <td> {{ $Tva->FACT_NUM }} </td>
                    <td> {{ $Tva->DESIGNATION }} </td>
                    <td> {{ $Tva->M_HT }} </td>
                    <td> {{ $Tva->TVA }} </td>
                    <td> {{ $Tva->M_TTC }} </td>
                    <td> {{ $Tva->IF }} </td>
                    <td> {{ $Tva->LIB_FRSS }} </td>
                    <td> {{ $Tva->ICE_FRS }} </td>
                    <td> {{ $Tva->TAUX }} </td>
                    <td> {{ $Tva->ID_PAIE }} </td>
                    <td> {{ $Tva->DATE_PAIE }} </td>
                    <td> {{ $Tva->DATE_FAC }} </td>



                </tr>
                @endforeach


            </tbody>
        </table>
        <!-- export Tvatable in xml -->



    </div>

    <div class="row">
        <input id="search_name" class="btn btn-outline-secondary mt-2 ml-2" type="button" id="btn_submit"
            value="Export to XML">

    </div>
</div>

@endsection



@push('page_scripts')
<!-- <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- <script type="text/javascript" src="https://raw.githubusercontent.com/hhurz/tableExport.jquery.plugin/master/libs/FileSaver/FileSaver.min.js"></script> -->



<script type="text/javascript">
var ID_FISCAL = "{{$societes->identifiantFiscale}}";
// $(document).ready(function () {
//     $('#cartGrid').DataTable();
// });
var $rows = $('#cartGrid tbody tr');
var filters = [
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    [],
    []
];
$("[id*=search]").keyup(function() {
    var col = this.id.replace(/[a-z]/gi, "") - 1;
    filters[col] = $(this).val().trim().replace(/ +/g, ' ').toLowerCase().split(",").filter(l => l.length);
    $rows.show();
    if (filters.some(f => f.length)) {
        $rows.filter(function() {
            var texts = $(this).children().map((i, td) => $(td).text().replace(/\s+/g, ' ')
                .toLowerCase()).get();
            return !texts.every((t, col) => {
                return filters[col].length == 0 || filters[col].some((f, i) => t.indexOf(f) >=
                    0);
            })
        }).hide();
    }
})

$(document).ready(function() {
    $('#cartGrid').DataTable();
    $('.dataTables_length').addClass('bs-select');
});


$('#search_name').on('click ', function() {
    // var datae= "qdsqsdqsdzeaze";

    var myTableArray = [];
    var myTableArrayS = [];

    $("table#cartGridS tr ").each(function() {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
            tableData.each(function() {

                myTableArrayS.push($(this).text());
            });
        }

    });
    myTableArray.push(myTableArrayS);


    $("table#cartGrid tr ").each(function() {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td , th');
        if (tableData.length > 0) {
            tableData.each(function() {
                arrayOfThisRow.push($(this).text().trim());
            });
            myTableArray.push(arrayOfThisRow);
        }

    });

    var requestData = JSON.stringify(myTableArray);

    $.ajax({
        //    url: "{{ route('importValid') }}",
        url: "{{ route('exportXmlValid') }}",
        type: 'POST',
        data: {
            data: requestData,
            _token: "{{ csrf_token() }}"
        },
        success: function(data) {
            // if (data.title == 'Success') {
            //     toastr.success(data.message);
            // } else {
            //     toastr.error(data.message);
            // }

            const blob = new Blob([data], {
                type: 'text/xml'
            });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'export.xml';
            link.click();
            window.URL.revokeObjectURL(url);
            // creete link to redirect to view weth the id of the societe

            var linkk = document.createElement('a');
            linkk.href = "{{ route('afficherArchivages',['id'=>$societes->identifiantFiscale]) }}";
            linkk.click();

        }
    });




    // console.log(myTableArray);







});






// var jArray = <?php echo json_encode($Tvatable); ?>;
// for(var i=0; i<jArray.length; i++){
// //    <?php echo json_encode($Tvatable); ?>
//     // console.log(<?php echo json_encode($Tvatable); ?>);
// }
</script>



@endpush