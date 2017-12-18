<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Categoria.php';

class CategoriaDaoImp {
    public static function save($categoria) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($categoria->ID == 0) {
            $sql = $categoria->Insert();
        } else {
            $sql = $categoria->Update();
        }
        if ($conn->query($sql)) {
            if ($categoria->ID == 0) {
                $categoria->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listCategoria($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from categoria $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($categoria) {
        $conn = (new C_MySQL())->open();
        $sql = $categoria->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
