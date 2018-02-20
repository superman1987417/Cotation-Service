<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->getModel()->find($id);
        return ($result instanceof Collection) ? $result->first() : $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll()
    {
        return $this->getModel()->all();
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function create(array $options)
    {
        return $this->getModel()->create($options);
    }

    /**
     * @param array $options
     * @param $id
     * @return mixed
     */
    public function update(array $options, $id)
    {
        return $this->find($id)->update($options);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function firstOrCreate(array $data)
    {
        return $this->getModel()->firstOrCreate($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public abstract function getModel();

}