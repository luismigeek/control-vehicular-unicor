<?php

include_once 'models/class/persona.php';
include_once 'models/class/vehiculo.php';

class administrativosModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_personas(Type $var = null)
    {

        $personas = array();
        $query = $this->db->connect()->prepare(
            "
            SELECT
                PE.ID,
                PE.NOMBRES,
                PE.APELLIDOS,
                AU.USUARIO,
                PE.OCUPACION
            FROM
                PERSONA PE INNER JOIN AUTENTICACION AU 
            ON
                PE.ID = AU.ID"
        );

        try {
            $query->execute();

            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $per = new Persona();

                    $per->ID = $row['ID'];
                    $per->NOMBRES = $row['NOMBRES'];
                    $per->APELLIDOS = $row['APELLIDOS'];
                    $per->USUARIO = $row['USUARIO'];
                    $per->OCUPACION = $row['OCUPACION'];
                    array_push($personas, $per);
                }
                return $personas;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function get_vehiculos(Type $var = null)
    {

        $info_veh = array();
        $query = $this->db->connect()->prepare(
            "
            SELECT
                VE.PLACA AS 'MATRICULA',
                VE.MODELO,
                CONCAT(PE.NOMBRES, ' ', PE.APELLIDOS) AS 'DUENO'
            FROM
                PERSONA PE
                    INNER JOIN 
                VEHICULO VE 
            ON
                PE.ID = VE.ID"
        );

        try {
            $query->execute();

            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $item = array(
                        'MATRICULA' => $row['MATRICULA'],
                        'MODELO'    => $row['MODELO'],
                        'DUENO'     => $row['DUENO']
                    );
                    array_push($info_veh, $item);
                }
                return $info_veh;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function get_vehiculos_in_campus($data = null)
    {

        $vehiculos = [];
        $query = $this->db->connect()->prepare(
            "
            SELECT
                *
            FROM
                REGISTRO
            WHERE
                FECHA_SAL = '-'"
        );

        try {
            $query->execute();
            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $veh = new Vehiculo();
                    $veh->placa = $row['PLACA'];
                    $veh->modelo = $row['MODELO'];
                    $veh->entrada = $row['FECHA_ENT'];
                    array_push($vehiculos, $veh);
                }
                return $vehiculos;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function get_entraronhoy($data = null)
    {

        $vehiculos = [];
        $query = $this->db->connect()->prepare(
            "
            SELECT
                PLACA,
                MODELO,
                FECHA_ENT,
                TIMEDIFF(FECHA_SAL, FECHA_ENT) AS 'TIEMPO'
            FROM
                REGISTRO
            WHERE
                    DAY(FECHA_ENT) = DAY(CURRENT_TIMESTAMP()) 
                AND 
                    MONTH(FECHA_ENT) = MONTH(CURRENT_TIMESTAMP())
                AND 
                    EXTRACT(YEAR_MONTH FROM FECHA_ENT) = EXTRACT(YEAR_MONTH FROM CURRENT_TIMESTAMP())
            "
        );

        try {
            $query->execute();
            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $veh = new Vehiculo();
                    $veh->placa = $row['PLACA'];
                    $veh->modelo = $row['MODELO'];
                    $veh->time = $row['TIEMPO'];
                    array_push($vehiculos, $veh);
                }
                return $vehiculos;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function get_entraronmes($data = null)
    {

        $vehiculos = [];

        $query = $this->db->connect()->prepare(
            "
            SELECT
                PLACA,
                MODELO,
                COUNT(PLACA) AS 'INGRESOS',
                SUM(
                    TIMESTAMPDIFF(HOUR, FECHA_ENT, FECHA_SAL)
                ) AS 'TIEMPOTOTAL'
            FROM
                REGISTRO
            WHERE 
                EXTRACT(YEAR_MONTH FROM FECHA_ENT) = EXTRACT(YEAR_MONTH FROM CURRENT_TIMESTAMP())
            GROUP BY
                PLACA        
                "
        );

        try {
            $query->execute();
            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $veh = new Vehiculo();
                    $veh->placa = $row['PLACA'];
                    $veh->modelo = $row['MODELO'];
                    $veh->ingresos = $row['INGRESOS'];
                    $veh->time = $row['TIEMPOTOTAL'];
                    array_push($vehiculos, $veh);
                }
                return $vehiculos;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function get_entraronhour($data = null)
    {

        $info = [];

        $query = $this->db->connect()->prepare(
            "
            SELECT
                HOUR(FECHA_ENT) AS 'HORA',
                COUNT(HOUR(FECHA_ENT)) AS 'CANT' 
            FROM
                REGISTRO
            GROUP BY
                HOUR(FECHA_ENT)
            ORDER BY
                HOUR(FECHA_ENT) ASC             
            ");

        try {
            $query->execute();
            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $item = array(
                        'HORA'  => $row['HORA'],
                        'CANT'  => $row['CANT']
                    );
                    array_push($info, $item);
                }
                return $info;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function get_historial($data = null){

        $vehiculos = [];
/**
 * SELECT *  FROM REGISTRO
 * WHERE
 * EXTRACT(DAY_HOUR FROM FECHA_ENT) >= EXTRACT(DAY_HOUR FROM :inicio)  
 * AND 
 * EXTRACT(DAY_HOUR FROM FECHA_ENT) <= EXTRACT(DAY_HOUR FROM :final)
 * AND 
 * MONTH(FECHA_ENT) >= MONTH(:inicio)  
 */
     $query = $this->db->connect()->prepare("
        SELECT
        *
        FROM 
            REGISTRO
        WHERE
                    (EXTRACT(DAY_HOUR FROM FECHA_ENT) >= EXTRACT(DAY_HOUR FROM :inicio) 
                AND 
                    EXTRACT(DAY_HOUR FROM FECHA_ENT) <= EXTRACT(DAY_HOUR FROM :final))
            AND 
                    (EXTRACT(YEAR_MONTH FROM FECHA_ENT) >= EXTRACT(YEAR_MONTH FROM :inicio2) 
                AND 
                    EXTRACT(YEAR_MONTH FROM FECHA_ENT) <= EXTRACT(YEAR_MONTH FROM :final2))
        ");

        try {
            $query->execute(['inicio' => $data['inicio'],'final' => $data['final'], 'inicio2'=>$data['inicio'], 'final2'=>$data['final']]);
            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $veh = new Vehiculo();
                    $veh->placa = $row['PLACA'];
                    $veh->modelo = $row['MODELO'];
                    $veh->entrada = $row['FECHA_ENT'];
                    $veh->salida = $row['FECHA_SAL'];
                    array_push($vehiculos, $veh);
                }
                return $vehiculos;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }

    }
}
