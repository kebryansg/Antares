<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Base / <small>Centro de Costos - Unidad</small></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-registro" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Agregar</button>
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
        <table id="tbUsuarios">
            <thead>
                <tr>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="abreviacion">Abreviación</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="accion" data-formatter="btn_accion" data-events="event_accion" data-align="center">Acciones</th>
                </tr>
            </thead>
        </table>
        <br>
        <div class="pull-right">
            <ul id="paginationUsuarios" class="pagination-sm"></ul>
        </div>
    </div>
</div>

<div id="modal-registro" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Nuevo Registro
                </h4>
            </div>
            <form id="frmBase" role="form" novalidate="novalidate">
                <div class="modal-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Descripción</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="" class="control-label">Abreviación</label>
                                <input type="text" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label"></label>
                                    <br>
                                    <div class="material-switch pull-right">
                                        Estado   &nbsp;&nbsp;
                                        <input id="estado" name="estado" type="checkbox"/>
                                        <label for="estado" class="label-primary"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Observación</label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" title="Haga clic aquí para cancelar el registro actual">
                        <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                    </button>
                    &nbsp;
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $("table").bootstrapTable();
</script>