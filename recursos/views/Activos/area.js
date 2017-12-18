op = "area";
url = "servidor/sCatalogo.php";
table = $("#Listado table");
selections = [];
queryParams = {
    op: op,
    accion: "list"
};
$(function () {
    initialComponents();

    $("form").submit(function (e) {
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
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

function ajx(params) {
    json_data = {
        data: $.extend({}, queryParams, params.data),
        url: url
    };
    params.success(getJson(json_data));
}


function edit(datos) {
    $("form").data("id", datos.ID);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
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
