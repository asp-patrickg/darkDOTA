<?php defined('SYSPATH') OR die('No Direct Script Access');
class Controller_DarkDOTA extends Controller_Template {
    var $template = null;
    var $userInfo = null;
    var $session = null;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        
        $this->template = $this->template;
        $this->session = Session::instance();
        $this->auto_render = false;
    }
}
?>
