<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/709d08b542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/richtext.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

    <title>L2 Aklas</title>

</head>

<body>
 

    <video autoplay muted loop id="background">
<source src="images/bg-2.mp4" type="video/mp4">
</video>
    <div class="menu  ">
        <div class="row social">
            <div class="col-sm-7">
                <h1 class="glitch" data-text="Lineage II Aklas">

                </h1>
            </div>
            <div class="col-sm-5">
                <table>
                    <tr>

                        <td><i style="color:white;" class="fa-brands fa-facebook"></i></td>
                        <td><i style="color:white;" class="fa-brands fa-instagram"></i></td>
                        <td><i style="color:white;" class="fa-brands fa-youtube"></i></td>
                        <td><i style="color:white;" class="fa-brands fa-discord"></i></td>
                        {if $session eq true}
                        <td><a class="salir" href="logout">Salir</a></td>
                        {else}
                        <td> <a href="showlogin">Login</a></td>
                        <td><a class="singup" href="showregister">Sing up</a></td>
                        {/if}

                    </tr>
                </table>



            </div>
        </div>

        <nav class="navbar navbar-expand-lg navegacion  navbar-sticky navbar-autohide">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-circle-chevron-down" style="color:white;font-size:25px;"></i>
                {if $session eq true}
                    <span style="color:white;font-family:LineageII;font-size:15px;">Bienvenido, {$user}</span>
                {/if}
              </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="downloads">Descargas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Comunidad</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Informacion
                    </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Top Pvp</a></li>
                                <li><a class="dropdown-item" href="#">Top Pk</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="#">Estadisticas</a></li>
                            </ul>
                        </li>
                        {if $session eq true}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Mi Cuenta
                    </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="myprofile">Mi perfil</a></li>

                                <hr>
                                <li><a class="dropdown-item" href="#">Aklas shop</a></li>
                                {if $admin eq 1}
                                <hr>
                                <li><a class="dropdown-item" href="panelAdmin">Panel de control</a></li>

                                {/if}

                            </ul>
                        </li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>