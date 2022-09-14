{include file="templates/header.tpl" }
<div class="myprofile">

    <div class="row">
        <div class="col-sm-8">
            <nav class="nav nav-pills nav-justified menuMiPerfil">
                <a class="nav-item nav-link" href="myprofile">Mis Personajes</a>
                <a class="nav-item nav-link" href="#" >Votar</a>
                <a class="nav-item nav-link" href="#" id="changePWD">Cambiar Contraseña</a>
                <a class="nav-item nav-link " href="#">Mis datos</a>

            </nav>
   

            <hr>
            <div id="containerMiPerfil">
                <div class="selectChar">

                    {foreach from=$characters item=$character}
                    <div type="button" class="character" name="showPj" data-pj="{$character->char_name}">{$character->char_name}</div>
                    {/foreach}
                </div>
                <div class="pj">
                    {include file="templates/vue/mychars2.vue"}
                </div>



            </div>
        </div>
        <div class=" col-sm-4 boxChat" id="chatBox" >
        {include file="templates/vue/chatbox.vue"}

        
    </div>



</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="js/myprofile.js"></script>
{include file="templates/footer.tpl " }