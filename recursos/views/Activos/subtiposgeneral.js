table = $("#Listado table");

$(function(){
    initialComponents();
//    $("button[name='btn_add']").click();
});

function edit(datos){
    $("#div-registro form").data("id", datos.ID);
    for(var clave in datos){
        $("#div-registro form [name='"+ clave +"']").val(datos[clave]);
    }
}
