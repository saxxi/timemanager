<?php defined('SYSPATH') or die('No direct script access.');
 
class gen {
    
    // ini AUTH FUNCS
    public static function ob_ini(){ ob_start(); }
    public static function ob_out(){ $content = ob_get_contents(); ob_end_clean(); return $content; }
    // end AUTH FUNCS
    
    public static function set(&$var, $default='')
    {
        return isset($var) ? $var : $default;
    }
    
    public static function dump($msg='', $style='style="background: #EEE; padding: 20px"')
    {
        echo sprintf('<section><br /><pre %s>%s</pre></section>', $style, print_r($msg,true));
    }
    
    public static function get_weeks($year = 0){
        $year = $year!=0 ? $year : date('Y');

        if(!$weeks = Cache::instance()->get('weeks_'.$year, FALSE)){
            
            $weeks = array();
            
            $firstDayOfYear = mktime(0, 0, 0, 1, 1, $year);
            $nextMonday     = strtotime('monday', $firstDayOfYear);
            $nextSunday     = strtotime('sunday', $nextMonday);
            
            while(date('Y', $nextMonday) == $year){
                $weeks[] = array(
                    'monday' => $nextMonday,
                    'sunday' => $nextSunday
                );
                $nextMonday = strtotime('+1 week', $nextMonday);
                $nextSunday = strtotime('+1 week', $nextSunday);
            }
            Cache::instance()->set('weeks_'.$year, $weeks);
        }
        return $weeks;
    }
    
    public static function get_weeks_dd($year = 0){
        if(!$weeks_dd = Cache::instance()->get('weeks_dd_'.$year, FALSE)){
            $weeks_dd = array();
            $weeks = gen::get_weeks($year);
            foreach($weeks as $iweek => $week){
                $id = date('Y').'-'.$iweek; # eg. "2011-41"
                $weeks_dd[$id] = strftime("%a %d %b", $week['monday'])." - ".strftime("%a %d %b", $week['sunday']);
            }
            Cache::instance()->set('weeks_dd_'.$year, $weeks_dd);
        }
        return $weeks_dd;
    }
    
    public static function ajaxdump($els = array()){
        
        $callback = gen::set($_GET['callback']);
        
        if($callback!=''){
            echo sprintf("%s(%s);", $callback,json_encode($els));
        }else{
            echo json_encode($els);
        }
    }
    
    
}