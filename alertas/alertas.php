<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(dirname(__file__));
//  die($raiz);
 require_once($raiz.'/alertas/controllers/alertasController.php');  
 $alertasController = new alertasController();

?>