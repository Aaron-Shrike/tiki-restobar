<?php 
    include("includes/header.php")
?>
    <section id="carrusell" class="banner">
        <div class="imgBox">
            <img class="activo" src="resources/img/portal.png" alt="">
            <img src="resources/img/portal.png" alt="">
        </div>
        <div class="contenidoBox">
            <div class="activo" style="display: none;">
            </div>
            <div style="display:none;">
                <h2>Disfruta las mejores bebidas</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, a?</p>
                <a href="#"></a>
            </div>
            <div style="display:none;">
                <h2>Disfruta las mejores comidas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae fuga esse ad.</p>
                <a href="#"></a>
            </div>
        </div>
    </section>
    <!--CARTA DEL RESTAURANT-->
    <section id="carta">
        <div class="contenido-carta contenedor">
            <h2>Carta</h2>
            <p>Contamos con una nutrida variedad de cocteles creados por nuestro equipo de Barmans. La mayoría son a base de nuestro licor emblema el Pisco, que generalmente es macerado en hierbas, hojas de coca canela y ruda.</p>
            <p>Ofrecemos tragos como machacados de frutas exóticas de temporada, macerados y sours. Nuestro trago de la casa es el “Ayahuasca Sour”, que está hecho a base de Pisco macerado con hojas de coca, zumo de aguaymanto y tumbo.</p>
            <p>Acompaña a nuestros cocteles una variada carta de piqueos, en donde el favorito es el Piqueo Ayahuasca, provocadora unión de chicharrón de pollo, yuquitas, tequeños, langostinos crocantes, brochetas de lomo y anticuchos.</p>
            <p>En Ayahuasca hemos creado un ambiente que rompe la rutina, que es acogedor y que sobretodo es reconocido como un referente de nuestra identidad cultural.</p>
            <h3>LUNES A VIERNES<br>06:00 PM – 03:00 AM</h3>
        </div> 
        <div class="cartas-sep">
            <div class="restaurant">
                <h3 class="texto-borde">PLATOS</h3>
                <a href="carta-restaurante.php">Ver carta</a>
            </div>
            <div class="bar">
                <h3 class="texto-borde">TRAGOS</h3>
                <a href="carta-bar.php">Ver carta</a>
            </div>
        </div>      
    </section>
    <!--FIN CARTA DEL RESTAURANT-->
    <div class="manchaInvertida"></div>
    <section id="acerca-de" class="amarillo">
        <div class="contenido-acerda-de contenedor">
            <div class="texto">
                <h2>Nosotros</h2>
                <p>
                    Ofrecemos el mejor servicio en atención al público gracias a un equipo humano comprometido, con el mejor ambiente cálido y familiar ideal para conversar o rumbear después de una agradable cena.
                    Nuestra principal satisfacción, una sonrisa en nuestro comensales.
                    Contamos con menú diario y servicio a domicilio elaborado por nuestros grandes chefs. Calidad variedad y precio.
                    Nuestro reto es ser una gran referencia en la industria gastronómica.
                    El restaurante se divide en varias zonas, cada una con una magia especial, espacios ricos en diseño, ambiente cálido y familiar. Disponemos de una zona de comedor donde disfrutar de todo tipo de eventos y celebraciones con capacidad para 180 comensales. Realizamos eventos con calidad, variedad y buen gusto.
                    Descubra una experiencia única para su paladar, una experiencia única.
                </p>
            </div>
            <div>
                <img src="resources/img/acercade.jpg" alt="">
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.9050453959226!2d-79.84310766388893!3d-6.771505718163238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef278eaa9c83%3A0x1ddad0f87e922983!2sElias%20Aguirre%20274%2C%20Chiclayo%2014001!5e0!3m2!1ses!2spe!4v1620699763737!5m2!1ses!2spe" width="100%" height="340" style="border:0; margin-top: 20px;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <div class="mancha"></div>
    <section id="contacto">
        <div class="contenido-contacto contenedor">
            <h2>Contactanos</h2>
            <form class="form-contacto">
                <div class="formulario">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres">
                    <input type="email" name="correo" id="correo" placeholder="E-mail">
                    <input type="text" name="asunto" id="asunto" placeholder="Asunto">
                    <textarea name="mensaje" id="mensaje" cols="30" rows="7" placeholder="Mensaje" ></textarea>
                </div>
                <input class="btn btn-centro" type="submit" name="save" id="enviar" value="Enviar">
            </form>
        </div>
    </section>
<?php 
    include("includes/footer.php")
?>