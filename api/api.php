<?php

require_once __DIR__.'/../Controller/ControllerCorrespondencia.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if (empty($_GET)) {
            $correspondencia = new ControllerCorrespondencia();
            $correspondencia->index();
        } else {
            $correspondencia = new ControllerCorrespondencia();
            $correspondencia->show($_GET['id']);
        }
    break;    

    case 'POST':
        $correspondencia = new ControllerCorrespondencia();
        $correspondencia->create($_POST);
    break;
    
    case 'DELETE':
        parse_str(file_get_contents('php://input'),$data);
        $correspondencia = new ControllerCorrespondencia();
        $correspondencia->destroy($data);
    break;
    
    case 'PUT':
        parse_str(file_get_contents('php://input'),$data);
        $correspondencia = new ControllerCorrespondencia();
        $correspondencia->edit($data);
    break;
}