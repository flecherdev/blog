<?php

namespace app\models;

//Permite relacionar las tablas con el modelo de objetos
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model{

    protected $table = 'blog-posts';
    protected $fillable = ['title', 'content','img_url'];
}