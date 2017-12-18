<?php

include_once '../mvc/modelo/OrdenPedidoDaoImp.php';
include_once '../mvc/modelo/DetalleOrdenPedidoDaoImp.php';


include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";

switch ($accion) {
    case "list":
        if(isset($_POST["limit"])){
            $top = $_POST["limit"];
        }
        if(isset($_POST["offset"])){
            $pag = $_POST["offset"];
        }
        $count = 0;
        switch ($op) {
            case "ordenPedido":
                $resultado = json_encode(array(
                    "rows" => OrdenPedidoDaoImp::listOrdenPedido($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "DetalleordenPedido":
                $resultado = json_encode(DetalleOrdenPedidoDaoImp::listDetalleOrdenPedido($_POST["OrdenPedido"]));
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "ordenPedido":
                $ordenPedido = $mapper->map($json, new OrdenPedido());

                OrdenPedidoDaoImp::save($ordenPedido);
                $resultado = $ordenPedido->ID;
                

                $items = json_decode($_POST["items"]);
                foreach ($items as $item) {
                    $detalleOrdenPedido = $mapper->map($item, new DetalleOrdenPedido());
                    $detalleOrdenPedido->IDOrdenPedido = $ordenPedido->ID;
                    DetalleOrdenPedidoDaoImp::save($detalleOrdenPedido);
                }
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
        }
        break;
}
echo $resultado;
