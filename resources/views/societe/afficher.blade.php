@extends('layouts.app')
@section('content')
<form action="{{ route('createSociete') }}" method="POST">
    @csrf
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Societes</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('createSociete') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>
<table id="cartGrid" class="table table-striped table-bordered "  cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="width:75%">Raison Sociale</th>
        <th scope="col"style="width:15%">Action</th>
      </tr>
    </thead>
    <tbody>
    @php($i = 1)
    @foreach($societes as $societe)
      <tr>
        <th scope="row" >{{ $i }}</th>
        <td> <b>{{ $societe->raisonSociale }}</b></td>
        <td>
            <a href="{{ route('ShowSociete', $societe->id) }}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
            <a href="{{ route('EditSociete', $societe->id) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
            <a href="{{ route('DeleteSociete', $societe->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
      </tr>
      @php($i++)
      @endforeach
    </tbody>
  </table>
</form>
@endsection


