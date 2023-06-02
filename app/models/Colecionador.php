<?php

namespace models;

class Colecionador extends Model {

    protected $table = "colecionadores";
    #nao esqueça da ID
    protected $fields = ["id","artista_id","obra_id"];
   
}