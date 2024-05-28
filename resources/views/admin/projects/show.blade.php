@extends('layouts.admin')
@section('content')
  <h2>{{ $project->title }}</h2>

  {{-- card --}}
  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Nome progetto: {{ $project->title }}</h5>
      <p class="card-text">Id progetto: {{ $project->id }}</p>

      {{-- BOTTONI --}}
      <div class="d-flex">
        {{-- EDIT --}}
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-3">
          <i class="fa-solid fa-pencil"></i>
        </a>

        {{-- DELETE --}}
        <form action="{{ route('admin.projects.update', $project) }}" method="POST"
          onsubmit="return confirm('Sei sicuro di voler eliminare la tecnology?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger ">
            <i class="fa-solid fa-trash-can"></i>
          </button>
        </form>
      </div>

    </div>
  </div>
@endsection
