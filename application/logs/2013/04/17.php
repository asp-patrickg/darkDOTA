<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-17 20:23:58 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Helpers\dota.php [ 509 ] in C:\xampp\htdocs\darkdota\application\classes\Helpers\dota.php:509
2013-04-17 20:23:58 --- DEBUG: #0 C:\xampp\htdocs\darkdota\application\classes\Helpers\dota.php(509): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\xampp\htdocs...', 509, Array)
#1 C:\xampp\htdocs\darkdota\application\classes\Helpers\util.php(210): Helpers_Dota::getItemImage(180)
#2 C:\xampp\htdocs\darkdota\application\classes\Dota\match.php(143): Helpers_Util::getMatchTable(Array, Array)
#3 C:\xampp\htdocs\darkdota\application\views\sub\match.php(18): Dota_Match->getMatchTable()
#4 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(61): include('C:\xampp\htdocs...')
#5 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\xampp\htdocs...', Array)
#6 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(228): Kohana_View->render()
#7 C:\xampp\htdocs\darkdota\application\views\frame.php(44): Kohana_View->__toString()
#8 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(61): include('C:\xampp\htdocs...')
#9 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\xampp\htdocs...', Array)
#10 C:\xampp\htdocs\darkdota\system\classes\Kohana\View.php(228): Kohana_View->render()
#11 C:\xampp\htdocs\darkdota\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#12 C:\xampp\htdocs\darkdota\application\classes\Controller\match.php(10): Kohana_Response->body(Object(View))
#13 C:\xampp\htdocs\darkdota\system\classes\Kohana\Controller.php(84): Controller_Match->action_index()
#14 [internal function]: Kohana_Controller->execute()
#15 C:\xampp\htdocs\darkdota\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Match))
#16 C:\xampp\htdocs\darkdota\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 C:\xampp\htdocs\darkdota\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#18 C:\xampp\htdocs\darkdota\index.php(118): Kohana_Request->execute()
#19 {main} in C:\xampp\htdocs\darkdota\application\classes\Helpers\dota.php:509