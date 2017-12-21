<?php

include_once 'ModelSQL.php';

class TipoSubTipoGeneral extends ModelSQL {
    public $tabla;
    public $ID;
    public $IDTipoGeneral;
    public $IDSubTipoGeneral;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "tiposubtipogeneral";
    }
}
