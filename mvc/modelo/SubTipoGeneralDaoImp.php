<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/SubTipoGeneral.php';

class SubTipoGeneralDaoImp {
    public static function save($subtipo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($subtipo->ID == 0) {
            $sql = $subtipo->Insert();
        } else {
            $sql = $subtipo->Update();
        }
        if ($conn->query($sql)) {
            if ($subtipo->ID == 0) {
                $subtipo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listSubTipoGeneral($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from SubTipoGeneral $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($subtipo) {
        $conn = (new C_MySQL())->open();
        $sql = $subtipo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
