<?php

    require 'app/Config.php';
    require 'app/Controller.php';
	require 'app/Router.php';
	
	spl_autoload_register(function (string $className){
		if(stripos($className, 'Controller')){
			require 'controllers/' . $className . '.php';
		}elseif(stripos($className, 'Model')){
			require 'models/' . $className . '.php';
		}
    });
	
