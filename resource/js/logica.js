const URL = "http://localhost/es-veh-unicor/";

$(function () {

    $("#btn_register").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'home/registro_personas',
            data: $("#register").serialize(), // Adjuntar los campos del formulario enviado.
            success: function (data) {
                $("#msg_register").html(data); // Mostrar la respuestas del script PHP.
            }
        });
        return false; // Evitar ejecutar el submit del formulario.
    });

    $("#btn_login").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'home/iniciar',
            data: $("#login").serialize(),
            success: function (data) {
                $("#msg_login").html(data);
            }
        });
        return false;
    });

    $("#btn_forgot_password").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'home/codigo_verificacion',
            data: $("#forgot_password").serialize(),
            success: function (data) {
                $("#msg_forgot_password").html(data);
            }
        });
        return false;
    });

    $("#btn_changepassword").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'home/cambiar_contrasena',
            data: $("#changepassword").serialize(),
            success: function (data) {
                $("#msg_changepassword").html(data);
            }
        });
        return false;
    });

    $("#btn_registerVeh").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'estudiantes/registrar_vehiculo',
            data: $("#registerVeh").serialize(),
            success: function (data) {
                $("#msg_registerVeh").html(data);
            }
        });
        return false;
    });

    $("#btn_registerVehVis").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'visitantes/registrar_vehiculo',
            data: $("#registerVehVis").serialize(),
            success: function (data) {
                $("#msg_registerVehVis").html(data);
            }
        });
        return false;
    });

    $("#btn_updateVeh").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'estudiantes/actualizar_vehiculo',
            data: $("#updateVeh").serialize(),
            success: function (data) {
                $("#msg_updateVeh").html(data);
            }
        });
        return false;
    });

    $("#btn_updateVehVis").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'visitantes/actualizar_vehiculo',
            data: $("#updateVehVis").serialize(),
            success: function (data) {
                $("#msg_updateVehVis").html(data);
            }
        });
        return false;
    });

    $("#btn_entradaVeh").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'vigilantes/guardar_entrada',
            data: $("#entradaVeh").serialize(),
            success: function (data) {
                $("#msg_entradaVeh").html(data);
            }
        });
        return false;
    });

    $("#btn_salidaVeh").click(function () {
        $.ajax({
            type: "POST",
            url: URL + 'vigilantes/guardar_salida',
            data: $("#salidaVeh").serialize(),
            success: function (data) {
                $("#msg_salidaVeh").html(data);
            }
        });
        return false;
    });

    $("#filtrar").click(function () {

        $.ajax({
            type: "POST",
            url: URL + 'administrativos/historial',
            data: $("#form_filtro").serialize(),
            success: function (data) {
                $('#tbody').html(data);
            }
        });

        return false;

    });

});
