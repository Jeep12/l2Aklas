const url = "https://192.168.1.104/L2_Aklas/api/";
$(function() {
    $('[data-toggle="popover"]').popover()
})


$(window).on('load', function() {
    setTimeout(removeLoader, 1000); //LLama al metodo removeLoader cuando la ventana esta cargada y pasa de segundo
});

function removeLoader() {
    $("#preload").fadeOut(500, function() {
        // fadeOut complete. Remove the loading div
        $("#preload").remove(); //Remueve los stylos del div preload
    });
}

getNews();

function getNews() {
    let aux = [];
    let div = document.getElementById("divNoticias");

    fetch(url + "getAllNoticias").then(respuesta => {
        if (respuesta.ok) {
            respuesta.json().then(noticias => {
                for (let i = 0; i < noticias.length; i++) {
                    div.innerHTML += "<div class='containerNoticia'>" +
                        "<span class='autor'>Publicado por:" + noticias[i].autor + "</span>" +
                        "<span class='fecha'>" + noticias[i].fecha + "</span>" +
                        "<hr>" +
                        "<span class='mensaje'>" +
                        noticias[i].mensaje +
                        "</spawn> </div>";

                }

            })
        }
    }).catch(error => {
        console.log(error);

    });
    console.log(aux[0]);

}

async function token() {
    let res = await fetch(url + "/getToken/", {
        'method': 'GET',
        'headers': {

            'Content-Type': 'application/json'
        }
    });
    let response = await res.json();
    return response;

}
async function practica(token) {
    fetch("https://localhost/l2_Aklas/api/pruebaApiToken/" + token).then(respuesta => {
        respuesta.json().then(e => {})
    }).catch(error => {});
}