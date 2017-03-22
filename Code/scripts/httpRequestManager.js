function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}

function request(url, data, method, callback) {
    var xhr = getXMLHttpRequest();

    if (method == "POST") {
        var dataStr = "";
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        for (var d in data) {
            dataStr += d + "=" + data[d] + "&";
        }
    } else if (method == "GET") {
        url += "?";
        for (var d in data) {
            url += d + "=" + data[d] + "&";
        }
    } else { return (false); }

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };

    xhr.open(method, url, true);
    xhr.send(data);
}