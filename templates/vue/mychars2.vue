{literal}
<div id="personaje" class="row">
    <div class="col-sm-6 ">
        <hr>
        <div class="botoneraInventario">
            <div>
                <button id="btn-inventory"><i class="fa-regular fa-folder-open"></i></button>
            </div>
            <div>
                <button id="btn-warehouse"><i class="fa-solid fa-warehouse"></i></button>
            </div>
            <div>
                <a tabindex="0" class="btnPopover" role="button" data-toggle="popover" data-trigger="focus" title="Para actualizar el inventario vuelve a elegir un personaje"><i class="fa-solid fa-circle-info"></i></a>

            </div>
        </div>
        <div class="inventario">

            <div class="item" v-for="item in inv">
                <img v-if="item.weight != 30" type="button" class="iconItem" :src="'images/assets/icons/'+ item.item_id + '.png'"> </img>
                <img v-if="item.weight == 30" :src="'images/assets/icons/recipe'+item.grade  + '.png'"></img>

                <div class="popover__wrapper large">
                    <div class="push popover__content">
                        <div>info</div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:left">adena</div>
    </div>
    <div class="col-sm-6 estadisticasJugador">

        <h1>-{{stats.char_name }} <span class="lv">Lv <span class="lvl">{{stats.level}}</span></span>
        </h1>
        <ul class="status">
            <li v-if="stats.online == 1"><i class="fa-solid fa-globe online"></i> Online
            </li>
            <li v-else><i class="fa-solid fa-globe offline"></i> Offline</li>
        </ul>


        <br> Tiempo En Linea:
        <div class="tiempoOnline" type="button">
            <div>{{horas.hora}} H</div>
            <div>{{horas.segundo}} M</div>
            <div>{{horas.minuto}} S</div>

        </div>
        <div class="pvpPk">
            <table>
                <tr>
                    <td>Karma:</td>
                    <td style="color:white;">{{stats.karma}}</td>
                    <td>PvP/Pk:</td>
                    <td style="color:white;">{{stats.pvpkills}} / {{stats.pkkills}}</td>

                </tr>
                <tr>
                    <td>Eval. Score:</td>
                    <td style="color:white;">{{stats.rec_have}}</td>
                    <td>Rec remaining: </td>
                    <td style="color:white;">{{stats.rec_left}}</td>

                </tr>

            </table>
        </div>
    </div>

</div>
<style>
    .pvpPk {}
    
    .tiempoOnline {
        margin: auto;
        display: flex;
        flex-direction: row;
        width: 140px;
        padding: 5px;
    }
    
    .tiempoOnline div {
        margin-left: 5px;
        width: 40px;
        border: 2px groove rgb(29, 29, 29);
        border-radius: 5px;
        background-color: black;
    }
    
    .lv {
        font-size: 20px;
    }
    
    .lvl {
        font-size: 35px;
    }
    
    .horas {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>
{/literal}