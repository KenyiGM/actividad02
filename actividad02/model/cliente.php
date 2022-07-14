<?php

  class Cliente{

    private $nombre;
    private $apellido;
    private $edad;

    public function __construct($nombre,$apellido,$edad){
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->edad = $edad;   
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function setNombre($nombre){
      $this->nombre = $nombre;
      return $this;
    }

    public function getApellido(){
      return $this->apellido;
    }

    public function setApellido($apellido){
      $this->apellido = $apellido;
      return $this;
    }
    
    public function getEdad(){
      return $this->edad;
    }

    public function setEdad($edad){
      $this->edad = $edad;
      return $this;
    }

    public function __toString(){
      return $this->nombre." ".$this->apellido." ".$this->edad;
    }

    public function agregarCliente(){
      $contenidoArchivo = file_get_contents("../cliente.json");
      $clientes = json_decode($contenidoArchivo, true);
      $clientes[] = array(
        "nombre"=> $this->nombre,
        "apellido"=> $this->apellido,
        "edad"=> $this->edad
      );
      $archivo = fopen("../cliente.json","w");
      fwrite($archivo, json_encode($clientes));
      fclose($archivo);
    }
    public static function buscarCliente($indice){
      $contenidoArchivo = file_get_contents("../cliente.json");
      $clientes = json_decode($contenidoArchivo, true);
      echo json_encode($clientes[$indice]);
    }

    public static function listarCliente(){
      $contenidoArchivo = file_get_contents("../cliente.json");
      echo $contenidoArchivo;
    }
    
    public static function eliminarCliente($indice){
      $contenidoArchivo = file_get_contents("../cliente.json");
      $clientes = json_decode($contenidoArchivo, true);
      array_splice($clientes,$indice,1);
      $archivo = fopen("../cliente.json","w");
      fwrite($archivo, json_encode($clientes));
      fclose($archivo);
    }
    
    public function editarCliente($indice){
      $contenidoArchivo = file_get_contents("../cliente.json");
      $clientes = json_decode($contenidoArchivo, true);
      $cliente = array(
        'nombre'=> $this->nombre,
        'apellido'=> $this->apellido,
        'edad'=> $this->edad
      );
      $clientes[$indice] = $cliente;
      $archivo = fopen("../cliente.json","w");
      fwrite($archivo, json_encode($clientes));
      fclose($archivo);
    }
  }
?>