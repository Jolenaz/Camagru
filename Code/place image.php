<!DOCTYPE HTML>
<html>
<head>
<style>
#div1, #div2 {
    float: left;
    width: 500px;
    height: 350px;
    margin: 10px;
    padding: 10px;
    border: 1px solid black;
}
#drag1{
position: relative;
left: 10px;
top: 10px;
}
</style>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
	var elm = document.getElementById("drag1");
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    console.log(ev);
    elm.style.left = ev.offsetX + "px";
    elm.style.top = ev.offsetY + "px";
}
</script>
</head>
<body>

<h2>Drag and Drop</h2>
<p>Drag the image back and forth between the two div elements.</p>

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
  <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
</div>

<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

</body>
</html>