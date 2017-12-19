table = $("#Listado table");
selections = [];
$(function(){
    initialComponents();
//    $("button[name='btn_add']").click();
    
    $("form").submit(function(e){
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
            dt:{
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject()
            }
        };
        save_global(datos);
        $(table).bootstrapTable("refresh");
        $(this).trigger("reset");
    });
});

function edit(datos){
    $("#div-registro form").data("id", datos.ID);
    for(var clave in datos){
        $("#div-registro form [name='"+ clave +"']").val(datos[clave]);
    }
}