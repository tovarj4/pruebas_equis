<?php
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 29/03/19
 * Time: 05:40 PM
 */

interface Crud
{
    public function create();
    public function update();
    public function delete();
    public function selectSingle();
    public function selectAll();


}