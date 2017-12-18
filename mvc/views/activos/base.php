<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Base </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" class="btn btn-default btn-success btn-outline">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" class="btn btn-default btn-danger btn-outline">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            data-toggle="table"
            data-page-size="5"
            data-height="400"
            data-toolbar="#toolbar"

            data-ajax="ajx"
            data-search="true"
            data-pagination="true" 
            data-side-pagination="server"
            data-page-list="[5,10,15,20]">
            <thead>
                <tr>
                    <th data-field="ID" class="col-md-1">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="accion" data-formatter="defaultBtnAccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<br>

<script type="text/javascript">
    
    $("table").bootstrapTable();
    function ajx(params) {
        json_data = $.extend({}, queryParams(), params.data);
        params.success(getJson(json_data));
    }
    function getJson(params) {
        result = {};
        $.ajax({
            url: "servidor/sCatalogo.php",
            async: false,
            type: 'POST',
            dataType: 'json',
            data: params,
            success: function (response) {
                result = response;
            }
        });
        return result;
    }
    function queryParams() {
        params = {
            accion: "list",
            op: "ciudad"
        };
        return params;
    }
</script>

