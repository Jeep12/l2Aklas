{include file="templates/header.tpl " }

<div class="panelAdmin">
    <div class="row">
        <div class="col-sm-6 noticias">
        <br>
            <h1>Agregar noticia</h1>
            <br>
            <div class="noticias">

                <input type="text" id="RichText">
                <input class="file" type="file">

                <br>  <br>
                <label>Publicar como:  <select id="autor">
                {foreach from=$characters item=$character}
                    <option value="{$character->char_name}">{$character->char_name}</option>
                    {/foreach}
                </select></label>
                <br>
                <br>
                <button type="button" class="salir" id="submitNoticia" >Enviar</button>
                
            </div>
        </div>
        <div class="col-sm-6 usuarios" style="">
        <br>
            <h1>Lista de usuarios</h1>
            <br>
            <input type="text" name="" id="">
            <button class="salir">Buscar</button>
            <div class="row">
                <div class="listUser">
                    <ul class="primerList">
                        {foreach from=$usersTotal item=$user}
                            <li>
                                <ul>
                                    <li>Cuenta: {$user->login}</li>
                                    <li>Última ip: {$user->lastIP}</li>
                                    <li>Último server: {$user->lastServer}</li>
                                    <li>Email: {$user->email}</li>
                                    <li><button class="salir">Ver más</button></li>
                                </ul>

                            </li>
                        
                    {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
                    Ultimos mensajes
    </div>

</div>

<script src="js/adminJs.js"></script>
{include file="templates/footer.tpl " }