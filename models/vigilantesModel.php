<?php

include_once 'models/class/vehiculo.php';


class vigilantesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_vehiculo($data = null)
    {
        $query = $this->db->connect()->prepare("
            SELECT
                PLACA, 
                MODELO
            FROM
                VEHICULO
            WHERE
                PLACA = :placa
        ");

        try {
            $query->execute(['placa' => $data]);

            if ($query->rowCount() > 0) {
                $row = $query->fetch();
                return ['PLACA' => $row['PLACA'], 'MODELO' => $row['MODELO']];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function no_ha_salido($data = null)
    {
        $query = $this->db->connect()->prepare(
            '
            SELECT
                *
            FROM
                REGISTRO
            WHERE
                PLACA = :placa AND FECHA_SAL = "-"
            '
        );

        try {
            $query->execute(['placa' => $data]);

            if ($query->rowCount() > 0) {
                $row = $query->fetch();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function get_vehiculo_in_park($data = null)
    {
        $query = $this->db->connect()->prepare("
            SELECT
                PLACA, 
                MODELO
            FROM
                REGISTRO
            WHERE
                    PLACA = :placa
                AND
                    FECHA_SAL = '-'
        ");

        try {
            $query->execute(['placa' => $data]);

            if ($query->rowCount() > 0) {
                $row = $query->fetch();
                return ['PLACA' => $row['PLACA'], 'MODELO' => $row['MODELO']];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    function save_entry($data = null)
    {

        $query = $this->db->connect()->prepare(
            '
            INSERT INTO 
                REGISTRO(PLACA, MODELO, FECHA_ENT, FECHA_SAL)
                VALUES(:placa, :modelo, CURRENT_TIMESTAMP(), "-")'
        );

        try {
            $query->execute(
                [
                    'placa'     => strtoupper($data['PLACA']),
                    'modelo'    => strtoupper($data['MODELO']),
                ]
            );

            return true;
        } catch (PDOException $e) {
            #echo $e->getMessage();
            return null;
        }
    }


    function save_moveon($data = null)
    {
        $query = $this->db->connect()->prepare(
            '
            UPDATE
                REGISTRO
            SET
                FECHA_SAL = CURRENT_TIMESTAMP()
            WHERE
                PLACA = :placa'
        );

        try {
            $query->execute(
                [
                    'placa'     => strtoupper($data['PLACA'])
                ]
            );

            return true;
        } catch (PDOException $e) {
            #echo $e->getMessage();
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
}
