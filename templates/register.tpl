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
    <div class="register">
        <h1>Lineage 2 Aklas</h1>
        <a href="home" style="font-size: 35px;color:white;"><i class="fa-solid fa-arrow-left"></i></a>
        
        <a href="showlogin"style="font-size: 35px;color:white;float:right;"><i class="fa-solid fa-arrow-right"></i></a>
        <h5>Crear cuenta</h5>
        {if $error eq e2}
        <p class="error" style="color:wheat;">Ya existe esta cuenta</p>
        {/if} {if $error eq e1}
        <p class="error" style="color:wheat;">No paso el captcha</p>
        {/if} {if $error eq e1}
        <p class="error" style="color:wheat;">No paso el captcha</p>
        {/if} {if $error eq e4}
        <p class="error" style="color:wheat;">Cuenta creada con exito</p>
        {/if}


        <form action="register" method="POST">
            <input class="input" type="text" name="account" placeholder="Username" required>
            <hr>
            <input class="input" type="email" name="email" placeholder="Email" required>

            <hr>
            <input class="input" type="password" name="password" placeholder="Password" required>
            <hr>
            <input class="input" type="password" name="confirm" placeholder="Confirm Passowrd" required>
            <hr>
            <input type="checkbox"><span style="color:white;">Estoy de acuerdo con los <a href="#" >terminos y condiciones</a></span>
            <p></p>
            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LehXMAgAAAAADpiddEMRBXTTt0nBfALOmFXLbZ3">

                </div>
            </div>

            <button type="submit" class="submit btn btn-primary">Crear cuenta</button>
        </form>

    </div>


    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/709d08b542.js" crossorigin="anonymous"></script>

</body>

</html>