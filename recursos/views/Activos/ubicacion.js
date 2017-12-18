op = "ubicacion";
url = "servidor/sCatalogo.php";
table = $("#Listado table");
selections = [];
queryParams = {
    op: op,
    accion: "list"
};
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
    $("form").data("id", datos.ID);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
    
    $("input[descripcion_find]").val(datos.bodega);
    $("input[name='IDBodega']").val(datos.idbodega);
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