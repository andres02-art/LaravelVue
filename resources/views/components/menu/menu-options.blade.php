<li id="n1" class="nav-item dropdown">
    <a
        id="navbarDropdown options"
        class="nav-link dropdown-toggle"
        href="#navbarOptions"
        role="button"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
        >
        Tools
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('user.show', ['User'=>$hasLogin]) }}">Usuarios</a>
        <a class="dropdown-item" href="{{ route('book.show', ['User'=>$hasLogin]) }}">Libros</a>
        <a class="dropdown-item" href="{{ route('lend.show', ['User'=>$hasLogin]) }}">Prestamos</a>
    </div>
</li>
