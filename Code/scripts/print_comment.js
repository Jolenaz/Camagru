function print_comment(photoId) {
    var data = {
        'id': photoId
    }
    request("http://localhost:8080/Camagru/server/get_comment.php", data, "POST", append_comment);
}

function append_comment(data) {
    console.log(data);
    var comments = JSON.parse(data);

    var forum = document.getElementById('my_pict_comment_' + comments.photoId);
    forum.innerHTML = "";

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