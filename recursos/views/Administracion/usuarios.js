op = "usuario";
url = "servidor/sAdministracion.php";
table = $("#Listado table");
selections = [];
$(function () {
    initialComponents();
    
    //$("button[name='btn_add']").click();
    
    $("form").submit(function(e){
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
            dt: {
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
    
}