<?php 

require_once 'setup/config.php';        //VARIABLES GLOBALES
require_once 'lib/database.php';        //CLASE QUE CONECTA LA APLICACION CON LA BASE DE DATOS
require_once 'lib/controller.php';      //CLASE PADRE 'Controller'
require_once 'lib/model.php';           //CLASE PADRE 'Model'
require_once 'lib/view.php';            //CLASE PADRE 'View'
require_once 'lib/app.php';             //CLASE PRINCIPAL QUE CONTROLA TODA LA APLICACIÓN

new App();
