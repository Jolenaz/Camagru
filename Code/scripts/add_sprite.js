var sprite_array = [];

class Sprite_icone {
    constructor(x, y, quos, ang, sp, width, height) {
        this.x = x;
        this.y = y;
        this.quos = quos;
        this.ang = ang;
        this.id = sp.id;
        this.name = sp.name;
        this.format = sp.format;
        this.width = width;
        this.height = height;
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

    add_img(img) {
        this.img = img;
    }
}

function refresh_sprite() {
    var ctx = document.getElementById("canvas").getContext("2d");
    ctx.clearRect(0, 0, 640, 480);

    var img_array = [];

    for (var i = 0; i < sprite_array.length; ++i) {
        var img = new Image();
        img.src = "../sprites/sp" + sprite_array[i].id + "." + sprite_array[i].format;
        sprite_array[i].add_img(img);

        if (i == sprite_array.length - 1) {
            img.onload = function(e) {
                for (var j = 0; j < sprite_array.length; ++j) {
                    var posX = sprite_array[j].x - sprite_array[j].width * sprite_array[j].quos / 2;
                    var posY = sprite_array[j].y - sprite_array[j].height * sprite_array[j].quos / 2;
                    ctx.save();
                    ctx.translate(posX, posY)
                    ctx.rotate(sprite_array[j].ang / 180 * Math.PI);
                    ctx.drawImage(
                        sprite_array[j].img, -sprite_array[j].width * sprite_array[j].quos / 2, -sprite_array[j].height * sprite_array[j].quos / 2,
                        sprite_array[j].width * sprite_array[j].quos,
                        sprite_array[j].height * sprite_array[j].quos);
                    ctx.restore();
                }
            };
        }
    }
}

function add_sprite(spr_obj, quos, width, height) {

    var sp = JSON.parse(spr_obj);

    var tmp;

    var sprite = new Sprite_icone(150, 150, quos, 0, sp, width, height);
    //Creation de la premiere ligne

    var up = document.createElement("button");
    up.onmousedown = function() { tmp = setInterval(function() { sprite.move(0, -10) }, 100) };
    up.onclick = function() { sprite.move(0, -5) };
    up.onmouseup = function() { clearInterval(tmp) };
    up.appendChild(document.createTextNode("up"));

    var rollL = document.createElement("button");
    rollL.onmousedown = function() { tmp = setInterval(function() { sprite.rotate(-10) }, 100) };
    rollL.onclick = function() { sprite.rotate(-10) };
    rollL.onmouseup = function() { clearInterval(tmp) };
    rollL.appendChild(document.createTextNode("roll left"));

    var rollR = document.createElement("button");
    rollR.onmousedown = function() { tmp = setInterval(function() { sprite.rotate(10) }, 100) };
    rollR.onclick = function() { sprite.rotate(10) };
    rollR.onmouseup = function() { clearInterval(tmp) };
    rollR.appendChild(document.createTextNode("roll right"));

    var plus = document.createElement("button");
    plus.onmousedown = function() { tmp = setInterval(function() { sprite.resize(0.01) }, 100) };
    plus.onclick = function() { sprite.resize(0.01) };
    plus.onmouseup = function() { clearInterval(tmp) };
    plus.appendChild(document.createTextNode("+"));

    var lign_1 = document.createElement("div");
    lign_1.appendChild(rollL);
    lign_1.appendChild(up);
    lign_1.appendChild(rollR);
    lign_1.appendChild(plus);

    //Creation de la deuxieme ligne

    var left = document.createElement("button");
    left.onmousedown = function() { tmp = setInterval(function() { sprite.move(-10, 0) }, 100) };
    left.onclick = function() { sprite.move(-5, 0) };
    left.onmouseup = function() { clearInterval(tmp) };
    left.appendChild(document.createTextNode("left"));

    var down = document.createElement("button");
    down.onmousedown = function() { tmp = setInterval(function() { sprite.move(0, 10) }, 100) };
    down.onclick = function() { sprite.move(0, 5) };
    down.onmouseup = function() { clearInterval(tmp) };
    down.appendChild(document.createTextNode("down"));

    var right = document.createElement("button");
    right.onmousedown = function() { tmp = setInterval(function() { sprite.move(10, 0) }, 100) };
    right.onclick = function() { sprite.move(5, 0) };
    right.onmouseup = function() { clearInterval(tmp) };
    right.appendChild(document.createTextNode("right"));

    var minus = document.createElement("button");
    minus.onmousedown = function() { tmp = setInterval(function() { sprite.resize(-0.01) }, 100) };
    minus.onclick = function() { sprite.resize(-0.01) };
    minus.onmouseup = function() { clearInterval(tmp) };
    minus.appendChild(document.createTextNode("-"));

    var lign_2 = document.createElement("div");
    lign_2.appendChild(left);
    lign_2.appendChild(down);
    lign_2.appendChild(right);
    lign_2.appendChild(minus);

    //ajout des lignes au controler

    var list = document.getElementById('current_sprites');
    if (!document.getElementById('take')) {
        var take = document.createElement('button');
        take.id = 'take';
        take.onclick = function() { take_picture() };
        take.appendChild(document.createTextNode('prendre la photo'));
        list.appendChild(take);
    }
    var b = document.createElement("div");
    b.className = "remote";

    b.appendChild(lign_1);
    b.appendChild(lign_2);

    list.appendChild(b);


    sprite_array.push(sprite);
    refresh_sprite();
}