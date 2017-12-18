<?php

//namespace modelo;
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Rol.php';

class RolDaoImp {

    public static function save($rol) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($rol->ID == 0) {
            $sql = $rol->Insert();
        } else {
            $sql = $rol->Update();
        }
        if ($conn->query($sql)) {
            if ($rol->ID == 0) {
                $rol->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listRol($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewrol $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($rol) {
        $conn = (new C_MySQL())->open();
        $sql = $rol->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

    public static function ListPermisoRol() {
        $conn = (new C_MySQL())->open();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * from viewPermisoRol;";
        return C_MySQL::returnListAsoc($conn, $sql);
    }

    public static function asignarPermiso($rol, $permisos) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from PermisoSubModulo where IDRol = " . $rol->ID;
        $conn->query($sql);
        $sql = "insert into PermisoSubModulo(IDRol, IDSubModulo) values";
        if (count($permisos) > 0) {
            $list = array();
            foreach ($permisos as $permiso) {
                array_push($list, "(" . $rol->ID . "," . $permiso . ")");
            }
            $sql .= join(',', $list);
            $conn->query($sql);
        }
        $conn->close();
    }

    /* public static function asignarPermiso($rol,$permisos){
      $conn = (new C_MySQL())->open();
      $sql = "Delete from permisos_modulos where id_rol = ". $rol->getId();
      $conn->query($sql);
      $sql = "insert into permisos_modulos(id_rol, modulos) values";
      if(count($permisos) > 0){
      $list = array();
      foreach ($permisos as $permiso) {
      array_push($list, "(".$rol->getId().",".$permiso.")");
      }
      $sql.= join(',', $list);
      $conn->query($sql);
      }
      $conn->close();
      }

      public static function permisos_modulos(){
      $conn = (new C_MySQL())->open();
      $sql = "SELECT * from viewPermisosGrupos;";
      return C_MySQL::returnListAsoc($conn,$sql);
      }
      public static function listRoles(){
      $conn = (new C_MySQL())->open();
      $sql = "SELECT roles.*, GROUP_CONCAT(p_m.modulos) as modulos from roles
      join permisos_modulos p_m on p_m.id_rol = roles.id
      where registro_activo = '1'
      GROUP BY roles.id;";
      return C_MySQL::returnListAsoc($conn,$sql);

      } */
}
