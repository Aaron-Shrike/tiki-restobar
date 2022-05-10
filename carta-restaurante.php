<?php 
    include("includes/header.php");
    require("config/conexion.php");
    include("app/modelos/Carta.php");
    $platillo = new Carta();
?>
    <div class="plantarde contenedor">
        <h1>Plan Tarde</h1>
        <p>Disfruta de estos almuerzos, para terminar con el hambre tienes muchas opciones... </p>
    </div>
    <div class="manchaInvertida"></div>
    <div class="amarillo">
        <div class="wrap contenedor">
            <?php
                $data = $platillo->get_platillos_tarde();
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
        <h1>Plan Noche</h1>
        <p>¿Salida con la familia o los amigos? o ¿te quieres dar un gustito tú solo?, acompañalos con un buen pollo a la brasa, o una pizza y ni hablar de las infaltables alitas BBQ, aunque no es lo único que tenemos para el plan noche.</p>
    </div>
    <div class="manchaInvertida"></div>
    <div class="amarillo">
        <div class="wrap contenedor">
            <?php
                $data = $platillo->get_platillos_noche();
                // echo "<pre>";
                // echo var_dump($data1);
                // echo "</pre>";
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