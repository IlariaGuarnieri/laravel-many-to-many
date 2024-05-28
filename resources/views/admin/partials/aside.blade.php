<aside class="bg-dark navbar-dark text-white">
    <nav>
        <ul>
            <li>
                <a href="{{ route('admin.Project.index') }}">
                    <i class="fa-solid fa-list"></i>
                    Progetti
                </a>
            </li>
            <li>
                <a href="{{ route('admin.Project.create') }}">
                    <i class="fa-solid fa-list"></i>
                    Nuovo progetto
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-sim-card"></i>
                    Tecnologie utilizzate
                </a>
            </li>
            <li>
                <a href="{{route('admin.types.index')}}">
                    <i class="fa-solid fa-code"></i>
                    Tipologie
                </a>
            </li>
        </ul>
    </nav>
</aside>
