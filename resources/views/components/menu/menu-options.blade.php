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
        <a class="dropdown-item" href="{{ route('users.show', ['user'=>$hasLogin]) }}">Usuarios</a>
        <a class="dropdown-item" href="{{ route('books.show', ['user'=>$hasLogin]) }}">Libros</a>
        <a class="dropdown-item" href="#">Prestamos</a>
    </div>
</li>
