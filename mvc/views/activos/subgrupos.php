<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-group fa-fw"></i> Sub Grupo </h1>
    </div>
</div>

<div class="row hidden" id="div-registro">
    <form save action="servidor/sCatalogo.php" role="subgrupos" >
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Descripción</label>
                        <input name="descripcion" type="text" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Grupo</label>
                                <div class="input-group">
                                    <input id_find name="IDGrupo" type="text" class="hidden" required>
                                    <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                    <span class = "input-group-btn">
                                        <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadGrupo">
                                            <i class="fa fa-search"></i> 
                                        </button>
                                        <button new class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/grupos.php">
                                            <i class="fa fa-plus"></i> 
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Estado</label>
                                <select name="estado" class="form-control selectpicker">
                                    <option value="ACT">Activo</option>
                                    <option value="INA">Inactivo</option>
                                    <option value="BLO">Bloqueado</option>
                                    <option value="ELI">Eliminado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Observación</label>
                        <textarea rows="4" name="observacion" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="pull-right">
                <button class="btn btn-default" type="reset" title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>



    </form>
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
            data-ajax="loadSubGrupo"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="grupo">Grupo</th>
                    <th data-field="accion" data-formatter="defaultBtnAccion" data-events="event_accion_default" data-align="center" class="col-md-1">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript" src="recursos/views/Activos/subGrupos.js"></script>