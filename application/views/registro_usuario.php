<body>
<!--Registro-->
<div class="container" id="Registro">
<h1>Regístrate</h1>
  <div class="row">
    <div class="col-md-6 panel">
      <form action="<?php echo base_url();?>index.php/Principal/insertaUsuario" method="post">
    
        <div class="form-group col-md-6">
          <label for="curp">CURP:</label>
          <input type="text" class="form-control" id="curp" placeholder="Ingrese CURP" name="curp" oninput="validacion('curp')" required pattern="([A-Z]{4})([0-9]{6})([A-Z]{6})([0-9]{2})" title="longitud de 18, alfanumerico">
        </div>

        <div class="form-group col-md-6">
          <label for="rfc">RFC:</label>
          <input type="text" class="form-control" id="rfc" placeholder="Ingrese RFC" name="rfc" oninput="validacion('rfc')" required pattern="([A-Z]{4})([0-9]{6})([A-Z]{2})([0-9]{1})" title="longitud de 13, alfanumerico">
        </div>

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
          <input type="text" class="form-control" id="login" placeholder="Ingresa tu CURP, será tu identificación de usuario" name="login" oninput="validacion('login')" required pattern="([A-Z]{4})([0-9]{6})([A-Z]{6})([0-9]{2})" title="longitud de 18, alfanumerico">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="contrasena" placeholder="Ejemplo: Maria122" oninput="validacion('contrasena')" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Longitud: al menos 8 o más caracteres. Debe contener al menos un número y una letra mayúscula y minúscula">
        </div>
        
        <div class="form-group col-md-6">
            <label for="tipoCliente">Tipo de usuario</label>
            <select class="form-control" name="tipoCliente">
                <option selected value="cliente">cliente</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="tipoEvento">Tipo de evento</label>
            <select class="form-control" name="tipoEvento">
                <option selected value="Social">Social</option>
                <option selected value="Corporativo">Corporativo</option>
                <option selected value="Cultural">Cultural</option>
            </select>
        </div>
        <button type="submit" class="btn btn-azul center-block" >Crear cuenta</button>
      </form>
    </div>
    <div class="col-md-6 text-center">
      <img src="<?php echo base_url(); ?>img/event-equipment.svg" alt="registrate" width="100%">
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