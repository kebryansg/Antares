op = "ordenPedido";
//url = "servidor/sPedido.php";
table = $("#Listado table");
selections = [];
$(function () {
    initialComponents();
//    $("#items-registro").modal();
    //$("button[name=btn_add]").click();
    
    $("#items-registro").on({
        'hidden.bs.modal': function (e) {
            $("table[full]").bootstrapTable("resetView");
        }
    });
    

    $("form[addLocal]").submit(function (e) {
        e.preventDefault();
        datos = JSON.parse($(this).serializeObject());

        $("#tbOrdenPedido").bootstrapTable("append", datos);
        $(this).trigger("reset");

    });
    
    $("#test").click(function(e){
        fun = "getDatos";
        if (typeof window.getDatos === 'function' ) {
            console.log("Si");
        }else{
            console.log("No");
        }
    });
    

    /*$("form[full]").submit(function (e) {
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
    });*/

});


function getDatos() {
    form = "form[save]";
    datos = {
        url: $(form).attr("action"),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject(),
            items: JSON.stringify($("#tbOrdenPedido").bootstrapTable("getData"))
        }
    };
    return datos;
}


function edit(datos) {
    $("#div-registro form[save]").data("id", datos.ID);
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
    console.log($("#tbOrdenPedido").bootstrapTable("getData"));
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