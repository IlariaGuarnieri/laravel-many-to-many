@php
  use App\functions\Helper as Help;
@endphp

@extends('layouts.admin')
@section('content')
  <h1>nuovo progetto</h1>
  <form
  class="w-100"
  action="{{ route('admin.Project.store') }}"
  method="POST"
  enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label for="title" class="form-label">titolo(*)</label>
    <input
    id="title"
    type="text"
    class="form-control" @error('title') is-invalid @enderror
    placeholder="inserisci titolo"
    name="title">
  </div>

  <div class="mb-3">
    <button class="btn btn-success" type="submit">invia</button>
    <button class="btn btn-warning" type="reset">reset</button>
  </div>

</form>

@endsection
