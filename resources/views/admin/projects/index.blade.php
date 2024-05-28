@extends('layouts.admin')
@section('content')

  <h2>Progetti</h2>

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
  @endif

  {{-- messaggio errore se gia c'è --}}
  @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
  @endif
  {{-- messaggio di successo --}}
  @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  {{-- route corretta {{route('admin.Project.store')}} --}}
  <div class="my-4">
    <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex">
      @csrf
      <input class="form-control me-2" name="title" type="input" placeholder="Nuovo progetto" aria-label="Search">

        {{-- associazione tecnologie in zona di aggiunta project--}}
      <label for="type" class="form-label">Tecnologia: </label>
      <div class="btn-group btn-group-sm" role="group">
        @foreach ($technologies as $technology)
          <input
          name="technologies[]"
          id="technology_{{$technology->id}}"
          class="btn-check"
          autocomplete="off"
          type="checkbox"
          value="{{$technology->id}}"
          >

          <label class="btn btn-outline-primary" for="technology_{{$technology->id}}">{{ $technology->title }}</label>
        @endforeach
      </div>

      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Invia</button>
    </form>
  </div>

  <table class="table crud-table">
    <thead>
      <tr>
        <th scope="col">ID PROGETTO</th>
        <th scope="col">NOME PROGETTO</th>
        <th scope="col">TYPE</th>
        <th scope="col">TECNOLOGIA</th>
        <th scope="col">AZIONE</th>
      </tr>
    </thead>
    <tbody>
      {{-- @foreach ($projects as $category) --}}

      @foreach ($projects as $project)
        <tr>
          <td>
            <input type="text" value="{{ $project->id }}">
          </td>

          <td>
            <input type="text" value="{{ $project->title }}">
          </td>

          <td>
            {{-- {{$project->type}} --}}
          </td>
          <td>

            @forelse ($project->technologies as $technology)
              <span class="badge bg-info text-white">{{$technology->title}}</span>
            @empty
              -no technology-
            @endforelse
          </td>

          {{-- BOTTONE --}}
          <td class="d-flex ">
            {{-- BOTTONE SHOW --}}
            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-success me-3">
              <i class="fa-solid fa-eye"></i>
            </a>
            {{-- BOTTONE EDIT --}}
            <button class="btn btn-warning" onclick="submitForm({{ $project->id }})">
              <i class="fa-solid fa-pen"></i>
            </button>

            {{-- BOTTONE DI DELETE --}}
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
              onsubmit="return confirm('Sei sicuro di voler eliminare il progetto?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>

          </td>

        </tr>
      @endforeach
    </tbody>
  </table>

  <script>
    function submitForm(id) {
      // console.log(id);
      const form = document.getElementById(`form-editid-${id}`);
      form.submit();
    }
  </script>

@endsection
