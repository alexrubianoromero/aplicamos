<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(__file__);
 require_once($raiz.'/controllers/diagnosticoEbApController.php');  
 $diagnosticoEbApController = new diagnosticoEbApController();
?>