@extends('layouts.app')

@section('content')
<style>
.input-lg+.form-control-feedback,
.input-group-lg+.form-control-feedback,
.form-group-lg .form-control+.form-control-feedback {
    width: 46px;
    height: 46px;
    line-height: 46px;
}

.input-sm+.form-control-feedback,
.input-group-sm+.form-control-feedback,
.form-group-sm .form-control+.form-control-feedback {
    width: 30px;
    height: 30px;
    line-height: 30px;
}

.input-group {
    display: inline-table;
    vertical-align: middle;
}

.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}

.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}

.input-group .form-control:focus {
    z-index: 3;
}

.input-group .form-control {
    display: table-cell;
}

.input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0;
}

.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child>.btn,
.input-group-btn:first-child>.btn-group>.btn,
.input-group-btn:first-child>.dropdown-toggle,
.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle),
.input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.has-success .input-group-addon {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #3c763d;
}

.has-warning .input-group-addon {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #8a6d3b;
}

.has-error .input-group-addon {
    color: #a94442;
    background-color: #f2dede;
    border-color: #a94442;
}

.form-inline .input-group .input-group-addon,
.form-inline .input-group .input-group-btn,
.form-inline .input-group .form-control {
    width: auto;
}

.input-group-lg>.form-control,
.input-group-lg>.input-group-addon,
.input-group-lg>.input-group-btn>.btn {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}

textarea.input-group-lg>.form-control,
textarea.input-group-lg>.input-group-addon,
textarea.input-group-lg>.input-group-btn>.btn,
select[multiple].input-group-lg>.form-control,
select[multiple].input-group-lg>.input-group-addon,
select[multiple].input-group-lg>.input-group-btn>.btn {
    height: auto;
}

.input-group-sm>.form-control,
.input-group-sm>.input-group-addon,
.input-group-sm>.input-group-btn>.btn {
    height: 30px;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}

select.input-group-sm>.form-control,
select.input-group-sm>.input-group-addon,
select.input-group-sm>.input-group-btn>.btn {
    height: 30px;
    line-height: 30px;
}

textarea.input-group-sm>.form-control,
textarea.input-group-sm>.input-group-addon,
textarea.input-group-sm>.input-group-btn>.btn,
select[multiple].input-group-sm>.form-control,
select[multiple].input-group-sm>.input-group-addon,
select[multiple].input-group-sm>.input-group-btn>.btn {
    height: auto;
}

.input-group-addon,
.input-group-btn,
.input-group .form-control {
    display: table-cell;
}

.input-group-addon:not(:first-child):not(:last-child),
.input-group-btn:not(:first-child):not(:last-child),
.input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0;
}

.input-group-addon,
.input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}

.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.input-group-addon.input-sm {
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
}

.input-group-addon.input-lg {
    padding: 10px 16px;
    font-size: 18px;
    border-radius: 6px;
}

.input-group-addon input[type="radio"],
.input-group-addon input[type="checkbox"] {
    margin-top: 0;
}

.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child>.btn,
.input-group-btn:first-child>.btn-group>.btn,
.input-group-btn:first-child>.dropdown-toggle,
.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle),
.input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group-addon:first-child {
    border-right: 0;
}

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child>.btn,
.input-group-btn:last-child>.btn-group>.btn,
.input-group-btn:last-child>.dropdown-toggle,
.input-group-btn:first-child>.btn:not(:first-child),
.input-group-btn:first-child>.btn-group:not(:first-child)>.btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.input-group-addon:last-child {
    border-left: 0;
}

.navbar-form .input-group .input-group-addon,
.navbar-form .input-group .input-group-btn,
.navbar-form .input-group .form-control {
    width: auto;
}

.has-feedback label~.form-control-feedback {
    top: 25px;
}

.has-feedback label.sr-only~.form-control-feedback {
    top: 0;
}

.form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
}

.form-inline .form-control-static {
    display: inline-block;
}

.form-inline .input-group .input-group-addon,
.form-inline .input-group .input-group-btn,
.form-inline .input-group .form-control {
    width: auto;
}

.form-inline .input-group>.form-control {
    width: 100%;
}

.carousel-control .icon-prev,
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
    margin-top: -10px;
}

.carousel-control .icon-prev,
.carousel-control .glyphicon-chevron-left {
    left: 50%;
    margin-left: -10px;
}

.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-right {
    right: 50%;
    margin-right: -10px;
}

.glyphicon-calendar:before {
    content: "\e109";
}

.btn-toolbar .btn,
.btn-toolbar .btn-group,
.btn-toolbar .input-group {
    float: left;
}

@media screen and (-webkit-min-device-pixel-ratio: 0) {

    input[type="date"].form-control,
    input[type="time"].form-control,
    input[type="datetime-local"].form-control,
    input[type="month"].form-control {
        line-height: 34px;
    }

    input[type="date"].input-sm,
    input[type="time"].input-sm,
    input[type="datetime-local"].input-sm,
    input[type="month"].input-sm,
    .input-group-sm input[type="date"],
    .input-group-sm input[type="time"],
    .input-group-sm input[type="datetime-local"],
    .input-group-sm input[type="month"] {
        line-height: 30px;
    }

    input[type="date"].input-lg,
    input[type="time"].input-lg,
    input[type="datetime-local"].input-lg,
    input[type="month"].input-lg,
    .input-group-lg input[type="date"],
    .input-group-lg input[type="time"],
    .input-group-lg input[type="datetime-local"],
    .input-group-lg input[type="month"] {
        line-height: 46px;
    }
}

@media screen and (min-width: 768px) {

    .carousel-control .glyphicon-chevron-left,
    .carousel-control .glyphicon-chevron-right,
    .carousel-control .icon-prev,
    .carousel-control .icon-next {
        width: 30px;
        height: 30px;
        margin-top: -10px;
        font-size: 30px;
    }

    .carousel-control .glyphicon-chevron-left,
    .carousel-control .icon-prev {
        margin-left: -10px;
    }

    .carousel-control .glyphicon-chevron-right,
    .carousel-control .icon-next {
        margin-right: -10px;
    }

    .carousel-caption {
        right: 20%;
        left: 20%;
        padding-bottom: 30px;
    }

    .carousel-indicators {
        bottom: 20px;
    }
}

/* #cartGrid {
    margin-left: 10px;
    margin-right: 10px;
} */
</style>

<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css"
    rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<div class="container">
    <div class="row">




        <div class="input-group date" id="datetimepicker1">
            <input type="text" class="form-control" value="<?php date('Y-m'); ?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>










    </div>




</div>
<div class="row" id="body">
    <table id="cartGrid" class="table table-striped table-bordered " cellspacing="0">
        <thead>
            <tr>
                <th width="3%">OR</th>
                <th width="8%">FACT_NUM</th>
                <th width="11%">DESIGNATION</th>
                <th width="5%">M_HT</th>
                <th width="5%">TVA</th>
                <th width="5%">M_TTC</th>
                <th width="5%">IF</th>
                <th width="10%">LIB_FRSS</th>
                <th width="6%">ICE_FRS</th>
                <th width="6%">TAUX</th>
                <th width="6%">ID_PAIE</th>
                <th width="8%">DATE_PAIE</th>
                <th width="7%">DATE_FAC</th>


            </tr>
        </thead>


        <tbody id="tbody">
            @php($i = 1)
            @foreach($archivages as $arch)
            <tr>
                <th scope="row"> {{ $i++  }} </th>
                <td> {{ $arch->FACT_NUM }} </td>
                <td> {{ $arch->DESIGNATION }} </td>
                <td> {{ $arch->M_HT }} </td>
                <td> {{ $arch->TVA }} </td>
                <td> {{ $arch->M_TTC }} </td>
                <td> {{ $arch->IF }} </td>
                <td> {{ $arch->LIB_FRSS }} </td>
                <td> {{ $arch->ICE_FRS }} </td>
                <td> {{ $arch->TAUX }} </td>
                <td> {{ $arch->ID_PAIE }} </td>
                <td> {{ $arch->DATE_PAIE }} </td>
                <td> {{ $arch->DATE_FAC }} </td>

                @php( $date= $arch->created_at)
                @php( $identifiantFiscale= $arch->identifiantFiscale)
                @php( $user_id= $arch->user_id)


            </tr>
            @endforeach


        </tbody>
    </table>

</div>
@endsection

@push('page_scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<Script>
$('#datetimepicker1').datetimepicker({
    format: 'YYYY-MM',
    viewMode: 'months',
    defaultDate: "{{$date}}"
});
$('#datetimepicker1').on('change', function() {
    // var date = $('#datetimepicker1').data("DateTimePicker").date();
    console.log("date");
});

$(document).ready(function() {
    $('#cartGrid').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
$('#datetimepicker1').on('dp.change', function(e) {
    $('#tbody').remove();
    // $('#cartGrid_wrapper').remove();

    var datee = [];
    datee.push(e.date.format('YYYY'));
    datee.push(e.date.format('MM'));
    // datee.push("qsdqdqsd");
    datee.push("{{$identifiantFiscale}}");
    var requestData = JSON.stringify(datee);

    $.ajax({
        //    url: "{{ route('importValid') }}",
        url: "{{ route('afficherByDate') }}",
        type: 'POST',
        data: {
            data: requestData,
            _token: "{{ csrf_token() }}"
        },
        success: function(data) {



            let tbody = document.createElement('tbody');
            tbody.setAttribute('id', 'tbody');


            var result = [];
            // first loop through items
            data.forEach(function(items) {
                // console.log(items['FACT_NUM']);
                var td = document.createElement('td');
                td.innerHTML = items['FACT_NUM'];
                // var FACT_NUM = td;
                let row_1 = document.createElement('tr');

                row_1.innerHTML = `
                <td>${items['OR']}</td> 
                <td>${items['FACT_NUM']}</td> 
                <td>${items['DESIGNATION']}</td>
                <td>${items['M_HT']}</td>
                <td>${items['TVA']}</td>
                <td>${items['M_TTC']}</td>
                <td>${items['IF']}</td>
                <td>${items['LIB_FRSS']}</td>
                <td>${items['ICE_FRS']}</td>
                <td>${items['TAUX']}</td>
                <td>${items['ID_PAIE']}</td>
                <td>${items['DATE_PAIE']}</td>
                <td>${items['DATE_FAC']}</td>
                `;
                tbody.appendChild(row_1);

                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'DESIGNATION']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'M_HT']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'TVA']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'M_TTC']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'IF']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'LIB_FRSS']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     ' ICE_FRS']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'TAUX']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'ID_PAIE']);
                // row_1.appendChild(document.createElement('td').innerHTML = items[
                //     'DATE_PAIE']);
                // console.log("==========================================");
                // console.log(items);
                // var obj = {};
                // 
                // let text1 = document.createElement('td');
                // let text2 = document.createElement('td');
                // let text3 = document.createElement('td');
                // let text4 = document.createElement('td');
                // let text5 = document.createElement('td');
                // let text6 = document.createElement('td');
                // let text7 = document.createElement('td');
                // text1.innerHTML = items[0];
                // text2.innerHTML = items[1];
                // text3.innerHTML = items[2];
                // text4.innerHTML = items[3];
                // text5.innerHTML = items[4];
                // text6.innerHTML = items[5];
                // text7.innerHTML = items[6];

                // row_1.appendChild(text1);
                // row_1.appendChild(text2);
                // row_1.appendChild(text3);
                // row_1.appendChild(text4);
                // row_1.appendChild(text5);
                // row_1.appendChild(text6);
                // row_1.appendChild(text7);


                // for (const item in items) {
                // console.log(`
                //                             $ {
                //                                 item
                //                             }: $ {
                //                                 items[item]
                //                             }
                //                             `);
                //     // console.log(items[item]);


                // }
                // once all is done push the object
            });









            // row_1.appendChild(heading_1);
            // Adding the entire table to the body tag
            document.getElementById('cartGrid').appendChild(tbody);


            // console.log(data);


        }
    });




})
</Script>
@endpush