<?php

namespace models;

class Artista extends Model {

    protected $table = "artista";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento"];
    
    
    
}

