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
    var prv0 = document.getElementById("prev0");
    var prv1 = document.getElementById("prev1");
    var u0 = prv0.toDataURL();
    var u1 = prv1.toDataURL();
    var cl0 = encodeURIComponent(u0.replace(/^data:image\/(png|jpg);base64,/, ""));
    var cl1 = encodeURIComponent(u1.replace(/^data:image\/(png|jpg);base64,/, ""));
    var data = {
        'im0': cl0,
        'im1': cl1
    };
    request("http://localhost:8080/Camagru/server/save_image.php", data, "POST", read_resp);
}

function read_resp(data) {
    console.log(data);
}