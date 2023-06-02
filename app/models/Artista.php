<?php

namespace models;

class Artista extends Model {

    protected $table = "artistas";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento"];
    
    
    
}

