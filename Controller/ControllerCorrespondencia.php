<?php

require_once __DIR__.'/../Model/Correspondencia.php';
require_once __DIR__.'/../Controller/ValidarDados.php';

class ControllerCorrespondencia
{
    public function index()
    {
        $correspondencia = new Correspondencia();
        $data = $correspondencia->todosRegistros();
        echo json_encode($data);
    }

    public function create($data)
    {
        if (ValidarDados::validar($data)) {
            $correspondencia = new Correspondencia();
            $dados = $correspondencia->adicionarRegistro($data);
            echo json_encode($dados);
        } else {
            echo json_encode(ValidarDados::validar($data));
        }    
    }

    public function show($id)
    {   
        $correspondencia = new Correspondencia();
        $data = $correspondencia->unicoRegistro($id);
        echo json_encode($data);
    }

    public function edit($data)
    {
        if (ValidarDados::validar($data)) {
            $correspondencia = new Correspondencia();
            $dados= $correspondencia->atualizarRegistro($data);
            echo json_encode($dados);
        } else {
            echo json_encode(ValidarDados::validar($data));
        }  
    }

    public function destroy($data)
    {
        $idCorrespondencia = filter_var($data['id'],FILTER_VALIDATE_INT);
        $correspondencia = new Correspondencia();
        $data = $correspondencia->excluirRegistro($idCorrespondencia);
        echo json_encode($data);
    }
}