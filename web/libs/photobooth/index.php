
<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
<link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox-1.3.4.css" />
<input type="hidden" value="<?php echo $_GET['cedula']?>" id="cedula">
<div id="camera">
    
	<span class="tooltip"></span>
	<span class="camTop"></span>
    
    <div id="screen"></div>
    <div id="buttons">
    	<div class="buttonPane">
        	<a id="shootButton" href="" class="blueButton">FOTO</a>
        </div>
        <div class="buttonPane hidden">
        	<a id="cancelButton" href="" class="blueButton">Cancel</a> <a id="uploadButton" href="" class="greenButton" onclick="window.close()">Guardar!</a>
        </div>
    </div>
    
    <span class="settings"></span>

</div>

<div id="photos"></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" ></script>
<script src="assets/fancybox/jquery.easing-1.3.pack.js"></script>

<script src="assets/webcam/webcam.js"></script>
<script src="assets/js/script.js"></script>

