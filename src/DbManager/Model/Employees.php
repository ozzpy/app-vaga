<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/11/18
 * Time: 12:45 PM
 */

namespace DbManager\Model;


class Employees
{

    public $id;
    public $name;
    public $age;
    public $role;
    public $hiring_date;
    public $company;

    public function exchangeArray($data)
    {
        $this->id          = !empty($data['id'])          ? $data['id']          : null;
        $this->name        = !empty($data['name'])        ? $data['name']        : null;
        $this->age         = !empty($data['age'])         ? $data['age']         : null;
        $this->role        = !empty($data['role'])        ? $data['role']        : null;
        $this->hiring_date = !empty($data['hiring_date']) ? $data['hiring_date'] : null;
        $this->company     = !empty($data['company'])     ? $data['company']     : null;

    }

}