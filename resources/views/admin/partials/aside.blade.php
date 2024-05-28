<aside class="bg-dark navbar-dark text-white">
    <nav>
        <ul>
            <li>
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-list"></i>
                    Progetti
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-list"></i>
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
        </ul>
    </nav>
</aside>
