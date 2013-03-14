<?php defined('SYSPATH') OR die('No Direct Script Access');
class Controller_Login extends Controller_DarkDOTA {
    public function action_index() {
        $view = View::factory('frame');
        $view->post = array('sub' => 'login');
        $this->response->body($view);
    }
}
?>