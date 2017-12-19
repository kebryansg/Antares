<?php

include_once '../mvc/modelo/GrupoDaoImp.php';
include_once '../mvc/modelo/ClaseDaoImp.php';
include_once '../mvc/modelo/SubGrupoDaoImp.php';
include_once '../mvc/modelo/SubClaseDaoImp.php';
include_once '../mvc/modelo/CentrocostoDaoImp.php';
include_once '../mvc/modelo/PaisDaoImp.php';
include_once '../mvc/modelo/CiudadDaoImp.php';
include_once '../mvc/modelo/CategoriaDaoImp.php';
include_once '../mvc/modelo/UnidadDaoImp.php';
include_once '../mvc/modelo/ClasificacionDaoImp.php';
include_once '../mvc/modelo/AreaDaoImp.php';
include_once '../mvc/modelo/DepartamentoDaoImp.php';
include_once '../mvc/modelo/EdificioDaoImp.php';
include_once '../mvc/modelo/FabricanteDaoImp.php';
include_once '../mvc/modelo/TipoDaoImp.php';
include_once '../mvc/modelo/SubTipoDaoImp.php';
include_once '../mvc/modelo/BodegaDaoImp.php';
include_once '../mvc/modelo/UbicacionDaoImp.php';
include_once '../mvc/modelo/TipoGeneralDaoImp.php';
include_once '../mvc/modelo/SubTipoGeneralDaoImp.php';
include_once '../mvc/modelo/TipoSubTipoGeneralDaoImp.php';



include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";

switch ($accion) {
    case "list":
        $top = $_POST["limit"];
        $pag = $_POST["offset"];
        $count = 0;
        switch ($op) {
            case "subtipogeneral":
                $resultado = json_encode(array(
                    "rows" => SubTipoGeneralDaoImp::listSubTipoGeneral($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "tipogeneral":
                $resultado = json_encode(array(
                    "rows" => TipoGeneralDaoImp::listTipoGeneral($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "bodega":
                $resultado = json_encode(array(
                    "rows" => BodegaDaoImp::listBodega($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "ubicacion":
                $resultado = json_encode(array(
                    "rows" => UbicacionDaoImp::listUbicacion($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "tipo":
                $resultado = json_encode(array(
                    "rows" => TipoDaoImp::listTipo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "subtipo":
                $resultado = json_encode(array(
                    "rows" => SubTipoDaoImp::listSubTipo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "fabricante":
                $resultado = json_encode(array(
                    "rows" => FabricanteDaoImp::listFabricante($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "edificio":
                $resultado = json_encode(array(
                    "rows" => EdificioDaoImp::listEdificio($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "clasificacion":
                $resultado = json_encode(array(
                    "rows" => ClasificacionDaoImp::listClasificacion($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "departamento":
                $resultado = json_encode(array(
                    "rows" => DepartamentoDaoImp::listDepartamento($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "area":
                $resultado = json_encode(array(
                    "rows" => AreaDaoImp::listArea($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "unidad":
                $resultado = json_encode(array(
                    "rows" => UnidadDaoImp::listUnidad($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "categoria":
                $resultado = json_encode(array(
                    "rows" => CategoriaDaoImp::listCategoria($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "centrocosto":
                $resultado = json_encode(array(
                    "rows" => CentrocostoDaoImp::listCentro($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "pais":
                $resultado = json_encode(array(
                    "rows" => PaisDaoImp::listPais($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "ciudad":
                $resultado = json_encode(array(
                    "rows" => CiudadDaoImp::listCiudad($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "grupos":
                $resultado = json_encode(array(
                    "rows" => GrupoDaoImp::listGrupo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "subgrupos":
                $resultado = json_encode(array(
                    "rows" => SubGrupoDaoImp::listSubGrupo($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "clases":
                $resultado = json_encode(array(
                    "rows" => ClaseDaoImp::listClase($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "subclases":
                $resultado = json_encode(array(
                    "rows" => SubClaseDaoImp::listSubClase($top, $pag, $count),
                    "total" => $count
                ));
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "subtipogeneral":
                $subtipo = $mapper->map($json, new SubTipoGeneral());
                SubTipoGeneralDaoImp::save($subtipo);
                $resultado = $subtipo->ID;
                break;
            case "tipogeneral":
                $tipo = $mapper->map($json, new TipoGeneral());
                TipoGeneralDaoImp::save($tipo);
                $resultado = $tipo->ID;
                if ($tipo->ID > 0) {
                    $subtipos = json_decode($_POST["subtipos"]);

                    foreach ($subtipos as $subtipo) {
                        $tipoSubTipo = new TipoSubTipoGeneral();
                        $tipoSubTipo->IDSubTipoGeneral = $subtipo;
                        $tipoSubTipo->IDTipoGeneral = $tipo->ID;
                        TipoSubTipoGeneralDaoImp::save($tipoSubTipo);
                    }
                }
                break;
            case "bodega":
                $bodega = $mapper->map($json, new Bodega());
                BodegaDaoImp::save($bodega);
                $resultado = $bodega->ID;
            case "ubicacion":
                $ubicacion = $mapper->map($json, new Ubicacion());
                UbicacionDaoImp::save($ubicacion);
                $resultado = $ubicacion->ID;
                break;
            case "tipo":
                $tipo = $mapper->map($json, new Tipo());
                TipoDaoImp::save($tipo);
                $resultado = $tipo->ID;
                break;
            case "subtipo":
                $subtipo = $mapper->map($json, new SubTipo());
                SubTipoDaoImp::save($subtipo);
                $resultado = $subtipo->ID;
                break;
            case "fabricante":
                $fabricante = $mapper->map($json, new Fabricante());
                FabricanteDaoImp::save($fabricante);
                $resultado = $fabricante->ID;
                break;
            case "edificio":
                $edificio = $mapper->map($json, new Edificio());
                EdificioDaoImp::save($edificio);
                $resultado = $edificio->ID;
                break;
            case "area":
                $area = $mapper->map($json, new Area());

                AreaDaoImp::save($area);
                $resultado = $area->ID;
                break;
            case "departamento":
                $departamento = $mapper->map($json, new Departamento());

                DepartamentoDaoImp::save($departamento);
                $resultado = $departamento->ID;
                break;
            case "clasificacion":
                $clasificacion = $mapper->map($json, new Clasificacion());

                ClasificacionDaoImp::save($clasificacion);
                $resultado = $clasificacion->ID;
                break;
            case "unidad":
                $unidad = $mapper->map($json, new Unidad());

                UnidadDaoImp::save($unidad);
                $resultado = $unidad->ID;
                break;
            case "categoria":
                $categoria = $mapper->map($json, new Categoria());

                CategoriaDaoImp::save($categoria);
                $resultado = $categoria->ID;
                break;
            case "centrocosto":
                $centrocosto = $mapper->map($json, new Centrocosto());

                CentrocostoDaoImp::save($centrocosto);
                $resultado = $centrocosto->ID;
                break;
            case "pais":
                $pais = $mapper->map($json, new Pais());

                PaisDaoImp::save($pais);
                $resultado = $pais->ID;
                break;
            case "ciudad":
                $ciudad = $mapper->map($json, new Ciudad());

                CiudadDaoImp::save($ciudad);
                $resultado = $ciudad->ID;
                break;
            case "grupos":
                $grupo = $mapper->map($json, new Grupo());

                GrupoDaoImp::save($grupo);
                $resultado = $grupo->ID;
                break;
            case "subgrupos":
                $subgrupo = $mapper->map($json, new SubGrupo());

                SubGrupoDaoImp::save($subgrupo);
                $resultado = $subgrupo->ID;
                break;
            case "clases":
                $clase = $mapper->map($json, new Clase());

                ClaseDaoImp::save($clase);
                $resultado = $clase->ID;
                break;
            case "subclases":
                $subclase = $mapper->map($json, new SubClase());

                SubClaseDaoImp::save($subclase);
                $resultado = $subclase->ID;
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
            case "tipo":
                $tipo = new Tipo();
                $tipo->ID = $_POST[$key];
                TipoDaoImp::delete($tipo);
                break;
            case "subtipo":
                $subtipo = new SubTipo();
                $subtipo->ID = $_POST[$key];
                SubTipoDaoImp::delete($subtipo);
                break;
            case "fabricante":
                $fabricante = new Fabricante();
                $fabricante->ID = $_POST[$key];
                FabricanteDaoImp::delete($fabricante);
                break;
            case "subclases":
                $subclase = new SubClase();
                $subclase->ID = $_POST[$key];
                SubClaseDaoImp::delete($subclase);
                break;
            case "subgrupos":
                $subgrupo = new SubGrupo();
                $subgrupo->ID = $_POST[$key];
                SubGrupoDaoImp::delete($subgrupo);
                break;
            case "edificio":
                $edificio = new Edificio();
                $edificio->ID = $_POST[$key];
                EdificioDaoImp::delete($edificio);
                break;
            case "departamento":
                $departamento = new Departamento();
                $departamento->ID = $_POST[$key];
                DepartamentoDaoImp::delete($departamento);
                break;
            case "clasificacion":
                $clasificacion = new Clasificacion();
                $clasificacion->ID = $_POST[$key];
                ClasificacionDaoImp::delete($clasificacion);
                break;
            case "area":
                $area = new Area();
                $area->ID = $_POST[$key];
                AreaDaoImp::delete($area);
                break;
            case "unidad":
                $unidad = new Unidad();
                $unidad->ID = $_POST[$key];
                UnidadDaoImp::delete($unidad);
                break;
            case "categoria":
                $categoria = new Categoria();
                $categoria->ID = $_POST[$key];
                CategoriaDaoImp::delete($categoria);
                break;
            case "centrocosto":
                $centrocosto = new Centrocosto();
                $centrocosto->ID = $_POST[$key];
                CentrocostoDaoImp::delete($centrocosto);
                break;
            case "pais":
                $pais = new Pais();
                $pais->ID = $_POST[$key];
                PaisDaoImp::delete($pais);
                break;
            case "ciudad":
                $ciudad = new Ciudad();
                $ciudad->ID = $_POST[$key];
                CiudadDaoImp::delete($ciudad);
                break;
            case "grupos":
                $grupo = new Grupo();
                $grupo->ID = $_POST[$key];
                GrupoDaoImp::delete($grupo);
                break;
            case "clases":
                $clase = new Clase();
                $clase->ID = $_POST[$key];
                ClaseDaoImp::delete($clase);
                break;
        }
        break;
}
echo $resultado;
