<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Base <small>Sub Grupo - Sub Clase</small> </h1>
    </div>
</div>

<div class="row hidden" id="div-registo">
    <form id="frmSub" role="form" novalidate="novalidate">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Descripción</label>
                        <input name="descripcion" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Grupo</label>
                                <div class="input-group">
                                    <input name="grupo" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                    <span class = "input-group-btn">
                                        <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find">
                                            <i class="fa fa-search"></i> 
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
                <button class="btn btn-default" data-dismiss="modal" title="Haga clic aquí para cancelar el registro actual">
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
        <div class="pull-right">
            <!-- data-toggle="modal" data-target="#modal-registro" data-backdrop="static" data-keyboard="false" -->
            <button class="btn btn-success" id="btnAgregar" ><i class="fa fa-plus"></i> Agregar</button>
        </div>
        <div class="pull-left">
            <select id="cboTop" class="selectpicker form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="clearfix"></div>
        <br>
        <table id="">
            <thead>
                <tr>
                    <th data-field="ID" class="col-md-1">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="grupo">Grupo</th>
                    <th data-field="accion" data-formatter="defaultBtnAccion" data-events="event_accion">Acciones</th>
                </tr>
            </thead>
        </table>
        <br>
        <div class="pull-right">
            <ul name="pagination" class="pagination-sm"></ul>
        </div>
    </div>
</div>

<div id="modal-find" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Buscar Registro
                </h4>
            </div>
            <div class="modal-body">
                <table 
                    id="tbFind"
                    data-pagination="true"
                     data-search="true"
                     data-page-list="[5, 10]"
                     data-height="400">
                    <thead>
                        <tr>
                            <th data-field="descripcion">Clase</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix"></div>
            </div>
            <!--<div class="modal-footer">

            </div>-->
        </div>
    </div>
</div>

<script type="text/javascript" src="recursos/views/Activos/subGrupos.js"></script>