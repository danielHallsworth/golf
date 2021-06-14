<?php

namespace User\Model;

class User
{

    public $id;
    public $first_name;
    public $last_name;

    public function exchangeArray(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->first_name = $data["first_name"] ?? null;
        $this->last_name = $data["last_name"] ?? null;
    }
}