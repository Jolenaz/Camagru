function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var can = document.getElementById("board");
    var ctx = can.getContext("2d");
    ev.target.appendChild(document.getElementById(data));
    var elm = document.getElementById(data);

    ctx.drawImage(elm, 10, 10);

    // var data = ev.dataTransfer.getData("text");
    // ev.target.appendChild(document.getElementById(data));
    // var elm = document.getElementById(data);
    // elm.style.left = ev.offsetX + "px";
    // elm.style.top = ev.offsetY + "px";
    // elm.style.position = "relative";
}