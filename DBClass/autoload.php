<?php
function __autoload($class){
	require('./class/class.'.strtolower($class).'.php');
}
?>