<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-group"></i> Proveedor </h1>
    </div>
</div>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-default btn-success btn-outline">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-default btn-danger btn-outline">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadProveedor"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="Nombre">Nombres</th>
                    <th data-field="Email">Email</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="row hidden" >
    <form save role="proveedor" action="servidor/sCompras.php">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tipo Identificación</label>
                <div tipo  data-fn="loadTipoIdentificacion"  >
                    <div class="pull-right">
                        <button type="button" class="btn btn-info btn-sm btn-outline" data-toggle='modal' 
                                data-target="#modal-new" data-url="mvc/views/activos/tipoidentificacion.php">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button refresh type="button" class="btn btn-success btn-sm btn-outline">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    <select name="IDTipoIdentificacion" class="selectpicker form-control" data-width='80%' required>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Identificación</label>
                <input type="text" name="Identificacion" class="form-control" value="" maxlength="10" required>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input name="Nombre" class="form-control"  maxlength="150" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input name="Telefono" class="form-control"  maxlength="10" >
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Celular</label>
                        <input name="Celular" class="form-control"  maxlength="10" >
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Autorización SRI</label>
                <input name="AutorizacionSRI" class="form-control"  maxlength="150" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="Email" class="form-control"  maxlength="150" required>
            </div>
            <div class="form-group">
                <label class="control-label">Contribuyente</label>
                <div tipo data-fn="loadContribuyente" >
                    <div class="pull-right">
                        <button type="button" class="btn btn-info btn-sm btn-outline" data-toggle='modal' 
                                data-target="#modal-new" data-url="mvc/views/activos/contribuyente.php">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button refresh type="button" class="btn btn-success btn-sm btn-outline">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    <select name="IDContribuyente" class="selectpicker form-control" data-width='80%'>
                    </select>
                </div>

            </div>
            <div class="form-group">
                <label class="control-label">Tipo Emisor</label>
                <div tipo data-fn="loadTipoEmisor" >
                    <div class="pull-right">
                        <button type="button" class="btn btn-info btn-sm btn-outline" data-toggle='modal' 
                                data-target="#modal-new" data-url="mvc/views/activos/tipoemisor.php">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button refresh type="button" class="btn btn-success btn-sm btn-outline">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    <select name="IDTipoEmisor" class="selectpicker form-control" data-width='80%'>
                    </select>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-default" type="reset"  title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript" src="recursos/views/items/proveedor.js"></script>