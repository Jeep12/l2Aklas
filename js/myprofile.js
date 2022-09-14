const url = "https://192.168.1.104/l2_Aklas/api";



let btnchangePWD = document.getElementById("changePWD");
btnchangePWD.addEventListener("click", showChangePassword);

function showChangePassword() {
    let divMain = document.getElementById("containerMiPerfil");
    fetch("https://192.168.1.104/L2_Aklas/templates/cambiar.html").then(e => {
        e.text().then(response => {
            divMain.innerHTML = response;
            let passwordInput = document.getElementById('txtPassword'),
                toggle = document.getElementById('btnToggle'),
                icon = document.getElementById('eyeIcon');



            function togglePassword() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.add("fa-eye-slash");
                    //toggle.innerHTML = 'hide';
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove("fa-eye-slash");
                    //toggle.innerHTML = 'show';
                }
            }
        })
    })
}

const VueChars = new Vue({
    el: "#personaje",
    data: {
        stats: [],
        inv: [],
        horas: 0,
    },


});


function muestraReloj(hora, minuto, segundo) {
    var horas = hora;
    var minutos = minuto;
    var segundos = segundo;
    if (horas < 10) { horas = '0' + horas; }
    if (minutos < 10) { minutos = '0' + minutos; }
    if (segundos < 10) { segundos = '0' + segundos; }

    document.getElementById("reloj").innerHTML = horas + ':' + minutos + ':' + segundos;


}





let pjs = document.getElementsByName("showPj");
for (let i = 0; i < pjs.length; i++) {
    pjs[i].addEventListener("click", async function() {
        let pj = pjs[i].getAttribute("data-pj");

        let res = await fetch(url + "/getpj/" + pj);
        let response = await res.json();
        let tiempoJugador = secondsToString(response.onlinetime);
        let horasSplit = tiempoJugador.split(":");
        let jsonTiempoOnline = {
            "hora": horasSplit[0],
            "minuto": horasSplit[1],
            "segundo": horasSplit[2]
        }
        VueChars.horas = jsonTiempoOnline;
        VueChars.stats = response;

        getInv(response.obj_Id).then(e => {
            VueChars.inv = filterInv(e);
            console.log(filterInv(e));
            document.getElementById("btn-warehouse").addEventListener("click", function() {
                VueChars.inv = filterWare(e);

            });
            document.getElementById("btn-inventory").addEventListener("click", function() {
                VueChars.inv = filterInv(e);

            });
        });

    });

};


async function getInv(idChar) {
    let res = await fetch(url + "/inv/" + idChar);
    let response = await res.json();

    return response;
}

function filterWare(inventario) {
    let aux = [];
    for (let i = 0; i < inventario.length; i++) {
        if (inventario[i].loc == "WAREHOUSE") {
            aux.push(inventario[i]);
        }
    }
    return aux;
}

function filterInv(inventario) {
    let aux = [];
    for (let i = 0; i < inventario.length; i++) {
        if (inventario[i].loc == "PAPERDOLL" || inventario[i].loc == "INVENTORY") {
            aux.push(inventario[i]);
        }
    }
    return aux;
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








//----- CHAT ------------------------------------------ CHAT ------------------
//------------------ CHAT -----------------------------------------------------
//-------------------------- CHAT  -------------------------- CHAT-------------
//-----------------------------------------------------------------------------

const VueChat = new Vue({
    el: "#Chat",
    data: {
        friendOnline: [],
        friendOffline: [],
        onlineTotal: 0,
        offlineTotal: 0,

    },
});

inicChat();

async function inicChat() {
    let auxOnlines = [];
    let auxOfflines = [];
    let totalOnlines = 0;
    let totalOffline = 0;

    let res = await fetch(url + "/getFriends");
    let response = await res.json();

    let friendsChat = convertArray(response);
    for (let i = 0; i < friendsChat.length; i++) {
        if (friendsChat[i].status == 1) {
            auxOnlines.push(friendsChat[i]);
            totalOnlines++;
        } else {
            auxOfflines.push(friendsChat[i]);
            totalOffline++;
        }
    }
    VueChat.onlineTotal = totalOnlines;
    VueChat.offlineTotal = totalOffline;
    VueChat.friendOnline = auxOnlines;
    VueChat.friendOffline = auxOfflines;
}

function convertArray(response) {
    let aux = [];

    // Vamos iterando por las personas
    let primero = "";
    for (let i = 0; i < response.length; i++) {
        for (let j = 0; j < response[i].length; j++) {
            let friends = {
                "status": response[i][j].online,
                "name": response[i][j].friend_name,
                "sexo": response[i][j].sex,
                "clase": response[i][j].class_name,
                "title": response[i][j].title
            }
            if (friends.name != primero) {
                aux.push(friends);
                primero = friends.name;
            }



        }
    }


    return aux;
}