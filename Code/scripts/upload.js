function upload() {
    var can1 = document.getElementById("canvas");
    var vid = document.getElementById("videoScreen");

    var data_img1 = can1.toDataURL();
    var img1 = new Image();
    img1.src = data_img1;

    var ctx0 = document.getElementById("prev0").getContext("2d");
    ctx0.drawImage(vid, 0, 0);


    var ctx1 = document.getElementById("prev1").getContext("2d");
    ctx1.drawImage(img1, 0, 0);

    var but = document.createElement('button');
    but.appendChild(document.createTextNode('Envoyer la photo'));
    but.onclick = function() { send() };


    document.getElementById("prev_zone").style.height = '500px';
    document.getElementById("footer").appendChild(but);
}


function send() {
    var data = {
        'im0': document.getElementById("prev0").toDataURL().replace(/^data:image\/(png|jpg);base64,/, ""),
        'im1': document.getElementById("prev1").toDataURL().replace(/^data:image\/(png|jpg);base64,/, "")
    };
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            read_response(xhr.responseText);
        }
    };
    xhr.open("POST", "http://localhost:8080/Camagru/server/server.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("im0=" + data.im0 + "&im1=" + data.im1);
}