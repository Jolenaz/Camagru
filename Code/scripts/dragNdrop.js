function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev, file_id) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var elm = document.getElementById(data);
    elm.style.left = ev.offsetX + "px";
    elm.style.top = ev.offsetY + "px";
    elm.style.position = "relative";
}