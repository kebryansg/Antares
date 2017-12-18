op = "rol";
url = "servidor/sAdministracion.php";
table = $("#Listado table");
selections = [];

$(function () {
    initialComponents();

    $("form").submit(function (e) {
        e.preventDefault();
        datos = {
            url: url,
            dt: {
                accion: "save",
                op: op,
                datos: $(this).serializeObject(),
                permisos: getPermisos()
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
    $("#tbPermisoRol").bootstrapTable("checkBy",{field: "ID", values: datos.submodulos.split(",") });
}
function delet(datos) {
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


function getPermisos() {
    rows = $.map($("#tbPermisoRol").bootstrapTable("getSelections"), function (row) {
        return row.ID;
    });
    return JSON.stringify(rows);
}
