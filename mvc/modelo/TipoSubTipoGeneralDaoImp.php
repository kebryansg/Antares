<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/TipoSubTipoGeneral.php';

class TipoSubTipoGeneralDaoImp {
    public static function save($tipoSubTipo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($tipoSubTipo->ID == 0) {
            $sql = $tipoSubTipo->Insert();
        } else {
            $sql = $tipoSubTipo->Update();
        }
        if ($conn->query($sql)) {
            if ($tipoSubTipo->ID == 0) {
                $tipoSubTipo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listTipoSubTipo($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewtipoSubTipo $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($tipoSubTipo) {
        $conn = (new C_MySQL())->open();
        $sql = $tipoSubTipo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
