{{-- PARTE CHE SI VEDE AL CLICK DI Tecnologie ZONA DI CREATE --}}
@extends('layouts.admin')
@section('content')
  <div class="container">
    <form action="{{ route('admin.technologies.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="title" class="form-label">Nome Tecnologia (*)</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
              value="{{ old('title') }}">
            @error('title')
              <small class="text-danger">
                {{ $message }}
              </small>
            @enderror
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Aggiungi</button>
      <button type="reset" class="btn btn-warning">Svuota</button>
    </form>
  </div>
@endsection
