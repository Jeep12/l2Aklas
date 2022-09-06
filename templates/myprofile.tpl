{include file="templates/header.tpl" }
<div class="myprofile">

    <div class="row">
        <div class="col-sm-8">
            <nav class="nav nav-pills nav-justified menuMiPerfil">
                <a class="nav-item nav-link" href="#">Mis Personajes</a>
                <a class="nav-item nav-link" href="#">Votar</a>
                <a class="nav-item nav-link" href="#">Cambiar Contraseña</a>
                <a class="nav-item nav-link " href="#">Mis datos</a>
            </nav>

            <div class="containerMenuPerfil">
                <h1>Elige un personaje</h1>
                <div class="selectChar">
                    <select class="selectChar" id="selectorPj">
                        {foreach from=$characters item=$character}
                            <option value="{$character->char_name}">{$character->char_name}</option>
                        {/foreach}
                    </select>
                    <button id="btn-show-pj">Mostrar</button>
                </div>
                <br> {if $characters neq null} {include file="templates/vue/mychars.vue"} {else}
                <h1>Aún no tienes creado ningun personaje</h1>
                {/if}
            </div>
        </div>
        <div class=" col-sm-4 chatBox">

        <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
            {include file="templates/vue/chatbox.vue"}

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>



</div>

<script src="js/myprofile.js"></script>
{include file="templates/footer.tpl " }