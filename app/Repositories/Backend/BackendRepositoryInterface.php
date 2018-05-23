<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:16 SA
 */

namespace App\Repositories\Backend;


interface BackendRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

//
//    public function paginate($perPage = 15, $columns = array('*'));
//
//
//
//    public function findBy($field, $value, $columns = array('*'));
}