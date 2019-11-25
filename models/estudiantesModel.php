<?php

include_once 'models/class/vehiculo.php';


class estudiantesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    function placa_existe($data = null){
        $query = $this->db->connect()->prepare("
            SELECT
                PLACA
            FROM
                VEHICULO
            WHERE
                PLACA = :placa
            LIMIT 1    
        ");

        try {
            $query->execute(['placa' => $data]);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }


    function create_vehiculo($data = null){
        $query = $this->db->connect()->prepare(
            '
            INSERT INTO VEHICULO(
                PLACA,
                MODELO,
                ID)
            VALUES(:placa, :modelo, :id)'
        );

        try {
            $query->execute(
                [
                    'placa'     => strtoupper($data['PLACA']),
                    'modelo'    => strtoupper($data['MODELO']),
                    'id'        => $data['DUENO']
                ]
            );

            return true;
        } catch (PDOException $e) {
            #echo $e->getMessage();
            return null;
        }
    }

    function update_vehiculo($data = null){
        $query = $this->db->connect()->prepare(
            '
            UPDATE
                VEHICULO
            SET
                MODELO = :modelo
            WHERE
                PLACA = :placa'
        );

        try {
            $query->execute(
                [
                    'placa'     => strtoupper($data['PLACA']),
                    'modelo'    => strtoupper($data['MODELO'])
                ]
            );

            return true;
        } catch (PDOException $e) {
            #echo $e->getMessage();
            return null;
        }
    }

    public function delete_vehiculo($data = null){
        $query = $this->db->connect()->prepare(
            '
            DELETE
            FROM
                VEHICULO
            WHERE
                PLACA = :placa'
        );

        try {
            $query->execute(['placa' => $data]);
            return true;
        } catch (PDOException $e) {
            #echo $e->getMessage();
            return null;
        }
    }


    function get_vehiculos($data = null){
        $vehiculos = [];
        $query = $this->db->connect()->prepare(
            "
            SELECT
                *
            FROM
                VEHICULO
            WHERE
                ID = :id
            "
        );

        try {
            $query->execute(['id' => $data]);

            if ($query->RowCount() > 0) {
                while ($row = $query->fetch()) {
                    $veh = new Vehiculo();
                    $veh->placa = $row['PLACA'];
                    $veh->modelo = $row['MODELO'];
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
