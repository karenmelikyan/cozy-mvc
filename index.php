<?php 
 /** include class downloader */
 require __DIR__ . '/app/autoload.php';

 /** to define controller & action for home page */
 (new Router('SiteController', 'actionIndex'))->run();
