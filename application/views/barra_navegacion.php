<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>index.php">CATERING</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if (($this->session->userdata('nivel')=='administrador') || ($this->session->userdata('nivel')=='administrador_evento') || ($this->session->userdata('nivel')=='cliente')) {?>

      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>index.php/Principal/servicios">Servicios</a></li>
        
        <?php if ($this->session->userdata('nivel')=='administrador') { ?>
        <li><a href="<?php echo base_url();?>index.php/Principal/usuarios">Usuarios</a></li>
        <?php }?>
        
        <?php if ($this->session->userdata('nivel')=='administrador') { ?>
        <li><a href="<?php echo base_url();?>index.php/Principal/staff">Staff</a></li>
        <?php }?>

        <?php if ($this->session->userdata('nivel')=='administrador' || ($this->session->userdata('nivel')=='administrador_evento')) { ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color: rgba(224,224,224,0.9)">
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_alquiladora">Alquiladora</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_comida">Comida</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_entretenimiento">Entretenimiento</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_floreria">Floreria</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_musica">Música</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Principal/mostrar_salon">Salón</a></li>
              <li role="separator" class="divider"></li>
            </ul>
        </li>
        <?php }?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>index.php/Principal/cerrar_sesion/"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
      </ul>
      <?php } else{
      ?>
      <ul class="nav navbar-nav navbar-right">
          <button type="button" class="btn btn-gris navbar-btn" data-toggle="modal" data-target="#modalsesion"> <span class="glyphicon glyphicon-log-in"></span> Sesión</button>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>index.php/Principal/registroUsuario/">Regístrate</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="<?php echo base_url();?>index.php/Principal/nosotros">Nosotros</a></li>
      </ul>
      <?php  } ?>     
    </div>
  </div>
</nav>

<!-- Modal VENTANA PARA LOGEARSE-->
<div id="modalsesion" class="modal fade" role="dialog">
  <div class="modal-dialog" id="ventana">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;color:#ffffff;">Iniciar sesión</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url();?>index.php/Principal/validaUsuario" method="POST" class="formulario">
            <div class="form-group">
              <label for="usuario"><span class="glyphicon glyphicon-user"></span>Usuario</label>
              <input type="text" class="form-control" id="usuario" 
              name="usuario"
              placeholder="Mi usuario" required>
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-exclamation-sign"></span>Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="*******"
              name="password" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Ingresar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>