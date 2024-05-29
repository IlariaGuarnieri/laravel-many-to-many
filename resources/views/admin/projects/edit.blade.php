@extends('layouts.admin')
@section('content')
  <div class="container">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="title" class="form-label">Nome progetto (*)</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label class="form-label">Tecnologie (*)</label>
          <div class="btn-group btn-group-sm" role="group">
            @foreach ($technologies as $technology)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="technologies[]" id="technology_{{$technology->id}}" value="{{$technology->id}}" {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="technology_{{$technology->id}}">
                  {{$technology->title}}
                </label>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary">Modifica</button>
          <button type="reset" class="btn btn-warning">Svuota</button>
        </div>
      </div>
    </form>
  </div>
@endsection
