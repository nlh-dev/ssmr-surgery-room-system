<?php

    spl_autoload_register(function ($class){
        $autoLoad = __DIR__."/".$class.".php";
        $autoLoad = str_replace("\\", "/", $autoLoad);

        if (is_file($autoLoad)) {
            require_once $autoLoad;
        }
    })


?>