<?php

  header("Content-Type: application/json");
  include_once("../model/cliente.php");
  switch($_SERVER['REQUEST_METHOD']) { 
    case 'POST':
      $_POST = json_decode(file_get_contents('php://input'),true);
      $cliente = new Cliente($_POST["nombre"],$_POST["apellido"],intval($_POST["edad"]));
      $cliente->agregarCliente();
      $resultado["mensaje"] = "Cliente guardado : " . json_encode($_POST);
      echo json_encode($resultado);
      break;
    case 'GET':
      if(isset($_GET['id'])){
        Cliente::buscarCliente($_GET['id']);
      }
      else{
        Cliente::listarCliente();
      }
      break;
    case 'PUT':
      $_PUT = json_decode(file_get_contents('php://input'),true);
      $cliente = new Cliente($_PUT['nombre'],$_PUT['apellido'],intval($_PUT['edad']));
      $cliente->editarCliente($_GET['id']);
      $resultado["mensaje"] = "Cliente Actualizado : ".$_GET['id']. ", Informacion : ".json_encode($_PUT);
      echo json_encode($resultado);
      break;
    case 'DELETE':
        Cliente::eliminarCliente($_GET["id"]);
        $resultado["mensaje"] = "Cliente Eliminado ".$_GET["id"];
        echo json_encode($resultado);
      break;
  }
?>