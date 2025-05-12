$(function () {
    let $stopCamera = $("#stopCamera");
    let $takeCamera = $("#takeCamera");
    let $webCamVideo = $("#webCamVideo");
    let $webCamCanvas = $("#webCamCanvas");
    let $saveImage = $("#saveImage");
    let $changeModeCamera = $("#changeModeCamera");

    let imageData;
    let cameraIsOn = false;
    let cameraFailed = false;
    let infoUrl = new URLSearchParams(window.location.search);
    let urlNow = location.href;
    let fm = infoUrl.get("cameramode") == "back" && infoUrl.get("cameramode") != null ? "environment" : "user";
    startTheCamera();
    showImages();

    async function startTheCamera() {
        let stream = null;
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    width: { ideal: 840 },
                    height: { ideal: 680 },
                    aspectRatio: 4 / 3,
                    facingMode: { exact: fm },
                },
                audio: false
            });

            $webCamVideo[0].srcObject = stream;
            $webCamVideo[0].play();

            $webCamVideo.on("loadedmetadata", () => {
                $webCamCanvas[0].width = $webCamVideo[0].videoWidth;
                $webCamCanvas[0].height = $webCamVideo[0].videoHeight;
            })

            cameraIsOn = true;
            $stopCamera.text("Stop Camera");

        } catch (error) {
            cameraFailed = true;
            alert("Camera tidak dapat diakses");
            console.log(error);
            return;
        }
    }

    $stopCamera.on("click", () => {
        if (cameraIsOn) {
            $webCamVideo[0].srcObject.getTracks().forEach((track) => {
                track.stop();
            });
            cameraIsOn = false;
            $stopCamera.text("Start Camera");
        } else {
            startTheCamera();
        }
    });

    $takeCamera.on("click", () => {
        console.log($webCamCanvas[0].width, $webCamCanvas[0].height, $webCamVideo[0].videoWidth, $webCamVideo[0].videoHeight);
        
        if (cameraFailed) {
            alert("⚠️ Kamera tidak aktif! Tidak bisa mengambil gambar.");
            return;
        }
        let ctx = $webCamCanvas[0].getContext("2d");

        if ($webCamVideo.is(":visible")) {
            ctx.imageSmoothingEnabled = false;
            ctx.drawImage($webCamVideo[0], 0, 0, $webCamCanvas[0].width, $webCamCanvas[0].height);
            imageData = $webCamCanvas[0].toDataURL("image/png");
            $takeCamera.text("Take Again");
            $saveImage.css("display", "block");
        } else {
            $takeCamera.text("Take Image");
            $saveImage.css("display", "none");
            imageData = null;
        }
        toggleCamera();
    });

    function toggleCamera() {
        $webCamVideo.toggle()
        $webCamCanvas.toggle()
    }

    $changeModeCamera.on("click", () => {
        infoUrl.get("cameramode") != null && infoUrl.get("cameramode") == "back" ? 
        location.href = location.href.split("?")[0] : 
        location.href = location.href + "?cameramode=back";
    })

    $saveImage.on("click", () => {
        if (cameraFailed) {
            alert("❌ Tidak bisa menyimpan karena kamera tidak aktif!");
            return;
        }

        if (!imageData) {
            alert("Ambil gambar dulu sebelum menyimpan!");
            return;
        }

        let kodeGambar = $("#txtKodeGambar").val();
        
        $.ajax({
            url: "saveImage.php",
            type: "POST",
            data: {
                kodeGambar: kodeGambar,
                imageData: imageData
            },
            dataType: "json",
            success: function (data) {
                alert(data.pesan);
                location.href = urlNow;
                imageData = null;
            }
        });
    });
});

function showImages(page) {
    $.ajax({
        type: "GET",
        url: "showImages.php",
        data: {
            page: page
        },
        success: function (response) {
            $("#showImages").html(response);
            pages(page);
        }
    });
}

function pages(page) {
    $.ajax({
        type: "GET",
        url : "paging.php",
        data: {
            page: page
        },
        success: function (response) {
            $("#pages").html(response);
        }
    })
}