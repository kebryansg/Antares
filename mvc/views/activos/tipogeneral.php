<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-group"></i> Tipo General </h1>
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
            data-ajax="loadTipoGeneral"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="accion" class="col-md-1" data-formatter="defaultBtnAccion" data-events="event_accion_default" data-align="center">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div id="div-registro" class="row hidden" >
    <form role="tipogeneral" action="servidor/sCatalogo.php">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Estado</label>
                <select name="estado" class="form-control selectpicker" required>
                    <option value="ACT">Activo</option>
                    <option value="INA">Inactivo</option>
                    <option value="BLO">Bloqueado</option>
                    <option value="ELI">Eliminado</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label">Observación</label>
                <textarea rows="4" name="observacion" class="form-control"></textarea>
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
    
    <div class="clearfix"></div>
    <br>
    <div class="col-md-12">
        <div id="toolbar1" class="btn-group">
            <button type="button" class="btn btn-info btn-outline" data-toggle="modal" data-target="#modal-find" data-ajax="loadSubTipoGeneral" >
                <i class="glyphicon glyphicon-new-window"></i> Asignar
            </button>
            <button type="button" class="btn btn-success btn-outline" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/subtipogeneral.php" >
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del_individual" class="btn btn-default btn-danger btn-outline">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table
            id="tbTipoSubTipo"
            full
            data-toolbar="#toolbar1">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" data-align="center" class="col-md-1">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                </tr>
            </thead>
        </table>
    </div>
    
</div>




<script type="text/javascript" src="recursos/views/Activos/tipogeneral.js"></script>