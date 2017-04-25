function bold_photo(photoId) {
    var all = document.getElementsByClassName('galery_image');
    for (var i = 0; i < 3; ++i) {
        all[i].style.border = "";
    }
    var pic = document.getElementById(photoId);
    pic.style.border = "solid red 3px";
}

function select(photoId) {
    bold_photo("photo" + photoId);

    var data = {
        'id': photoId
    }
    request("http://localhost:8080/Camagru/server/get_comment.php", data, "POST", append_comment);
}

function append_comment(data) {
    console.log(data);
}