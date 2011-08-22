<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Educator extends ORM
{
    public function get_for_dropdown($startwith = ''){
        return $this->find_all()->as_array('id', 'name');
    }
    
    
}