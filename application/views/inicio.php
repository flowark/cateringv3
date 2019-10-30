<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url();?>img/welcome.jpg" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>img/imagen1.jpg" style="width:100%;">
        <div class="carousel-caption">
          <h3>Precios accesibles</h3>
          <p>Presentaciones que impactan</p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>img/imagen2.jpg"  style="width:100%;">
        <div class="carousel-caption">
          <h3>Salones deslumbrantes</h3>
          <p>Excelentes espacios</p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>img/imagen3.jpg" style="width:100%;">
        <div class="carousel-caption">
          <h3>Servicio de meseros</h3>
          <p>El mejor servicio!</p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>img/imagen4.jpg" style="width:100%;">
        <div class="carousel-caption">
          <h3>Vajillas</h3>
          <p>Variedad de vajillas</p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>img/imagen5.jpg" style="width:100%;">
        <div class="carousel-caption">
          <h3>Excelentes banquetes</h3>
          <p>Variedad de platillos</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container-fluid bg-2 text-center">
    <div class="container">
      <h1>¿Quiénes somos?</h1><br>
      <p>Somos una empresa que ofrece un servicio dedicada a facilitarte la organización de eventos a nuestros usuarios, con multiples servicios y así crearle la mejor experiencia, facil y rapido.</p>
      <img src="<?php echo base_url();?>img/abastecimiento.svg"/>
    </div>
  </div>


  <div class="container-fluid bg-1 text-center">
    <div class="container">
      <h2>Vistazo a nuestros productos</h2><br>
      <img id="imgServicio"src="<?php echo base_url();?>img/event-equipment.svg" alt="">
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-negroA btn-lg" data-toggle="modal" data-target="#myModall">Productos</button>
      
      

      <!-- Modal -->
      <div class="modal fade" id="myModall" role="dialog">
        <div class="modal-dialog modal-lg" id="ventana">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Productos</h4>
            </div>

            <div class="modal-body">
              <div class="row">
                <!--?php foreach($producto->result() as $fila) { ?-->
                  <!--div class="col-sm-4">
                    <img src="<?php echo base_url()?>/assets/uploads/files/<?php echo $fila->foto;?>" class="img-responsive" style="width:100%" alt="Image" class="img-rounded" alt="Cinque Terre">
                  </div-->
                <!--?php }-->
              </div>
            </div>
            
            <div class="modal-footer" id="bgventana">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>  
    </div>
  &nbsp;
  </div>

  <div class="container-fluid bg-2 text-center">
    <h2 id="h2amarillo">Ofrecemos</h2><br>

    <div class="row">
      <div class="col-sm-4">
        <p>Servicio en cualquier localidad</p>
        <img id="imgServicio"src="<?php echo base_url();?>img/building.svg" alt="">
      </div>
      
      <div class="col-sm-4">
        <p>Entrega en tiempo y forma</p>
        <img id="imgServicio"src="<?php echo base_url();?>img/event.svg" alt="">
      </div>

      <div class="col-sm-4">
        <p>Amor "Trabajamos con amor"</p>
        <img id="imgServicio"src="<?php echo base_url();?>img/heart.svg" alt="">
      </div>
    </div>
  <!--&nbsp;-->
  </div>
</body>