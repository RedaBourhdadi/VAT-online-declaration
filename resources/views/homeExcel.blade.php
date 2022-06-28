


@extends('layouts.app')

@section('content')
<!-- container -->
<div class="container ">
<div class="row d-flex justify-content-center">
<!-- justify-content-end -->
    <div class="mt-5 pt-3 ">
    <!-- <button class="btn btn-outline-success mt-2" >import Excel</button> -->



  {{--   --}}
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card " style="width: 30rem;">
            <div class="card-body">
               <!-- <input type="file" name="file" class="form-control"> -->
               <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="form-control custom-file-input" name="file"  id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>



            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-secondary mt-2" >import Excel</button>
            </div>
        </div>

    </div>

    @if(session('success'))
 
   @endif
   




    </div>
</div>
@endsection
