<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Child extends ORM
{
    public function get_for_dropdown(){
        return $this->find_all()->as_array('id', 'name');
    }
    
    
}