navigator.getUserMedia = navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia;

var is_recording = false;

function getVideo() {

    var old = document.getElementById('image_fond');

    if (old) {
        old.parentNode.removeChild(old);
    }

    is_recording = !is_recording;
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ audio: false, video: { width: 520, height: 520 } },
            function(stream) {
                if (is_recording) {
                    var video = document.getElementById('videoScreen');
                    video.src = window.URL.createObjectURL(stream);
                    video.onloadedmetadata = function(e) {
                        video.play();
                    };
                } else {
                    steam.stop;
                }

            },
            function(err) {
                console.log("The following error occurred: " + err.name);
            }
        );
    } else {
        console.log("getUserMedia not supported");
    }
}