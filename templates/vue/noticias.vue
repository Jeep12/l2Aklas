{literal}
<div class="noticias" id="noticias">
    <div class="item" v-for="New in news">

        <div class="encabezado">
            {{New.autor}}
            <hr>
        </div>
        {{New.mensaje}}


    </div>


</div>
{/literal}