{literal}
<div class="row" id="MisPersonajes" v-if="show == 1">

    <div class="col-sm-6">
<h1>Estadisticas</h1>
<h5>
    <span>Estado: </span>
    <span v-if="status== 1" class="online"></span>
    <span v-else class="offline"></span>
</h5>

<h5>
    {{chars.char_name }} Lv{{chars.level}}
</h5>
<table class="vitalidad ">
    <tr>
        <td class="cp">MAX CP {{chars.maxCp}}</td>

    </tr>
    <tr>
        <td class="hp">MAX HP {{chars.maxHp}}</td>

    </tr>
    <tr>
        <td class="mp">MAX MP {{chars.maxMp}}</td>

    </tr>
    <tr>
        <td class="exp"> {{exp}}</td>

    </tr>
    <tr>
        <td>SP {{chars.sp}}</td>
    </tr>
</table>
<br>
<h5>Tiempo en linea</h5>
<span>{{horas}} hs</span>
<h5 v-if="chars.clanid != 0"> Clan: {{clan.clan_name}} Lv {{clan.clan_level}}
</h5>
<h5 v-else> No Clan</h5>

<table style="margin:auto;text-align: center;width: 250px;">
    <tr>
        <td>Nobless:</td>
        <td><span style="font-size: 15px;" v-if="chars.nobless== 1">Si</span>
            <span style="font-size: 15px;" v-else>No</span></h5>
        </td>
        <td>Base Class:{{clan.class_name}}</td>
        <td style="color:white;">{{clase.class_name}}</td>

    </tr>
</table>
<div class="combat">
    <h5>Combat</h5>
    <table>
        <tr>
            <td>STR.</td>
            <td style="color:white;">{{chars.str}}</td>
            <td>DEX.</td>
            <td style="color:white;">{{chars.dex}}</td>
            <td>CON</td>
            <td style="color:white;">{{chars.con}}</td>
        </tr>
        <tr>
            <td>INT.</td>
            <td style="color:white;">{{chars._int}}</td>
            <td>MEN.</td>
            <td style="color:white;">{{chars.men}}</td>
            <td>WIT</td>
            <td style="color:white;">{{chars.wit}}</td>
        </tr>
    </table>
    <br>
    <h5>Social</h5>

    <table>
        <tr>
            <td>Karma:</td>
            <td style="color:white;">{{chars.karma}}</td>
            <td>PvP/Pk:</td>
            <td style="color:white;">{{chars.pvpkills}} / {{chars.pkkills}}</td>

        </tr>
        <tr>
            <td>Eval. Score:</td>
            <td style="color:white;">{{chars.rec_have}}</td>
            <td>Rec remaining: </td>
            <td style="color:white;">{{chars.rec_left}}</td>

        </tr>

    </table>
</div>
    </div>
    <div class="col-sm-6">
    <span>
        <h1>Inventario</h1>
    <input type="text"></input><button>Buscar</button>

    </span>
    
    <div class="inventario">
        <div class="item" v-for="item in inv">
        

           <img v-if="item.weight != 30" type="button" class="iconItem" :src="'images/assets/icons/'+ item.item_id + '.png'"> </img>
           <img v-if="item.weight == 30"  :src="'images/assets/icons/recipe'+item.grade  + '.png'"></img>
           <div class="popover__wrapper large">
           
            <div class="push popover__content">
                <div><span style="font-size:15px;" v-if="item.enchant_level >0 "> +'' {{item.enchant_level}}</span>{{item.name}}</div>
                <div>{{item.item_id}}</div>
                <div></div>
                <div>
                    <span style="font-size:15px;" v-if="item.weaponType=='bow' && item.crystal_type == 's'">P.Atack: {{item.enchant_level * 20 -30 + 581}}</span>
                    <span v-else>{}</span>


                </div>
                <div>Tipo: {{item.armor_type}}</div>
                <div>Weight:{{item.weight}}</div>
                <div>SS: X{{item.soulshots}}</div>
                <div v-if="item.count > 5">Count:{{item.count}}</div>
            </div>

            </div>
        </div>
    
    </div>
       
    </div>




</div>

{/literal}