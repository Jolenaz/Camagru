function add_sprite(id) {
    var list = document.getElementById('current_sprites');
    var b = document.createElement("BUTTON")
    b.appendChild(document.createTextNode(id));

    list.appendChild(b);
    console.log(id);
}