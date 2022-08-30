<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginregister.css">
    <title>Login Aklas</title>
</head>

<body>

    <video autoplay muted loop id="background">
        <source src="images/bg-2.mp4" type="video/mp4">
    </video>
    <div class="login">
        <h1>Lineage 2 Aklas</h1>
        <a href="home" style="font-size: 35px;color:white;"><i class="fa-solid fa-arrow-left"></i></a>
       
        <h5>Iniciar sesion</h5>
        {if $error eq true}
        <p class="error" style="color:wheat;">El usuario no existe o la constraseña no coincide</p>
        {/if}
        <form action="login" method="POST">
            <input type="text" name="username" placeholder="Username">
            <hr>
            <input type="password" name="password" placeholder="Password">
            <hr>
            <a href="#" style="text-decoration: none;color: white;">Recuperar contraseña</a>
            <button type="submit" class="submit btn btn-primary">Iniciar</button>
        </form>

    </div>


    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>
    <script src="https://kit.fontawesome.com/709d08b542.js" crossorigin="anonymous"></script>

</body>

</html>