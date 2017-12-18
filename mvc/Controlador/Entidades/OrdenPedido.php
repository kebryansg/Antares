<?php

include_once 'ModelSQL.php';

class OrdenPedido extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
    public $IDArea;
    public $IDUsuario;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "PEN";
        $this->IDUsuario = "1"; // Defecto
        $this->tabla = "OrdenPedido";
    }
}
