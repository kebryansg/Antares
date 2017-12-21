table = $("#Listado table");

$(function () {
    initialComponents();
    //$("button[name='btn_add']").click();
    
});

function getDatos() {
    form = "form[save]";
    datos = {
        url: $(form).attr("action"),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject(),
            subtipos: getSubTipos()
        }
    };
    return datos;
}

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

