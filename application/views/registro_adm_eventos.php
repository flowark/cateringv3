<body>
<!--Registro-->
<div class="container" id="Registro">
    <h1>Staff</h1>
    <p>Crear cuentas para administradores de eventos</p>
  <div class="row">
    <div class="col-md-6 panel">
      <form action="<?php echo base_url();?>index.php/Principal/insertaAdmEventos" method="post">

        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre" name="nombre" required>
        </div>

        <div class="form-group col-md-6">
          <label for="paterno">Apellido Paterno:</label>
          <input type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" name="paterno" required>
        </div>

        <div class="form-group col-md-6">
          <label for="materno">Apellido Materno:</label>
          <input type="text" class="form-control" id="materno" placeholder="Apellido Materno" name="materno" required>
        </div>

        <div class="form-group">
          <label for="cuenta_bancaria">Cuenta Bancaria:</label>
          <input type="text" class="form-control" id="cuenta_bancaria" placeholder="Cuenta Bancaria" name="cuenta_bancaria" size="100" oninput="validacion('cuenta_bancaria')" required pattern="([0-9]{10,18})" title="número de cuenta de 10,16 o 18 digítos">
        </div>

        <div class="form-group">
          <label for="login">Usuario:</label>
          <input type="text" class="form-control" id="login" placeholder="mariaRS17" name="login" oninput="validacion('login')" required pattern="[a-z]+([A-Z]{2})+[0-9]{1,2}" title="Ingrese nombre junto con la primera letra inicial del apellido materno y paterno en mayúscula, seguido del día de nacimiento. Será tu identificación de usuario">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="contrasena" placeholder="Ejemplo: Maria122" oninput="validacion('contrasena')" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Longitud: al menos 8 o más caracteres. Debe contener al menos un número y una letra mayúscula y minúscula">
        </div>
        
        <div class="form-group col-md-6">
            <label for="tipoUsuario">Tipo de usuario</label>
            <select class="form-control" name="tipoUsuario">
                <option selected value="administrador_evento">administrador_evento</option>
            </select>
        </div><br>
        <div class="col-md-6">
            <button type="submit" class="btn btn-azul center-block" >Crear cuenta</button>
        </div>
      </form>
    </div>
    <div class="col-md-6 text-center">
      <img src="<?php echo base_url(); ?>img/promoter.svg" alt="registrate" width="100%">
    </div>
  </div>
<script>
 function validacion(id){
    var dato = document.getElementById(id);
    if(dato.checkValidity()){
        dato.style.borderColor="#2962ff";
    }else{
        dato.style.borderColor="#d50000";
    }
 }
</script>
</body>