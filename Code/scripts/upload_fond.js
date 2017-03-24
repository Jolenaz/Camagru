function upload_fond() {

    if (document.getElementById("url_fond"))
        return;

    var url_fond = document.createElement('input');
    url_fond.id = "url_fond";

    var but = document.createElement('button');
    but.onclick = function() { get_fond(url_fond.value) };
    but.appendChild(document.createTextNode("OK"));

    var up_div = document.getElementById('uploader');
    up_div.appendChild(document.createTextNode("Entrer l'url de l'image au format png ou jpeg:"));
    up_div.appendChild(url_fond);
    up_div.appendChild(but);

}

function get_fond(url_fond) {
    var video = document.getElementById('fond');

    var fond = new Image();
    fond.src = url_fond;
    fond.id = "image_fond";
    video.appendChild(fond);

}