function take_picture() {
    var can1 = document.getElementById("canvas");
    var s1 = 640;
    var s2 = 480;
    if (!document.getElementById('image_fond'))
        var vid = document.getElementById("videoScreen");
    else {
        var vid = document.getElementById('image_fond');
        s1 = vid.style.width.replace("px", "");
        s2 = vid.style.height.replace("px", "");
    }

    var data_img1 = can1.toDataURL();
    var img1 = new Image();
    img1.src = data_img1;

    var ctx0 = document.getElementById("prev0").getContext("2d");
    ctx0.drawImage(vid, 0, 0, s1, s2);

    var ctx1 = document.getElementById("prev1").getContext("2d");
    ctx1.drawImage(img1, 0, 0);

    if (!document.getElementById('send_photo')) {
        var but = document.createElement('button');
        but.id = 'send_photo';
        but.appendChild(document.createTextNode('Sauvegarder la photo'));
        but.onclick = function() { send() };
        document.getElementById("footer").appendChild(but);

        var name = document.createElement('input');
        name.type = 'text';
        name.placeholder = 'nom de la photo';

        but.onclick = function() {
            if (!name.value) {
                alert('la photo a besoin d\'un nom');
            } else { send(name.value) }
        };

        var foo = document.getElementById("footer");
        foo.appendChild(but);
        foo.appendChild(name);
    }

    document.getElementById("prev_zone").style.height = '500px';
}


function send(name) {
    var cl0 = encodeURIComponent(document.getElementById("prev0").toDataURL().replace(/^data:image\/(png|jpg);base64,/, ""));
    var cl1 = encodeURIComponent(document.getElementById("prev1").toDataURL().replace(/^data:image\/(png|jpg);base64,/, ""));
    var data = {
        'im0': cl0,
        'im1': cl1,
        'name': name
    };
    request("http://localhost:8080/Camagru/server/save_image.php", data, "POST", read_resp);
}

function read_resp(data) {
    console.log(data);
}