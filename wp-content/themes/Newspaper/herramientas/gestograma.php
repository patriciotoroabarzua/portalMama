
<script src="/herramientas/js/jquery-1.11.1.js"></script>
<script src="/herramientas/gestograma2/jQueryRotate.2.1.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/herramientas/gestograma2/gestograma.css" />


<!-- Homepage content -->
<div class="container homepage-content">

<div class="main-content-column-1">


        <div >	


                <div id="content" style="float:left;padding-top: 11px;">
                        <div id="wheelContainer">
                                <div id="wheel">
                                        <img id="hoy-image" src="/herramientas/gestograma2/hoy-transparent.png" style="max-width: none;"/>
                                        <img id="wheel-image" src="/herramientas/gestograma2/inner-circle.png" style="max-width: none;"/>				
                                </div>
                                <div id="wheel-center" >
                                        <div id="center-lastMenstrual"></div>
                                        <div id="center-dueDate"></div>
                                </div>
                        </div>


                        <br />
                        <br />		


                </div><!-- /content -->


                <div class="clear"></div>



        </div><!-- /main -->

</div>

<!-- Sidebar -->
<div class="main-sidebar">

        <div class="widget-tabs">
                <div class="title-default">
                        <h3>Resultado</h3>
                </div>
                <div class="resultado-box">
                        <div id="results">
                                <p>
                                        <label>Fecha última regla</label><br>
                                        <span id="result-fur" class="value"></span>

                                </p>
                                <p>
                                        <label>Fecha Actual</label><br>
                                        <span id="result-fecha-actual" class="value"></span>
                                </p>	
                                <p>
                                        <label>Fecha probable de parto</label><br>
                                        <span id="result-parto" class="value"></span>
                                </p>
                                <p>
                                        <label>Diámetro biparietal (DBP)</label><br>
                                        <span id="result-dbp" class="value">0</span><span class="units">mm</span>
                                </p>
                                <p>
                                        <label>Longitud del fémur</label><br>
                                        <span id="result-longitud" class="value">0</span><span class="units">mm</span>
                                </p>
                                <div>
                                        <div>
                                                <p>
                                                        <label>Peso</label><br>
                                                        <span id="result-peso" class="value">0</span><span class="units">gr</span>
                                                </p>

                                        </div>
                                        <div>
                                                <p>
                                                        <label>Talla</label><br>
                                                        <span id="result-talla" class="value">0</span><span class="units">mm</span>
                                                </p>
                                        </div>
                                </div>	

                        </div>




                </div>



        </div>



    </div>
</div>


<script>
        jQuery(document).ready(function() {
                jQuery ("#wheel-image").rotate(wheelAngle);
        });
</script>

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="/herramientas/gestograma2/gestograma.js" type="text/javascript"></script>

<script src="/herramientas/js/bootstrap.js"></script>
<script src="/herramientas/js/bootstrap-hover-dropdown.js"></script>
<script src="/herramientas/js/jquery.particleground.js"></script>
<script src="/herramientas/js/jquery.cycle2.min.js"></script>
<script src="/herramientas/js/jquery.cycle2.scrollVert.js"></script>
<script src="/herramientas/js/jquery.cycle2.swipe.min.js"></script>
<script src="/herramientas/js/jquery.hoverintent.min.js"></script>
<script src="/herramientas/js/jquery.inview.js"></script>
<script src="/herramientas/js/jquery.ui.core.min.js"></script>
<script src="/herramientas/js/jquery.ui.effect.min.js"></script>
<script src="/herramientas/js/jquery.ui.effect-size.min.js"></script>
<script src="/herramientas/js/jquery.ui.effect-slide.min.js"></script>
<script src="/herramientas/js/goliath.js"></script>
