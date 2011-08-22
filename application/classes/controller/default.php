<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Default extends Controller_Template {

    public $template = 'admin/template';

    // Routes
    protected $media;
    protected $api;
    protected $guide;
    
    public function before(){
        if ($this->request->action() === 'media')
        {
            // Do not template media files
            $this->auto_render = FALSE;
        }
        else
        {
            // Grab the necessary routes
            $this->assets = Route::get('assets/media');
        }

        parent::before();
    }
    
    public function action_index(){
        $this->template->content = 'Default controller';
    }
    
    public function action_media()
    {
        // Get the file path from the request
        $file = $this->request->param('file');

        // Find the file extension
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        // Remove the extension from the filename
        $file = substr($file, 0, -(strlen($ext) + 1));

        if ($file = Kohana::find_file('media/guide', $file, $ext))
        {
            // Check if the browser sent an "if-none-match: <etag>" header, and tell if the file hasn't changed
            $this->response->check_cache(sha1($this->request->uri()).filemtime($file), $this->request);
            
            // Send the file content as the response
            $this->response->body(file_get_contents($file));

            // Set the proper headers to allow caching
            $this->response->headers('content-type',  File::mime_by_ext($ext));
            $this->response->headers('last-modified', date('r', filemtime($file)));
        }
        else
        {
            // Return a 404 status
            $this->response->status(404);
        }
    }

    public function after()
    {
        if ($this->auto_render)
        {
            // Get the media route
            $media = Route::get('docs/media');

            // Add styles
            $this->template->styles = array(
                $media->uri(array('file' => 'css/print.css'))  => 'print',
                $media->uri(array('file' => 'css/screen.css')) => 'screen',
                $media->uri(array('file' => 'css/kodoc.css'))  => 'screen',
                $media->uri(array('file' => 'css/shCore.css')) => 'screen',
                $media->uri(array('file' => 'css/shThemeKodoc.css')) => 'screen',
            );

            // Add scripts
            $this->template->scripts = array(
                $media->uri(array('file' => 'js/jquery.min.js')),
                $media->uri(array('file' => 'js/jquery.cookie.js')),
                $media->uri(array('file' => 'js/kodoc.js')),
                // Syntax Highlighter
                $media->uri(array('file' => 'js/shCore.js')),
                $media->uri(array('file' => 'js/shBrushPhp.js')),
            );

            // Add languages
            $this->template->translations = Kohana::message('userguide', 'translations');
        }

        return parent::after();
    }
    
}