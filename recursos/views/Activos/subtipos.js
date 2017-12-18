op = "subtipo";
url = "servidor/sCatalogo.php";
table = $("#Listado table");
selections = [];

$(function(){
    initialComponents();
    $("form").submit(function (e) {
        e.preventDefault();
        datos = {
            url: url,
            dt: {
                accion: "save",
                op: op,
                datos: $(this).serializeObject()
            }
        };
        save_global(datos);
        $(table).bootstrapTable("refresh");
        $(this).trigger("reset");
    });
});

function edit(datos) {
    $("input[name='IDTipo']").val(datos.idtipo);
    $("input[descripcion_find]").val(datos.tipo);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("input[name='vidautil']").val(datos.vidautil);
    $("input[name='depreciable']").prop('checked', parseInt(datos.depreciable));
    $("select[name='estado']").selectpicker("val", datos.estado);
    $("form").data("id", datos.ID);
}

function delet(datos){
    $.ajax({
        url: url,
        type: "POST",
        async: false,
        data: {
            accion: "delete",
            op: op,
            id: datos.ID
        }
    });
    $(table).bootstrapTable("refresh");
}
