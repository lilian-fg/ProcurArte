<?php

namespace models;

class Obra extends Model {
    
    protected $table = "obras";
    #nao esqueça da ID
    protected $fields = ["id","nome","modelo_id","editora","ano"];

    public function findById($id){
        $sql = "SELECT obras.*, modelos.modelo AS modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = obras.modelo_id "
                ." WHERE obras.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT obras.*, modelos.modelo as modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = obras.modelo_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }


    public function getColecionadores($idObra){
        $sql = "SELECT * FROM artistas
            INNER JOIN colecionadores ON
                artistas.id = colecionadores.artista_id
            WHERE colecionadores.obra_id = :idObra";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idObra' => $idObra]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }




    
}
