@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">


<div class="container">
    <div class="row">


    


    <table id="cartGrid" class="table table-striped table-bordered "  cellspacing="0">
  <thead>
    <tr>
      <th scope="col" width="5%">SL </th>
      <th scope="col" width="31.6%">col1</th>
      <th scope="col" width="31.6%">col2</th>
      <th scope="col" width="31.6%">col3</th>
    </tr>
    </thead>
    <thead>
    <tr>
      <th><input type="text" id="search1" placeholder="SL"></td>
      <th><input type="text" id="search2" placeholder="col1"></td>
      <th><input type="text" id="search3" placeholder="col2"></td>
      <th><input type="text" id="search4" placeholder="col3"></td>
    </tr> </thead>

  <tbody>
          @php($i = 1)
        @foreach($Tvatable as $Tva) 
    <tr>
      <th scope="row"> {{ $i++  }} </th>
      <td> {{ $Tva->col1 }} </td>
      <td> {{ $Tva->col2 }} </td>
      <td> {{ $Tva->col3 }} </td>
      



    </tr> 
    @endforeach


  </tbody>
</table>
 <!-- export Tvatable in xml -->



    </div>

    <div class="row">
        <input id="search_name" class="btn btn-outline-secondary mt-2 ml-2"  type="button" id="btn_submit" value="Export to XML"  >

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


// $(document).ready(function () {
//     $('#cartGrid').DataTable();
// });
var $rows = $('#cartGrid tbody tr');
var filters = [[],[],[],[]];
$("[id*=search]").keyup(function() {
    var col = this.id.replace(/[a-z]/gi, "") - 1;
    filters[col] = $(this).val().trim().replace(/ +/g, ' ').toLowerCase().split(",").filter(l => l.length);
    $rows.show();
    if(filters.some(f => f.length)) {
        $rows.filter(function() {
            var texts = $(this).children().map((i, td) => $(td).text().replace(/\s+/g, ' ').toLowerCase()).get();
            return !texts.every((t, col) => {
                return filters[col].length == 0 || filters[col].some((f, i) => t.indexOf(f) >= 0);
            })
        }).hide();
    }
})

$(document).ready(function () {
  $('#cartGrid').DataTable();
  $('.dataTables_length').addClass('bs-select');
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
  url: "{{ route('exportXmlValid') }}",
   type: 'POST',
  data: { data : requestData , _token: "{{ csrf_token() }}" },
   success: function(data){
    // if (data.title == 'Success') {
    //     toastr.success(data.message);
    // } else {
    //     toastr.error(data.message);
    // }
    console.log(data);
    const blob = new Blob([data], { type: 'text/xml' });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'export.xml';
    link.click();
    window.URL.revokeObjectURL(url);

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