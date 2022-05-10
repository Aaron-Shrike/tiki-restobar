<?php 
    include("includes/header.php");
    require("config/conexion.php");
    include("app/modelos/Carta.php");
    $bebidas = new Carta();
?>
    <div class="plantarde">
        <h1>Bebidas Sencillas</h1>
        <p>Acompaña tu platos o piqueos con bebidas sencillas para pasar el rato</p>
    </div>
    <div class="manchaInvertida"></div>
    <div class="amarillo">
        <div class="wrap contenedor">
            <?php
                $data = $bebidas->get_bebidas_tarde();
                foreach ($data as $value) { ?>
                    <div class="tarjeta-wrap">
                        <div class="tarjeta">
                            <div class="adelante carta<?php echo $value['codigo']; ?>">
                                <img src="resources/img/carta/<?php echo $value['url_imagen']; ?>" alt="">                              
                            </div>
                            <div class="atras">
                                <h1><span style="text-align: center;"><?php echo $value['nombre']; ?></span></h1>
                                <p><?php echo $value['descripcion']; ?></p>
                                <h4><?php echo "S/. " . $value['precio']; ?></h4>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
    <div class="mancha"></div>
    <!--PLAN NOCHE -------------------------------------------------------------------->
    <div class="plantarde">
        <h1>Bebidas Tiki</h1>
        <p>¿Piensas olvidarte de los problemas por un rato?, acompañalos con algún trago o tragos de la casa.</p>
        <p>(Tomar bebidas alcoholicas en exceso es dañino)</p>
    </div>
    <div class="manchaInvertida"></div>
    <div class="amarillo">
        <div class="wrap contenedor">
            <?php
                $data = $bebidas->get_bebidas_noche();
                foreach ($data as $value) { ?>
                    <div class="tarjeta-wrap">
                        <div class="tarjeta">
                            <div class="adelante carta<?php echo $value['codigo']; ?>">
                                <img src="resources/img/carta/<?php echo $value['url_imagen']; ?>" alt="">                              
                            </div>
                            <div class="atras">
                                <h1><span style="text-align: center;"><?php echo $value['nombre']; ?></span></h1>
                                <p><?php echo $value['descripcion']; ?></p>
                                <?php 
                                    if(isset($value['precio'])){ ?>
                                        <h4><?php echo ($value['precio'] == -1) ? "" : "S/. " . $value['precio']; ?></h4>
                                <?php   }   ?>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
    <div class="mancha"></div>
<?php 
    include("includes/footer.php")
?>