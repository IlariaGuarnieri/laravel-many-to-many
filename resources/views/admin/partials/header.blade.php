{{-- NAVBAR LOGGATI --}}

<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('admin.home')}}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger ">LOGOUT</button>
                  </form>
                </ul>
              </li>

            </ul>

          </div>
        </div>
      </nav>
</header>
