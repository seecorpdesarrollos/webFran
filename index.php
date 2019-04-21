<?php
 require 'php/header.php';
 require 'email.php';

 try {
 $conexion = new PDO('mysql:host=localhost;dbname=franweb','root', '' );
 $conexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
 $conexion->exec('SET CHARACTER SET utf8');

 } catch (Exception $e) {
   echo "EL ERROR ESTA EN LA LINEA" .$e->getLine();
    }

$sql1 = $conexion->prepare('SELECT * FROM menu');
$sql1->execute();
$res1=$sql1->fetch();

// pagina 1

$pagina1 = $conexion->prepare('SELECT * FROM pagina1');
$pagina1->execute();
$pagi1=$pagina1->fetch();

// pagina 2

$pagina2 = $conexion->prepare('SELECT * FROM pagina2');
$pagina2->execute();
$pagi2=$pagina2->fetchAll();
foreach ($pagi2 as $key ) {
 $subtitulo = $key['subtitulo'];
}

// pagina 3 pa el subtitulo

$pagina3 = $conexion->prepare('SELECT * FROM pagina3');
$pagina3->execute();
$pagi3=$pagina3->fetch();
 $subtitulo3 = $pagi3['subtitulo'];

// primer elemento
 $primerElemento = $conexion->prepare('SELECT * FROM pagina3  WHERE id = 1');
 $primerElemento->execute();
 $elemento1=$primerElemento->fetch();

 // segundo elemento
  $segundoElemento = $conexion->prepare('SELECT * FROM pagina3  WHERE id = 2');
  $segundoElemento->execute();
  $elemento2=$segundoElemento->fetch();

  // tercero elemento
   $tercerElemento = $conexion->prepare('SELECT * FROM pagina3  WHERE id = 3');
   $tercerElemento->execute();
   $elemento3=$tercerElemento->fetch();

   // cuarto elemento
    $cuartoElemento = $conexion->prepare('SELECT * FROM pagina3  WHERE id = 4');
    $cuartoElemento->execute();
    $elemento4=$cuartoElemento->fetch();


    // pagina 4 pa el subtitulo

    $pagina4 = $conexion->prepare('SELECT * FROM pagina4');
    $pagina4->execute();
    $pagi4=$pagina4->fetch();
    $subtitulo4 = $pagi4['subtitulo'];
    $desc4 = $pagi4['desc1'];

    // toda la página
    $paginaTotal = $conexion->prepare('SELECT * FROM pagina4');
    $paginaTotal->execute();
    $paginas4=$paginaTotal->fetchAll();

?>


<!-- incluimos el header -->
<?php require 'views/header.views.php';  ?>

    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
            <?php foreach ($res as $key ): ?>
                <div class="intro-lead-in text-primary"> <?php echo $key['primero'] ?> </div>
                <div class="intro-heading text-uppercase"><?php echo $key['segundo'] ?></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services"><?php echo $key['tercero'] ?></a>
              <?php endforeach; ?>
            </div>
        </div>
    </header>

    <!-- Services -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $res1['primero'] ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $pagi1['subtitulo'] ?></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading"><?php echo $pagi1['titulo1'] ?></h4>
                    <p class="text-muted"><?php echo $pagi1['desc1'] ?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading"><?php echo $pagi1['titulo2'] ?></h4>
                    <p class="text-muted"><?php echo $pagi1['desc2'] ?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading"><?php echo $pagi1['titulo3'] ?></h4>
                    <p class="text-muted"><?php echo $pagi1['desc3'] ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- productos Grid -->

    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $res1['segundo'] ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $subtitulo; ?></h3>
                </div>
            </div>
            <div class="row">
              <?php foreach ($pagi2 as $key ): ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#id<?php echo $key['id'] ?>">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid foto" src="<?php echo $key['foto'] ?>" alt="foto" >
                    </a>
                    <div class="portfolio-caption">
                        <h4><?php echo $key['subtitulo'] ?></h4>
                        <p class="text-muted"><?php echo $key['subtitulo1'] ?></p>
                    </div>
                </div>

              <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pagina de  Nosotros -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $res1['tercero'] ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $subtitulo3; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="<?php echo $elemento1['foto']; ?>" alt="primero">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $elemento1['titulo1']; ?></h4>
                                    <h4 class="subheading"><?php echo $elemento1['titulo2']; ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $elemento1['descFoto']; ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="<?php echo $elemento2['foto']; ?>" alt="foto 2">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $elemento2['titulo1']; ?></h4>
                                    <h4 class="subheading"><?php echo $elemento2['titulo2']; ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $elemento2['descFoto']; ?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="<?php echo $elemento3['foto'] ;?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $elemento3['titulo1'] ;?></h4>
                                    <h4 class="subheading"><?php echo $elemento3['titulo2'] ;?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $elemento3['descFoto'] ;?></p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="<?php echo $elemento4['foto'] ;?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $elemento4['titulo1'] ;?></h4>
                                    <h4 class="subheading"><?php echo $elemento4['titulo2'] ;?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $elemento4['descFoto'] ;?></p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Es parteix
                                    <br>De la
                                    <br>nostra història</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $res1['cuarto'] ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $subtitulo4; ?></h3>
                </div>
            </div>
            <div class="row">
              <?php foreach ($paginas4 as $equipo): ?>
                <div class="col-sm-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="<?php echo $equipo['foto'] ;?>" alt="">
                        <h4><?php echo $equipo['nombre'] ?></h4>
                        <p class="text-muted"><?php echo $equipo['cargo'] ?></p>
                        <!-- <ul class="list-inline social-buttons">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>
              <?php endforeach; ?>

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted"> <?php echo $desc4; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <a href="#">
                        <img class="img-fluid d-block mx-auto" src="img/logos/logo1.jpg" height="150" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-6">
                    <a href="#">
                        <img class="img-fluid d-block mx-auto" src="img/logos/logo2.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
               <div class="alert alert-info text-center" role="alert">
              <strong>  Horari de la botiga!</strong>
                 <br>
              De dilluns a divendres de <br>
              09:30 a 13:30 i de 16:30 a 20:00.
              <br>
              Dissabte de 10:00 a 13:30
              <br>
              Tel: 972 26 24 25
                 </div>
                </div>

               <div class="col-md-4 col-sm-6">
              &nbsp;&nbsp;&nbsp;&nbsp;      <a class="btn btn-outline-danger" href="https://www.google.com/search?hl=es-419&gl=es&q=TWITTINK,+Carrer+Sant+Ferriol,+3,+17800+Olot,+Girona&ludocid=4508519168770684045#lrd=0x12bacaef260dcff1:0x3e917a4bfd9db48d,3" target="_blank">
                      Deixa'ns una ressenya a Google
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $res1['quinto'] ?></h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" action="email.php" method="post" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="nombre" id="name" type="text" placeholder="El teu nom *" required="required" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="El teu correu *" required="required" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="tel" id="phone" type="tel" placeholder="El teu Tel. *" required="required" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="mensaje" id="message" placeholder="El teu missatge *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" name="enviarCorreo" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar  Missatge</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; twittink.com <?php echo date('Y'); ?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/explore/locations/141728275975755/twittink?hl=es-la" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="privacidad.html" target="_blank">Termes i condicions</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="aviso.html" target="_blank">Avís Legal</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--Código HTML de la política de cookies -->

<!--La URL incluida es la parte que se ha de modificar -->

<div class="cookiesms" id="cookie1">
  Aquest web utilitza cookies, pots veure la nostra  <a href="cookies.html" target="_blank">la política de cookies, aquí</a>
  Si continues navegant estàs acceptant-
<button class="btn btn-outline-primary" onclick="controlcookies()">Aceptar</button>
<div  class="cookies2" onmouseover="document.getElementById('cookie1').style.bottom = '0px';">Política de cookies + </div>
</div>
<script type="text/javascript">
if (localStorage.controlcookie>0){
document.getElementById('cookie1').style.bottom = '-50px';
}
</script>

<script type="text/javascript">
function controlcookies() {
         // si variable no existe se crea (al clicar en Aceptar)
    localStorage.controlcookie = (localStorage.controlcookie || 0);

    localStorage.controlcookie++; // incrementamos cuenta de la cookie
    cookie1.style.display='none'; // Esconde la política de cookies
}
</script>
<!-- Fin del código de cookies --->

    <!-- Portfolio Modals -->



    <?php foreach ($pagi2 as  $value): ?>
      <!-- Modal para todas las fotos -->
      <div class="portfolio-modal modal fade" id="id<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl"></div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 mx-auto">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2 class="text-uppercase"><?php echo $value['tituloFoto'] ?></h2>
                                  <p class="item-intro text-muted"><?php echo $value['subtitulofoto'] ?></p>
                                  <img class="img-fluid d-block mx-auto fotoDesc" src="<?php echo $value['foto'] ?>" alt="ruta foto">
                                  <p><?php echo $value['descfoto'] ?></p>
                                  <ul class="list-inline">
                                      <!-- <li>Date: January 2017</li>
                                      <li>Client: Explore</li>
                                      <li>Category: Graphic Design</li> -->
                                  </ul>
                                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                            tancar producte</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    <?php endforeach; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.js"></script>

</body>

</html>
