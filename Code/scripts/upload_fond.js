function upload_fond() {

    if (document.getElementById("fondToUpload"))
        return;

    var url_fond = document.createElement('form');
    url_fond.method = "post";
    url_fond.enctype = "multipart/form-data";
    url_fond.action = "../server/upload_fond.php";

    var image_file = document.createElement('input');
    image_file.type = "file";
    image_file.id = "fondToUpload";
    image_file.name = "fondToUpload";

    var but = document.createElement('input');
    but.type = "submit";
    but.appendChild(document.createTextNode("OK"));

    url_fond.appendChild(image_file);
    url_fond.appendChild(but);

    var up_div = document.getElementById('uploader');
    up_div.appendChild(url_fond);

}