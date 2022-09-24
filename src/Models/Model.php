<?php

namespace Hillel\Models;

use \InvalidArgumentException;

abstract class Model
{
    protected $id;
    protected $name;
    protected $email;

    public function __construct($id, $name, $email) 
    {
        $this->id = $id;   
        $this->name = $name;
        $this->email = $email;  
    }

    //find
    public static function find($id)
    {
        $tableName = strtolower(static::class);
        // SELECT * FROM {table} WHERE id = :id
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id = :' . $id;
        var_dump($sql);
    }

    //delete
    abstract public function delete();

    //create
    abstract public function create();

    //update
    abstract public function update();
}