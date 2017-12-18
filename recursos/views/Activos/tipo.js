op = "tipo";
url = "servidor/sCatalogo.php";
table = $("#Listado table");
selections = [];

$(function(){
    initialComponents();
    console.log(parseInt(0));
    
    $("form").submit(function(e){
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
    $("input[name='vidautil']").val(datos.vidautil);
    $("input[name='depreciable']").prop('checked', parseInt(datos.depreciable));
    $("select[name='estado']").selectpicker("val", datos.estado);
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