@extends('layouts.app')
@section('content')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Societe</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('storeSociete') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> raisonSociale </label>
                    <input type="text" name="raisonSociale" class="form-control" id="exampleFormControlInput1"
                        placeholder="raisonSociale" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1"> identifiantFiscale </label>
                    <input type="text" name="identifiantFiscale" class="form-control" id="exampleFormControlInput1"
                        placeholder=" identifiantFiscale" required>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"> periode </label>
                    <input type="text" name="periode" class="form-control" id="exampleFormControlInput1"
                        placeholder=" periode" required>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"> ICE </label>
                    <input type="text" name="ICE" class="form-control" id="exampleFormControlInput1"
                        placeholder="ICE" required>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"> regime </label>
                    <input type="text" name="regime" class="form-control" id="exampleFormControlInput1"
                        placeholder="regime" required>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"> image </label>
                    <input type="file" name="profile_image" class="form-control" required>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
