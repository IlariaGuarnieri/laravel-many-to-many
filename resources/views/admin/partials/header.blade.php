{{-- NAVBAR LOGGATI --}}
<header>
  <nav class=" gradient-background navbar navbar-expand-lg">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
          </li>

          <div class="dropdown ">
            <a class="btn  dropdown-toggle clor" href="#" role="button" id="dropdownMenuLink"
              data-bs-toggle="dropdown" aria-expanded="false">
              Portfolio
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li>
                <a href="{{ route('admin.projects.index') }}">
                  <i class="fa-solid fa-list"></i>
                  Progetti
                </a>
              </li>
              <li>
                <a href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Nuovo progetto
                </a>
            </li>
              <li>
                <a href="{{ route('admin.technologies.index')}}">
                    <i class="fa-solid fa-sim-card"></i>
                    Tecnologie
                </a>
            </li>
              <li>
                <a href="{{route('admin.types.index')}}">
                    <i class="fa-solid fa-code"></i>
                    Tipologie
                </a>
            </li>
              <li>
                <a href="https://github.com/IlariaGuarnieri?tab=repositories">
                    <i class="fa-brands fa-github"></i>
                    Il mio github
                </a>
            </li>
            </ul>
          </div>

          <div class="dropdown ">
            <a class="btn  dropdown-toggle clor" href="#" role="button" id="dropdownMenuLink"
              data-bs-toggle="dropdown" aria-expanded="false">
              Social
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li>
                <a href="https://www.instagram.com/">
                    <i class="fa-brands fa-instagram"></i>
                    Instagram
                </a>
              </li>
              <li>
                <a href="https://www.tiktok.com/login?redirect_url=https%3A%2F%2Fwww.tiktok.com%2Fit-IT%2F&lang=en&enter_method=mandatory">
                    <i class="fa-brands fa-tiktok"></i>
                    Tiktok
                </a>
            </li>
              <li>
                <a href="#">
                    <i class="fa-brands fa-facebook"></i>
                    Facebook
                </a>
            </li>
              <li>
                <a href="#">
                    <i class="fa-brands fa-twitter"></i>
                    Twitter
                </a>
            </li>
            </ul>
          </div>

          {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.home') }}">Portfolio</a>
            </li> --}}
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 p">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="fa-solid fa-user admin_i text-light"></i>
              Ciao,
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                logout
                <button type="submit" class="btn btn-danger logout">
                  <i class="fa-solid fa-right-from-bracket"></i>
                </button>
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
