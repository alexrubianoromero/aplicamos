<?php
$raiz =  dirname(dirname(dirname(__file__)));
// die('raizcontroller'.$raiz);
class limpiarErrorController
{
    public function __construct()
    {
        // echo 'controlador ';
        $this->listarDirectorio('./');
    }



    function listarDirectorio($ruta) {
        if (is_dir($ruta)) {
            $archivos = scandir($ruta);
            echo "<ul>";
            foreach ($archivos as $archivo) {
                if ($archivo != "." && $archivo != "..") {
                    echo "<li>$archivo</li>";
                    //////////
                    $this->listarDirectorio($archivo);

                    ////////////
                }
            }
            echo "</ul>";
        } else {
            // echo "El directorio no existe.";
            $this->buscarErrorLogyBorrar($ruta);

        }
    }


    public function buscarErrorLogyBorrar($ruta)
    {
        if($ruta == 'error_log'){
            echo 'este es un error log...';
            unlink('error_log');
        }
    }


    public function listarDirectoriosAnte()
    {
        // echo 'listar directorios';

        $arrFiles = scandir('/path/to/directory');
         echo '<pre>'; 
            print_r($arrFiles); 
            echo'</pre>';
            die(); 
            // $arrFiles = array();
            // $handle = opendir('/path/to/directory');
            // if ($handle) {
            //     while (($entry = readdir($handle)) !== FALSE) {
            //         $arrFiles[] = $entry;
            //     }
            // }
            // closedir($handle);
     } 
}
$controllerClase = new limpiarErrorController();
?>