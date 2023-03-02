<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>libreria</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href=".\..\css\app.css">
    </head>
    <body>
        <nav id="menuBar" class="navbar navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#Libreria">Libreria</a>
                <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-center">
                    <ul id="Libreria" class="navbar-nav d-flex mb-3 container-fluid align-items-center">
                        <li id="navItem01" class="nav-item p-2"><button id="navContent01" class="nav-link bg-purple bg-gradient" action="{{route('opt1')  }}">opt-1</button></li>
                        <li id="navItem02" class="nav-item p-2"><button id="navContent02" class="nav-link bg-purple bg-gradient">opt-2</button></li>
                        <li id="navItem01" class="nav-item p-2 ms-auto">
                            <input id="navContent01" class="nav-link" type="search">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('menuBar')
    </body>
</html>
