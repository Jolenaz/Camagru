var sprite_array = [];

class Sprite_icone {
    constructor(x, y, quos, ang, id) {
        this.x = x;
        this.y = y;
        this.quos = quos;
        this.ang = ang;
        this.id = id;
    }

    move(x, y) {
        this.x += x;
        this.y += y;
        refresh_sprite();
    }

    rotate(a) {
        this.ang += a;
        refresh_sprite();
    }

    resize(quos) {
        this.quos += quos;
        refresh_sprite();
    }
}

function refresh_sprite() {
    var ctx = document.getElementById("canvas").getContext("2d");
    ctx.clearRect(0, 0, 500, 500);
    for (var i = 0; i < sprite_array.length; ++i) {
        var img = new Image
        console.log(sprite_array[i].id);
    }
}

function add_sprite(id, quos) {

    var sprite = new Sprite_icone(0, 0, quos, 0, id)

    //Creation de la premiere ligne

    var up = document.createElement("button");
    up.appendChild(document.createTextNode("up"));

    var rollL = document.createElement("button");
    rollL.appendChild(document.createTextNode("roll left"));

    var rollR = document.createElement("button");
    rollR.appendChild(document.createTextNode("roll right"));

    var plus = document.createElement("button");
    plus.appendChild(document.createTextNode("+"));

    var lign_1 = document.createElement("div");
    lign_1.appendChild(rollL);
    lign_1.appendChild(up);
    lign_1.appendChild(rollR);
    lign_1.appendChild(plus);

    //Creation de la deuxieme ligne

    var left = document.createElement("button");
    left.appendChild(document.createTextNode("left"));

    var down = document.createElement("button");
    down.appendChild(document.createTextNode("down"));

    var right = document.createElement("button");
    right.appendChild(document.createTextNode("right"));

    var minus = document.createElement("button");
    minus.appendChild(document.createTextNode("-"));

    var lign_2 = document.createElement("div");
    lign_2.appendChild(left);
    lign_2.appendChild(down);
    lign_2.appendChild(right);
    lign_2.appendChild(minus);

    //ajout des lignes au controler

    var list = document.getElementById('current_sprites');
    var b = document.createElement("div");
    b.className = "remote";

    b.appendChild(lign_1);
    b.appendChild(lign_2);

    list.appendChild(b);

    sprite_array.push(sprite);
    refresh_sprite();
}