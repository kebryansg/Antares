<?php

include_once '../mvc/modelo/ModuloDaoImp.php';
include_once '../mvc/modelo/SubModuloDaoImp.php';

include_once '../mvc/modelo/RolDaoImp.php';
include_once '../mvc/modelo/PersonaDaoImp.php';
include_once '../mvc/modelo/UsuarioDaoImp.php';


include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";


switch ($accion) {
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "usuario": 
                $persona =$mapper->map($json, new Persona());
                PersonaDaoImp::save($persona);
                
                $usuario = $mapper->map($json, new Usuario());
                $usuario->IDPersona = $persona->ID;
                
                UsuarioDaoImp::save($usuario);
                
                
                break;
            case "rol":
                $rol = $mapper->map($json, new Rol());
                RolDaoImp::save($rol);
                $permisoRol = json_decode($_POST["permisos"]);
                RolDaoImp::asignarPermiso($rol, $permisoRol);
                $resultado = $rol->ID;
                
                break;
            case "submodulo":
                $submodulo = $mapper->map($json, new SubModulo());
                SubModuloDaoImp::save($submodulo);
                $resultado = $submodulo->ID;
                break;
            case "modulo":
                $modulo = $mapper->map($json, new Modulo());
                ModuloDaoImp::save($modulo);
                $resultado = $modulo->ID;
                break;
        }
        break;
    case "list":
        if(isset($_POST["limit"])){
            $top = $_POST["limit"];
        }
        if(isset($_POST["offset"])){
            $pag = $_POST["offset"];
        }
        $count = 0;
        switch ($op) {
            case "usuario": 
                $resultado = json_encode(array(
                    "rows" => UsuarioDaoImp::listUsuarios($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "permisoRol":
                /*$resultado = json_encode(array(
                    "rows" => RolDaoImp::ListPermisoRol($top, $pag, $count),
                    "total" => $count
                ));*/
                $resultado = json_encode(RolDaoImp::ListPermisoRol());
                break;
            case "submodulo":
                $resultado = json_encode(array(
                    "rows" => SubModuloDaoImp::listSubModulo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "modulo":
                $resultado = json_encode(array(
                    "rows" => ModuloDaoImp::listModulo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "rol":
                $resultado = json_encode(array(
                    "rows" => RolDaoImp::listRol($top, $pag, $count),
                    "total" => $count
                ));
                break;
        }
        break;
    case "delete":
        $key = "id";
        // Definir la obtención del id o ids enviados en la petición
        if (array_key_exists("ids", $_POST)) {
            $key = "ids";
        }
        switch ($op) {
            case "submodulo":
                $submodulo = new SubModulo();
                $submodulo->ID = $_POST[$key];
                SubModuloDaoImp::delete($submodulo);
                break;
            case "modulo":
                $modulo = new Modulo();
                $modulo->ID = $_POST[$key];
                ModuloDaoImp::delete($modulo);
                break;
            case "rol":
                $rol = new Rol();
                $rol->ID = $_POST[$key];
                RolDaoImp::delete($rol);
                break;
        }
        break;
}
echo $resultado;
