<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(__file__);
 require_once($raiz.'/controllers/diagnosticoEbApController.php');  
// require_once($raiz.'/controllers/controllerPrueba.php');  
// die('por aqui');
 $diagnosticoEbApController = new diagnosticoEbApController();
//  $diagnosticoEbApController = new controllerPrueba();

?>