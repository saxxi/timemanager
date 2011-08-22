<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Txtactivity extends ORM
{
    public function ajax_list($startwith = ''){
        return $this->where('desc','like',$startwith.'%')->find_all()->as_array(null, 'desc');
    }
    
    
}