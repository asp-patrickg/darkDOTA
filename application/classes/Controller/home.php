<?php defined('SYSPATH') OR die('No Direct Script Access');
class Controller_Home extends Controller_DarkDOTA {
    public function action_index() {
        $view = View::factory('frame');
        $view->post = array(
            'sub' => $this->request->param('controller', 'home')
        );
        
        $this->response->body($view);
    }
}
?>