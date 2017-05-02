function bold_photo(photoId) {
    var all = document.getElementsByClassName('galery_image');
    for (var i = 0; i < 3; ++i) {
        if (all[i] == null)
            break;
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

function print_comment(photoId) {
    console.log("lalala");
}

function append_comment(data) {
    var comments = JSON.parse(data);

    var forum = document.getElementById('selected_pict');
    forum.innerHTML = "";

    for (var i in comments) {
        var comment = comments[i];
        var com = document.createElement('div');
        com.className = "comment";

        var auteur = document.createElement('div');
        auteur.className = "comment_writer";
        auteur.appendChild(document.createTextNode(comment.userId));

        var text = document.createElement('div');
        text.className = "comment_text";
        text.appendChild(document.createTextNode(comment.comment));

        com.appendChild(auteur);
        com.appendChild(text);

        forum.appendChild(com);

    }

}