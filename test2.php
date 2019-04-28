<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

class PC{
	public static $name = 'Mac';
}

$a = new PC();

echo PC::$name;