const url = "https://localhost/l2_Aklas/api";


const VueChat = new Vue({
    el: "#Chat",
    data: {
        friends: [],
        prueba: "Juan Encabo"
    }
})



const VueChars = new Vue({
    el: "#MisPersonajes",
    data: {
        chars: [],
        exp: 0,
        status: 0,
        clase: [],
        clan: [],
        show: 0,
        horas: "",
        inv: [],
        statsItem: [],
    },


});

let btnShowPj = document.getElementById("btn-show-pj");
btnShowPj.addEventListener("click", showPj);
async function showPj() {
    let itemsDataPopover = [];
    let tiempoOnline = 0;
    let selectorPj = document.getElementById("selectorPj").value;
    let res = await fetch(url + "/getpj/" + selectorPj);
    let response = await res.json();
    //let expPJ = ((response.exp) * 100);
    // let resultadoEXP = expPJ / tablaexp2[response.level];
    //let redondeadoEXP = round(resultadoEXP);
    VueChars.show = 1;
    tiempoOnline = response.onlinetime; //segundos
    VueChars.horas = secondsToString(tiempoOnline);
    VueChars.chars = response;
    VueChars.status = response.online;
    //Clase base
    getBaseClass(response.base_class).then(e => {
        VueChars.clase = e;
    });
    //Inventario
    getInv(response.obj_Id).then(e => {

        //Falta terminar, este codigo es para crear un arreglo auxiliar con los datos de todos los item del inventario
        //
        for (let i = 0; i < e.length; i++) {
            let item;
            if (e[i].p_def != null) {
                item = {
                    "name": e.name,
                    "atack": e.p_dam,
                    "def": e.p_def
                };
                itemsDataPopover.push(item);

            } else if (e[i].p_dam) {
                item = {
                    "name": e.name,
                    "atack": e.p_dam,
                    "def": e.p_def
                };
                itemsDataPopover.push(item);
            } else {
                item = {
                    "name": 0,
                    "atack": 0,
                    "def": 0
                };
                itemsDataPopover.push(item);


            }

            console.log(e[i].p_def);
        }
        VueChars.inv = e;
        console.log("Tamanio auxiliar: " + itemsDataPopover.length);
        console.log("Tamanio original: " + e.length);
        VueChars.statsItem = itemsDataPopover;
    });
    //Clan
    if (response.clanid != 0) {
        getClan(response.clanid).then(e => {
            VueChars.clan = e;
        });
    }
}
async function getInv(idChar) {
    let res = await fetch(url + "/inv/" + idChar);
    let response = await res.json();
    return response;
}

function secondsToString(seconds) {
    var hour = Math.floor(seconds / 3600);
    hour = (hour < 10) ? '0' + hour : hour;
    var minute = Math.floor((seconds / 60) % 60);
    minute = (minute < 10) ? '0' + minute : minute;
    var second = seconds % 60;
    second = (second < 10) ? '0' + second : second;
    return hour + ':' + minute + ':' + second;
}
async function getClan(idClan) {
    let res = await fetch(url + "/clan/" + idClan);
    let response = await res.json();
    return response;
}
async function getBaseClass(idClase) {

    let res = await fetch(url + "/getBaseClass/" + idClase);
    let response = await res.json();
    return response;
}

function round(num) {
    var m = Number((Math.abs(num) * 100).toPrecision(15));
    return Math.round(m) / 100 * Math.sign(num);
}