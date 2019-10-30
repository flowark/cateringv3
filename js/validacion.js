//$(document).on("ready",inicio);
$(document).ready(inicio);
function inicio(){
    $("span.help-block").hide();
    $("#btnvalidar").click(validar);
}

function validar(){
    var nombre = document.getElementById("nombre").value;
    var apellidoPaterno = document.getElementById("apellidoPaterno").value;
    var apellidoMaterno = document.getElementById("apellidoMaterno").value;
    var curp = document.getElementById("curp").value;
    var cuentaBank = document.getElementById("cuentaBank").value;
    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;

    if(nombre == null || apellidoPaterno == null || apellidoMaterno == null || curp == null || cuentaBank == null || usuario == null || password == null){
        $("#nombre").parent().parent().attr("class","form-group has-error");
        $("#nombre").parent().children("span").text("Campo vacio").show();
        return false;
    }

}