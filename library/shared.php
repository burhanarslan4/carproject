<?php

/** Check if environment is development and display errors **/
//echo "Shared basındayım";
function setReporting() {
   // echo "reporting e girdim";

if (DEVELOPMENT_ENVIRONMENT == true) {
    //echo "ilk ife girdim";
	error_reporting(E_ALL);


	ini_set('display_errors','On');
} else {
    //echo "ilk else  girdim";
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');

}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
    //echo "Stripsplashe girdim";
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes()
{
    if ( in_array( strtolower( ini_get( 'magic_quotes_gpc' ) ), array( '1', 'on' ) ) )
    {
        $_POST = array_map( 'stripslashes', $_POST );
        $_GET = array_map( 'stripslashes', $_GET );
        $_COOKIE = array_map( 'stripslashes', $_COOKIE );
    }
}
/*function removeMagicQuotes() {
    echo "magicqutoes a girdim";
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}
*/
/** Check register globals and remove them **/

function unregisterGlobals() {
    //echo "unregisterglobals a girdim";
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {

   // echo "callHooka girdim";
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);
    //print_r ($urlArray);

    // ıtems/viewall/1
	$controller = $urlArray[0]; //ıtems
	array_shift($urlArray);
	$action = $urlArray[0]; //viewall
	array_shift($urlArray);
	$queryString = $urlArray; //1
   // echo $controller; //cars
    //echo $action;   //addcar
    //print_r($queryString); // 0


	$controllerName = $controller; //cars
	$controller = ucwords($controller); //Cars
	$model = rtrim($controller, 's');//Car
	$controller .= 'Controller';
	$dispatch = new $controller($model,$controllerName,$action);


    if ((int)method_exists($controller, $action)) {
       // echo"burdayım";
        call_user_func_array(array($dispatch,$action),$queryString);
    } else {
        //echo"burda değilim";
        /* Error Generation Code Here */
    }
}

/** Autoload any classes that are required **/

spl_autoload_register(function($className) {
   // echo "autoload register a girdim";

	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
	}
});
//echo "fonksiyonları cagırmaya geldim<br>";
setReporting();
//echo "setreportinge girdim<br>";
//removeMagicQuotes();
//echo "removeMagicquotese girdim<br>";
unregisterGlobals();
//echo "unregisterglobalsa girdim<br>";
callHook();
//echo "callhook fonksiyonunu cagırdım girdim<br>";

