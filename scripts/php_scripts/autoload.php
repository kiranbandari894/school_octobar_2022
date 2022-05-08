<?php
spl_autoload_register('my_autoloader');
function my_autoloader($class) {
    include '../../scripts/php/'. $class . '.php';
}

?>
