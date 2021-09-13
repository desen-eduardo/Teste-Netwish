<?php

require __DIR__.'/../config/config.inc.php';

class Correspondencia
{   
    private $pdo;

    public function __construct()
    {   
        try{
            $this->pdo = new PDO("mysql:dbname=".BANCO.";host=".HOST,USUARIO,SENHA,array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch(PDOException $e) {
            throw new \Exception("Houve problema de conexão ".$e->getMessage());
        }
    }

    public function todosRegistros(): ?array
    {
        $sql = "SELECT 
            id_correspondencia AS id,
            date_create, 
            data_envio AS data,
            nome_empresa AS empresa,
            a_c AS ac,
            cep,
            codigo_rastreio AS codigo,
            pessoa_responsavel AS pessoa
            FROM correspondencia";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarRegistro(array $data): bool
    {   
        $dateCreate = new DateTime(null,new DateTimeZone('America/Sao_paulo'));
        $sql = "INSERT INTO correspondencia (
            nome_empresa,
            a_c,
            cep,
            logradouro,
            cidade,
            numero,
            estado,
            complemento,
            pessoa_responsavel,
            tipo,
            ar,
            data_envio,
            codigo_rastreio,
            usuario,
            date_create
        ) VALUES (
            :nomeEmpresa,
            :acDestinatario,
            :cep,
            :logradouro,
            :cidade,
            :numero,
            :estado,
            :complemento,
            :pessoaResponsavel,
            :tipo,
            :ar,
            :dataEnvio,
            :codigoRastreio,
            :usuario,
            :dateCreate
        )";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":nomeEmpresa",htmlentities($data['nomeEmpresa']));
        $query->bindValue(":acDestinatario",htmlentities($data['acDestinatario']));
        $query->bindValue(":cep",htmlentities($data['cep']));
        $query->bindValue(":logradouro",htmlentities($data['logradouro']));
        $query->bindValue(":cidade",htmlentities($data['cidade']));
        $query->bindValue(":numero",htmlentities($data['numero']));
        $query->bindValue(":estado",htmlentities($data['estado']));
        $query->bindValue(":complemento",htmlentities($data['complemento']));
        $query->bindValue(":pessoaResponsavel",htmlentities($data['pessoaResponsavel']));
        $query->bindValue(":tipo",htmlentities($data['tipo']));
        $query->bindValue(":ar",htmlentities($data['ar']));
        $query->bindValue(":dataEnvio",htmlentities($data['dataEnvio']));
        $query->bindValue(":codigoRastreio",htmlentities($data['codigoRastreio']));
        $query->bindValue(":usuario",htmlentities($data['usuario']));
        $query->bindValue(":dateCreate",$dateCreate->format("Y-m-d H:i:s"));
        return $query->execute();
    }
    
    public function unicoRegistro(int $id): ?object
    {
        $sql = "SELECT * FROM correspondencia WHERE id_correspondencia = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    public function atualizarRegistro(array $data): bool
    {   
        $dateUpdate = new DateTime(null,new DateTimeZone('America/Sao_paulo'));
        $sql = "UPDATE correspondencia SET 
            nome_empresa = :nomeEmpresa,
            a_c = :acDestinatario,
            cep = :cep,
            logradouro = :logradouro,
            cidade = :cidade,
            numero = :numero,
            estado = :estado,
            complemento = :complemento,
            pessoa_responsavel = :pessoaResponsavel,
            tipo = :tipo,
            ar = :ar,
            data_envio = :dataEnvio,
            codigo_rastreio = :codigoRastreio,
            usuario = :usuario,
            date_update = :dateUpdate
        WHERE id_correspondencia = :id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":nomeEmpresa",htmlentities($data["nomeEmpresa"]));
        $query->bindValue(":acDestinatario",htmlentities($data["acDestinatario"]));
        $query->bindValue(":cep",htmlentities($data["cep"]));
        $query->bindValue(":logradouro",htmlentities($data["logradouro"]));
        $query->bindValue(":cidade",htmlentities($data["cidade"]));
        $query->bindValue(":numero",htmlentities($data["numero"]));
        $query->bindValue(":estado",htmlentities($data["estado"]));
        $query->bindValue(":complemento",htmlentities($data["complemento"]));
        $query->bindValue(":pessoaResponsavel",htmlentities($data["pessoaResponsavel"]));
        $query->bindValue(":tipo",htmlentities($data["tipo"]));
        $query->bindValue(":ar",htmlentities($data["ar"]));
        $query->bindValue(":dataEnvio",htmlentities($data["dataEnvio"]));
        $query->bindValue(":codigoRastreio",htmlentities($data["codigoRastreio"]));
        $query->bindValue(":usuario",htmlentities($data["usuario"]));
        $query->bindValue(":dateUpdate",$dateUpdate->format("Y-m-d H:i:s"));
        $query->bindValue(":id",htmlentities($data["id"]));
        return $query->execute();
    }

    public function excluirRegistro(int $id): bool
    {
        $sql = "DELETE FROM correspondencia WHERE id_correspondencia = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        return $query->execute();
    }
}