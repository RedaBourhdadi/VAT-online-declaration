@extends('layouts.app')
@section('content')


<style>
input {
    background-color: white !important;
}
</style>

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom ">
            <h2>Show Societe</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('EditSociete',$societes->id) }}" method="GET">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 col-lg-8 themed-grid-col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Raison Sociale </label>
                            <input type="text" name="raisonSociale" class="form-control asd"
                                id="exampleFormControlInput1" value="{{$societes->raisonSociale}}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> identifiantFiscale </label>
                            <input type="text" name="identifiantFiscale" class="form-control"
                                id="exampleFormControlInput1" value="{{$societes->identifiantFiscale}}" required
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> periode </label>
                            <input type="text" name="periode" class="form-control" id="exampleFormControlInput1"
                                value=" {{$societes->periode}}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> ICE </label>
                            <input type="text" name="ICE" class="form-control" id="exampleFormControlInput1"
                                value="{{$societes->ICE}}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> regime </label>
                            <input type="text" name="regime" class="form-control" id="exampleFormControlInput1"
                                value=" {{$societes->regime}}" required disabled>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 themed-grid-col">
                        <div class="form-group text-center">
                            <img src="{{ asset('images/' . $societes->profile_image)}}" height="200px" class="imgg"
                                alt=""><br>
                            <a href="{{ route('afficherArchivages',['id'=>$societes->identifiantFiscale]) }}"
                                class="btn btn-outline-primary my-3 px-4"><b> Archives </b></a> <br>

                            <a href="{{ route('importExcel'),$societes->identifiantFiscale }}"
                                class="btn btn-outline-secondary mb-3 px-2"><b>Import Excel</b></a> <br>
                            <a href="{{ route('exportXml'),$societes->identifiantFiscale }}"
                                class="btn btn-outline-success   mb-3"><b>Export XML</b></a> <br>
                        </div>
                    </div>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top ">
                    <button type="submit" class="btn btn-outline-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    @endsection