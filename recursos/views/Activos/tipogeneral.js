table = $("#Listado table");
//selections = [];
$(function () {
    initialComponents();
    //$("button[name='btn_add']").click();

    /*$("form").submit(function (e) {
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
            dt: {
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject(),
                subtipos: getSubTipos()
            }
        };

        save_global(datos);
        $(table).bootstrapTable("refresh");
        $(this).trigger("reset");
    });*/
});

function getSubTipos() {
    data = $("#tbTipoSubTipo").bootstrapTable("getData").map(row => row.ID);
    return JSON.stringify(data);
}

function edit(datos) {
    $("#div-registro form").data("id", datos.ID);
    for (var clave in datos) {
        $("#div-registro form [name='" + clave + "']").val(datos[clave]);
    }
    data = getJson({
        url: "servidor/sCatalogo.php",
        data: {
            accion: "list",
            op: "SubTipoGeneral:TipoGeneral",
            IDTipoGeneral: datos.ID
        }
    });
    $("#tbTipoSubTipo").bootstrapTable("load", data);


}
function deleteIndividual() {
    ids = $("#tbTipoSubTipo").bootstrapTable("getSelections").map(row => row.ID);
    $("#tbTipoSubTipo").bootstrapTable("remove", {field: 'ID', values: ids});
}
