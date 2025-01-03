<?php
		switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
		case '/':
        require 'dashboard.php';
        break;
		case '/dashboard.php':
        require 'dashboard.php'; 
        break;
		case '/qaida.php':
        require 'qaida.php';
		break;
		case '/wordcard.php':
        require 'wordcard.php';
        break;
		case '/wordcard2.php':
        require 'wordcard2.php';
        break;
		case '/ginti.php':
        require 'ginti.php';
        break;
		case '/gk.php':
        require 'gk.php';
        break;
		case '/rung.php':
        require 'rung.php';
        break;
		case '/credits.php':
        require 'credits.php';
        break;
		case '/leftside.php':
        require 'leftside.php';
        break;
		case '/rightside.php':
            require 'rightside.php';
            break;
		case '/about.html':
        require 'about.html';
        break;
            default:
        http_response_code(404);
        exit('Not Found');
}

?>
