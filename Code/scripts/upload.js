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

    var input0 = document.getElementById("input0");
    var input1 = document.getElementById("input1");

    input0.value = document.getElementById("prev0").toDataURL().replace(/^data:image\/(png|jpg);base64,/, "");
    input1.value = document.getElementById("prev1").toDataURL().replace(/^data:image\/(png|jpg);base64,/, "");

    document.getElementById("prev_zone").style.height = '500px';
}