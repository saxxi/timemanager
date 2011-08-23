<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {
    
    public $template = 'admin/template';
    
    public function before(){
        parent::before();
        
        $this->template->appconf = array(
            'url_base' => url::base(),
            'l' => substr(I18n::$lang, 0, 2),
        );
        
        $this->template->activepage = null;
        
        $this->template->main_menu = array(
            'educator_timings' => array(
                'title' => 'Orario Educatori',
                'url' => 'admin/educator_timings'
            ),
            'activity_timings' => array(
                'title' => 'Tabellone',
                'url' => 'admin/activity_timings'
            ),
            'children_timings' => array(
                'title' => 'Orario Ragazzi',
                'url' => 'admin/children_timings'
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
    
    
    
    public function action_educator_timings(){
        $view = View::factory('admin/educator_timings');
        $this->template->title = "Orario educatori";
        $this->template->activepage = 'educator_timings';
        
        $view->educators_dd = ORM::factory('educator')->get_for_dropdown();
        
        $view->eductor_id = $this->request->param('id');
        
        // $about_page = $view->render();
        $this->template->content = $view;
    }
    
    public function action_activity_timings(){
        $view = View::factory('admin/activity_timings');
        
        $view->children_dd = ORM::factory('child')->get_for_dropdown();
        $view->educators_dd = ORM::factory('educator')->get_for_dropdown();
        
        $this->template->title = "Tabellone";
        $this->template->activepage = 'activity_timings';
        $this->template->content = $view;
    }
    
    public function action_children_timings(){
        $view = View::factory('admin/children_timings');
        $this->template->title = "Orario ragazzi";
        $this->template->activepage = 'children_timings';
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