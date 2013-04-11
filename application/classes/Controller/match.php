<?php defined('SYSPATH') OR die('No Direct Script Access');
class Controller_Match extends Controller_DarkDOTA {
    public function action_index() {
        $view = View::factory('frame');
        $view->post = array(
            'sub' => $this->request->param('controller', 'match'),
            'matchID' => $this->request->param('param', null)
        );
        
        $this->response->body($view);
    }
}
?>