<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {
    
    public $template = 'admin/template';
    
    public function before(){
        $DAY_NAMES = array(0 => "Lunedì", 1 => "Martedì", 2 => "Mercoledì", 3 => "Giovedì", 4 => "Venerdì", 5 => "Sabato", 6 => "Domenica");
        $DAY_NAMES = array(
            1 => "Gennaio", 2 => "Febbraio", 3 => "Marzo", 4 => "Aprile", 5 => "Maggio", 6 => "Giugno",
            7 => "Luglio", 8 => "Agosto", 9 => "Settembre", 10 => "Ottobre", 11 => "Novembre", 12 => "Dicembre"
        );

        parent::before();
        
        $this->template->activepage = null;
        $this->template->main_menu = array(
            'educators' => array(
                'title' => 'Orario Educatori',
                'url' => 'admin/educators'
            ),
            'timings_table' => array(
                'title' => 'Tabellone',
                'url' => 'admin/timings_table'
            ),
            'children' => array(
                'title' => 'Orario Ragazzi',
                'url' => 'admin/children'
            ),
        );
        
        $media = Route::get('assets/media');
        
        $this->template->title = 'Timetable Manager';
        
        $this->template->styles = array(
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css' => 'screen',
            'assets/blueprint/screen.css' => 'screen',
            'assets/blueprint/print.css' => 'print',
            'assets/admin/main.css' => 'screen',
        );
        
        $this->template->scripts = array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js',
            'assets/admin/main.js',
        );
    }
    
    public function after(){
        
        return parent::after();
    }
    
    
    
    public function action_educators(){
        $view = View::factory('admin/educators');
        $this->template->title = "Orario educatori";
        $this->template->activepage = 'educators';
        
        $view->educators = ORM::factory('educator')->find_all();
        $view->educators_dd = ORM::factory('educator')->get_for_dropdown();
        $view->children_dd = ORM::factory('child')->get_for_dropdown();
        
        // $about_page = $view->render();
        $this->template->content = $view;
    }
    
    public function action_timings_table(){
        $view = View::factory('admin/timings_table');
        $this->template->title = "Tabellone Gruppo A";
        $this->template->activepage = 'timings_table';
        $this->template->content = $view;
    }
    
    public function action_children(){
        $view = View::factory('admin/children');
        $this->template->title = "Orario ragazzi";
        $this->template->activepage = 'children';
        $this->template->content = $view;
    }
    
    public function action_txtactivities(){
        $this->auto_render=false;
        
        $startwith = Arr::get($_GET, 'startwith', '');
        $ret_activities = ORM::factory('txtactivity')->ajax_list($startwith);
        
        $els = array(
            "totalResultsCount" => count($ret_activities),
            "activities" => $ret_activities
        );
        gen::ajaxdump($els);
    }
    
    
    
}