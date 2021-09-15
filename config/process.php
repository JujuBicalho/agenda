<?php

//Aqui acontece todo o processo com o banco: inserir, atualizar,deletar e lê
session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//Modificações no banco
if(!empty($data)) {

  //--para mostrar em array se o contato foi criado--     print_r($data); exit;

  //CRIAR CONTATO//
  if($data["type"] === "create") { //criando os dados

    $name = $data["name"];
    $phone = $data["phone"];
    $observations = $data["observations"];

    $query = "INSERT INTO contacts (name,phone,observations) VALUES (:name,:phone,:observations)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observations", $observations);

    try {

      $stmt->execute();
      $_SESSION["msg"] = "Contato criado com sucesso!";
  
  }catch(PDOException $e) {
  //Aqui vai mostrar o erro
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  
  //EDITANDO CONTATO//
  }else if($data["type"] === "edit") { //editando os dados

    $name = $data["name"];
    $phone = $data["phone"];
    $observations = $data["observations"];
    $id = $data["id"];

    $query = "UPDATE contacts
              SET name = :name, phone = :phone, observations = :observations
              WHERE id = :id";
    
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":observations",$observations);
    $stmt->bindParam(":id",$id);

    try {

      $stmt->execute();
      $_SESSION["msg"] = "Contato editado com sucesso!";
  
  }catch(PDOException $e) {
  //Aqui vai mostrar o erro
      $error = $e->getMessage();
      echo "Erro: $error";
    }

  //DELETANDO CONTATO//
  }else if($data["type"] === "delete") {

    $id = $data["id"];

    $query = "DELETE from contacts WHERE id = :id";
    
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id",$id);

    try {

      $stmt->execute();
      $_SESSION["msg"] = "Contato excluído com sucesso!";
  
  }catch(PDOException $e) {
  //Aqui vai mostrar o erro
      $error = $e->getMessage();
      echo "Erro: $error";
   }
  }

  //REDIRECIONA PARA A HOME//
  header("Location:" . $BASE_URL . "../index.php");

  //SELEÇÃO DE DADOS//
} else {
  $id;

  if(!empty($_GET)) {
    $id = $_GET["id"];
  }

  //Query que retorna o dado de um contato
  if(!empty($id)) {

      $query = "SELECT * FROM contacts WHERE id = :id";

      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      $contact = $stmt->fetch();

  } else {
      $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);
        $stmt->execute();      
        $contacts = $stmt->fetchAll();
  }
}

//Fechar conexão
$conn = null;






/*//Query que retorna todos os contatos-colocado primeiro para testar-
$contacts = []; //Contatos vazio

$query= "SELECT * FROM contacts";

$stmt = $conn->prepare($query);

$stmt->execute();

$contacts = $stmt->fetchAll();*/