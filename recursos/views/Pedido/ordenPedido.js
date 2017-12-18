op = "ordenPedido";
//url = "servidor/sPedido.php";
table = $("#Listado table");
selections = [];
$(function () {
    initialComponents();
//    $("#items-registro").modal();
    //$("button[name=btn_add]").click();

    $("form[addLocal]").submit(function (e) {
        e.preventDefault();
        datos = JSON.parse($(this).serializeObject());

        $("#tbOrdenPedido").bootstrapTable("append", datos);
        $(this).trigger("reset");

    });

    $("form[full]").submit(function (e) {
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
            dt: {
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject(),
                items: JSON.stringify($("#tbOrdenPedido").bootstrapTable("getData"))
            }
        };
        save_global(datos);
        $("#tbOrdenPedido").bootstrapTable("removeAll");
        $(this).trigger("reset");
    });

});


function edit(datos) {
    $("#div-registro input[name='fecha']").val(datos.fecha);
    $("#div-registro input[name='IDArea']").val(datos.idarea);
    $("#div-registro input[descripcion_find]").val(datos.area);
    
    //DetalleOrdenPedido
    dt = {
        url: "servidor/sPedido.php",
        data: {
            accion: "list",
            op: "DetalleordenPedido",
            OrdenPedido: datos.ID
        }
    };
    $("#tbOrdenPedido").bootstrapTable("load", getJson(dt));
    //console.log(getJson(dt));
}

function obs(value) {
    return value.substr(0, 5) + "...";
}

function estadoOrdenPedido(value) {
    switch (value) {
        case "PEN":
            return "Pendiente";
            break;
        case "APR":
            return "Aprobado";
            break;
        case "DEV":
            return "Devuelto";
            break;
        case "REC":
            return "Rechazado";
            break;
    }
}