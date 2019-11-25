<?php

class Validaciones
{

    function __construct()
    { }

    /**
     * Se verifica que el nombre de usuario tenga entre 5 y 12 
     * caracteres entre letras y numeros exclusivamente
     */
    public function usermame_requirements($data = null)
    {
        $regex_username = '/[a-zA-Z0-9]{5,12}$/';

        if (preg_match($regex_username, $data)) {
            return $data;
        } else {
            null;
        }
    }

    /**
     * Se verifica que la contraseña tenga entre 8 y 32 caracteres 
     * incluyendo obligatoriamente mayusculas, minisculas, numeros 
     * y caracteres especiales
     */
    public function password_requirements($data = null)
    {
        $regex_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%*?&#.$($)$-$_]|[^\s]){8,16}$/';

        if (preg_match($regex_password, $data)) {
            return $data;
        } else {
            null;
        }
    }

    public function is_fullnames($data = null)
    {
        $regex_name = '/[a-zA-Z\.\s]{2,30}$/';

        if (preg_match($regex_name, $data)) {
            return $data;
        } else {
            null;
        }
    }

    public function is_email($data = null)
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return $data;
        } else {
            return null;
        }
    }

    public function is_dni($data = null)
    {
        $regex_dni = '/[0-9]{7,10}$/';

        if (preg_match($regex_dni, $data)) {
            return $data;
        } else {
            null;
        }
        return $data;
    }

    public function clear_string($data = null)
    {
        if (!empty($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = str_ireplace("<script>", "", $data);
            $data = str_ireplace("</script>", "", $data);
            $data = str_ireplace("<script src", "", $data);
            $data = str_ireplace("<script type=", "", $data);
            $data = str_ireplace("SELECT * FROM", "", $data);
            $data = str_ireplace("DELETE FROM", "", $data);
            $data = str_ireplace("INSERT INTO", "", $data);
            $data = str_ireplace("--", "", $data);
            $data = str_ireplace("^", "", $data);
            $data = str_ireplace("[", "", $data);
            $data = str_ireplace("]", "", $data);
            $data = str_ireplace("==", "", $data);
            return $data;
        } else {
            return null;
        }
    }
}
