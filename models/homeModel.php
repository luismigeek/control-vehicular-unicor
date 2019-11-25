<?php

/**
 * Incluimos la clase 'persona' con el objetivo de 
 * crear objetos de tipo persona y pasar los mismo 
 * por parametro de una forma más organizada
 */

/**
 * La clase 'homeModel' es el modelo correspondiente 
 * al controlador 'home', las funciones que aquí se encuentran
 * en su gran mayoría son para interactual con la base de datos
 */
class homeModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Funcion que recibe los datos enviados desde el controlador 
     * 'home' y verifica su existencia en la base de datos, de ser
     * correctos retorna un arreglo con toda la información de la 
     * persona para un posterior inicio de sesion
     */
    function autenticar($data)
    {

        $query = $this->db->connect()->prepare("
            SELECT
                CONCAT(PE.NOMBRES, ' ', PE.APELLIDOS) AS 'USUARIO',
                PE.OCUPACION AS 'ROL',
                HASH,
                PE.ID AS 'ID'
            FROM
                AUTENTICACION AS AU
            INNER JOIN 
                PERSONA AS PE
            ON
                AU.ID = PE.ID
            WHERE 
                AU.USUARIO = :username");

        try {

            $query->execute(
                [
                    'username' => $data['username']
                ]
            );

            if ($query->rowCount() == 1) {

                $row = $query->fetch();

                $id =   $row['ID'];
                $usuario = $row['USUARIO'];
                $rol = $row['ROL'];
                $hash = $row['HASH'];

                /**
                 * La funcion 'password_verify' verifica que una cadena de 
                 * texto corresponda a un respectivo hash
                 */
                if (password_verify($data['password'], $hash)) {
                    return ['USUARIO' => $usuario, 'ROL' => $rol, 'ID'=>$id];
                } else {
                    return null;
                }
            } else
                return null;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Funcion que crea una sesion a partir de unos datos que 
     * recibe por parametro
     */
    function iniciarsesion($data)
    {
        session_start();
        $_SESSION['USUARIO'] = $data['USUARIO'];
        $_SESSION['ID'] = $data['ID'];
        $_SESSION['ROL'] = $data['ROL'];
        $_SESSION['URL'] = URL . $data['ROL'] . 's';
    }

    /**
     * Funcion que destruye una sesion activa
     */
    function cerrarsesion()
    {
        session_start();
        session_destroy();
    }

    function username_exist($data = null)
    {
        return false;
    }

    function email_exist($data = null)
    {

        $query = $this->db->connect()->prepare("
            SELECT * FROM PERSONA WHERE CORREO =:email LIMIT 1");

        try {

            $query->execute(['email' => $data['email']]);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function get_userdata($data = null)
    {

        $query = $this->db->connect()->prepare(
            "
            SELECT
                CONCAT(NOMBRES, ' ',APELLIDOS) AS 'USUARIO',
                ID
            FROM
                PERSONA
            WHERE 
                CORREO = :email"
        );

        try {
            $query->execute(['email' => $data['email']]);

            if ($query->RowCount() == 1) {
                $row = $query->fetch();

                return ['user' => $row['USUARIO'], 'id' => $row['ID']];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function set_code_database($data = null)
    {
        $query = $this->db->connect()->prepare("UPDATE AUTENTICACION SET CODIGOVERIFICACION = :code, OLVIDOCONTRASENA=1 WHERE ID=:id");

        try {
            $query->execute(['code' => $data['code'], 'id' => $data['id']]);
        } catch (PDOException $e) {
            return null;
        }
    }

    function create_persona($data)
    {

        $query = $this->db->connect()->prepare(
            '
            INSERT INTO PERSONA(
                ID,
                NOMBRES,
                APELLIDOS,
                CORREO,
                OCUPACION
            ) 
            VALUES (:dni,:firstnames,:lastnames,:email,:ocupation)'
        );

        try {
            $query->execute(
                [
                    'dni'       => $data['dni'],
                    'firstnames' => $data['firstnames'],
                    'lastnames' => $data['lastnames'],
                    'email'     => $data['email'],
                    'ocupation' => $data['ocupation']
                ]
            );

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function create_auth($data)
    {

        $query = $this->db->connect()->prepare(
            'INSERT INTO AUTENTICACION(ID,USUARIO,HASH) VALUES (:dni,:user,:hash)'
        );

        try {
            $query->execute(
                [
                    'dni'       => $data['dni'],
                    'user'      => $data['user'],
                    'hash'  => $data['hash']
                ]
            );

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function code_verification($data = null)
    {
        $query = $this->db->connect()->prepare(
            "SELECT 
                OLVIDOCONTRASENA 
            FROM 
                AUTENTICACION 
            WHERE ID =:id AND CODIGOVERIFICACION =:code 
            LIMIT 1"
        );

        try {
            $query->execute(['id' => $data['id'], 'code' => $data['code']]);
            $num = $query->rowCount();

            if ($num > 0) {

                $row = $query->fetch();
                return $row['OLVIDOCONTRASENA'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function cambiar_contrasena($data = null)
    {
        $query = $this->db->connect()->prepare(
            "UPDATE 
                AUTENTICACION 
            SET 
                HASH = :hash, 
                CODIGOVERIFICACION='', 
                OLVIDOCONTRASENA=0 
            WHERE 
                id = :id"
        );

        if ($query->execute(['hash' => $data['new_hash'], 'id' => $data['id']])) {
            return true;
        } else {
            return false;
        }
    }
}
