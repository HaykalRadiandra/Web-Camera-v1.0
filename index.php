<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Camera</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    #webCamVideo,
    #webCamCanvas {
        width: 50%;
        max-width: 600px;
        height: auto;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    #webCamVideo:hover,
    #webCamCanvas:hover {
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
    }

    #webCamCanvas {
      display: none;
    }

    #saveImage {
      display: none;
    }

    @media screen and (max-width: 960px) {
        #webCamVideo,
        #webCamCanvas {
            width: 100%;
        }
        
    }
  </style>
</head>
<body class="bg-light">

  <div class="container py-5 py-sm-2">
    <div id="endCamera" class="mb-4">
      <h2 class="text-center mb-4">📷 Web Camera App</h2>
  
      <div class="position-relative">
          <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-4 mb-4">
            <video id="webCamVideo"></video>
            <canvas id="webCamCanvas"></canvas>
          </div>
      
          <div class="d-flex justify-content-center flex-wrap gap-3">
            <button id="takeCamera" class="btn btn-sm btn-outline-primary">Take Image</button>
            <button id="changeModeCamera" class="btn btn-sm btn-outline-info">Change Camera Mode</button>
            <button id="saveImage" class="btn btn-sm btn-outline-success">Save Image</button>
            <button id="stopCamera" class="btn btn-sm btn-outline-danger">Stop Camera</button>
            <input type="hidden" id="txtKodeGambar">
          </div>
      </div>
    </div>
    <div id="vwCamera">
      <h2 class="text-center mb-4"> Gallery</h2>
      <!-- Gallery -->
      <div class="row" id="showImages"></div>
      <div id="pages"></div>
      <!-- Gallery -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="webCam.js"></script>
</body>
</html>
