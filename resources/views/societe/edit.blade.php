@extends('layouts.app')
@section('content')

<style>
input {
    background-color: white !important;
}
input[type="file"]{
    display: none;
}
.container {
  position: relative;
  width: 73%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  /* background-color: #04AA6D; */
  color: black;
  font-size: 50px;
  padding: 16px 32px;
}
</style>

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Societe</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('UpdateSociete',$societes->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-sm-6 col-lg-8 themed-grid-col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Raison Sociale </label>
                            <input type="text" name="raisonSociale" class="form-control asd" id="exampleFormControlInput1"
                                value="{{$societes->raisonSociale}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> identifiantFiscale </label>
                            <input type="text" name="identifiantFiscale" class="form-control" id="exampleFormControlInput1"
                                value="{{$societes->identifiantFiscale}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> periode </label>
                            <input type="text" name="periode" class="form-control" id="exampleFormControlInput1"
                                value=" {{$societes->periode}}" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> ICE </label>
                            <input type="text" name="ICE" class="form-control" id="exampleFormControlInput1"
                                value="{{$societes->ICE}}" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> regime </label>
                            <input type="text" name="regime" class="form-control" id="exampleFormControlInput1"
                                value=" {{$societes->regime}}" required>
                        </div>
                    </div>
                <div class="col-6 col-lg-4 themed-grid-col">
                    <div class="container">
                        <input type="file" class="form-control mt-1" name="profile_image" id="profile_image">
                        <label for="profile_image">
                            <img src="{{ asset('images/' . $societes->profile_image)}}" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                                <i class="fa text fa-folder"></i>
                            </div>
                        </label>
                      </div>
                </div>

            </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-outline-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
