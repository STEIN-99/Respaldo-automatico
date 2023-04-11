function generar_respaldo() {
    //Declaramos una variable con nuestra perticion xmlhttprequest
    var xhttp = new XMLHttpRequest();
    //Abrimos las conexion hacia el archivo validar
    xhttp.open('POST', 'data-base/respaldo_automatico.php', true);
    //Con el evento de escuchar se decidira que mensaje o a que pagina se nos va a redireccionar
    xhttp.addEventListener('load', e =>{
    //Escuchamos los estados que responda el servidor
    if(e.target.readyState == 4 && e.target.status == 200){
//Si la respuesta fue para el usuario se va a redirigir a la pagina correspondiente
        console.log(e.target.response);
        if(e.target.response == "validar_usa"){
            console.log(e.target.response);
//Si la respues fue administrador se va redirigir a la pagina correspindiente
        }if(e.target.response == "validar_admin"){
            console.log(e.target.response);
//Si no nos mostrara un mensaje de error
        }else{
            swal("Datos incorrectos!", "Intentelo nuevamente", "warning");
        }
//Encaso que que el servidor no responda se le notifica al usuario
    }else{
        swal("Error del servidor!", "Intentelo nuevamente o contacte con soporte tecnico!", "error");
    }
    });
    xhttp.send();
}