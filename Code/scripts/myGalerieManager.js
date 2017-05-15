function bold_photo(photoId) {
    var all = document.getElementsByClassName('ma_galery_image');
    for (var i = 0; i < 3; ++i) {
        if (all[i] == null)
            break;
        all[i].style.border = "";
    }
    var pic = document.getElementById(photoId);
    pic.style.border = "solid red 3px";
}

function add_comment_field(photoId) {
    var forum = document.getElementById("photo" + photoId);
    var test = document.getElementById("Comment_field")
    if (test != null) {
        test.parentNode.removeChild(test);
    }

    var com = document.createElement('div');
    com.id = "Comment_field";

    var com_sub = document.createElement('button');

    var com_text = document.createElement('input');
    com_text.type = "text";
    com_text.id = "com_text";

    com_sub.onclick = function() { add_comment(photoId) };
    com_sub.appendChild(document.createTextNode("Comment"));

    com.appendChild(com_text);
    com.appendChild(com_sub);

    forum.appendChild(com);
}

function add_comment(photoId) {
    com_text = document.getElementById("com_text");

    if (com_text.value != '') {
        var data = {
            'id': photoId,
            'text': com_text.value
        }
        if (confirm("Do you Valid your comment?")) {
            request("http://localhost:8080/Camagru/server/add_comment.php", data, "POST", restart_page);
        }
    }
    console.log(com_text.value);
    var data = {
        'id': photoId
    }

}

function sup_image(photoId) {
    var data = {
        'id': photoId
    }
    if (confirm("Etes vous certain ?"))
        request("http://localhost:8080/Camagru/server/del_pict.php", data, "POST", restart_page);
}

function restart_page(data) {
    location.reload();
}

function add_sup_button(photoId) {
    var forum = document.getElementById("photo" + photoId);
    var test = document.getElementById("sup_button")
    if (test != null) {
        test.parentNode.removeChild(test);
    }

    var del = document.createElement('button');
    del.id = "sup_button";
    del.onclick = function() { sup_image(photoId) };
    del.appendChild(document.createTextNode("Supprimer"));

    forum.appendChild(del);

}

function delete_pict(photoId) {
    bold_photo("photo" + photoId);
    add_comment_field(photoId);
    add_sup_button(photoId)
}

function print_comment(photoId) {
    var data = {
        'id': photoId
    }
    request("http://localhost:8080/Camagru/server/get_comment.php", data, "POST", append_comment);
}

function append_comment(data) {
    var comments = JSON.parse(data);

    var forum = document.getElementById('my_pict_comment_' + comments.photoId);

    for (var i in comments.data) {
        var comment = comments.data[i];
        var com = document.createElement('div');
        com.className = "comment";

        var auteur = document.createElement('div');
        auteur.className = "comment_writer";
        auteur.appendChild(document.createTextNode(comment.userName));

        var text = document.createElement('div');
        text.className = "comment_text";
        text.appendChild(document.createTextNode(comment.comment));

        com.appendChild(auteur);
        com.appendChild(text);

        forum.appendChild(com);

    }

}