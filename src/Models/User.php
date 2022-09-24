<?php

namespace Hillel\Models;

use \InvalidArgumentException;

use \Hillel\Models\Model;

final class User extends Model
{
    public $id;
    public $name;
    public $email;

    public function __construct($id = '', $name = '', $email = '') 
    { 
        parent::__construct($id, $name, $email);
    }

    //delete
    public function delete()
    {
        $tableName = strtolower(static::class);
        $sql = 'DELETE FROM ' . $tableName . ' WHERE id = : ' . $this->id;
        var_dump($sql);
    }


    //create
    public function create()
    {
        $tableName = strtolower(static::class);
        $data = get_object_vars($this);
        $property = array_keys($data);
        $property2 = array_map(function ($item) {
            return ':' . $item;
        }, $data);
        $sql = 'INSERT ' . $tableName . ' (' . implode(',', $property) . ') VALUES (' . implode(',', $property2) . ')';
        var_dump($sql);
    }

    //update
    public function update()
    {
        $tableName = strtolower(static::class);
        $data = get_object_vars($this);
        $property = array_keys($data);
        $property2 = array_map(function ($item) {
            return ':' . $item;
        }, $data);
        $sql = 'INSERT ' . $tableName . ' (' . implode(',', $property) . ') 
        VALUES (' . implode(',', $property2) . ') WHERE id = :' . $this->id;
        var_dump($sql);
    }

    public function save($id = '')
    {
        if(empty($id))
        {
            $this->id = 'id + 1';
            $this->create();
        } else {
            $this->id = $id;
            $this->update();
        }
    }
}