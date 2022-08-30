const url = "http://localhost/L2_Aklas/api/";
let btnEnviar = document.getElementById("submitNoticia");
btnEnviar.addEventListener("click", agregarNoticia);
console.log(url + "getpjs/jeep2020");

async function agregarNoticia(e) {
    e.preventDefault();
    let today = new Date();
    let day = today.getDate();
    let month = today.getMonth() + 1;
    let yer = today.getFullYear();
    today = day + '/' + month + '/' + yer;

    let mensaje = document.getElementById('RichText').value;
    let autor = document.getElementById("autor").value;
    let fecha = today;
    let noticia = {
        "autor": autor,
        "fecha": fecha,
        "mensaje": mensaje
    };

    try {
        let res = await fetch(url + "addNoticia", {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(noticia)
        });
        if (res.ok) {
            console.log("posteado");
        }
    } catch (error) {
        console.log(error);
    }
}