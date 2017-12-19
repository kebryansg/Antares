var TablePaginationDefault = {
    height: 400,
    pageSize: 5,
    search: true,
    pageList: [5, 10, 15, 20],
    cache: false,
    pagination: true,
    sidePagination: "server"
};
var TableDefault = {
    height: 400,
    pageSize: 5,
    //search: true,
    pageList: [5, 10, 15, 20],
    cache: false
};
function action_seleccion_v2(datos) {
    $("#modal-find").modal("hide");
    div = $("#modal-find").data("ref");
    //console.log(($(div).closest(".input-group").length > 0));
    //Separar los casos donde es invocado el modal de busqueda
    if ($(div).closest(".input-group").length > 0) {
        div = $(div).closest(".input-group");
        $(div).find("input[descripcion_find]").val(datos.descripcion);
        $(div).find("input[id_find]").val(datos.ID);
    } else if ($(div).closest(".btn-group").length > 0) {
        id = $(div).closest(".btn-group").attr("id");
        table_ref = 'table[data-toolbar="#' + id + '"]';

        // Validar que no se repitan los registros
        ids = $(table_ref).bootstrapTable("getData").filter(val => val.ID === datos.ID);

        if (ids.length === 0) {
            $(table_ref).bootstrapTable("append", datos);
        }

    }
}


function initialComponents() {
    $("table[init]").bootstrapTable(TablePaginationDefault);
    $("table[full]").bootstrapTable(TableDefault);

    $(".selectpicker").selectpicker();

    $('#tbFind').on('dbl-click-row.bs.table', function (e, row, $element) {
        action_seleccion_v2(row);
    });

    $('#modal-find').on({
        'show.bs.modal': function (e) {
            //console.log($(e.relatedTarget).closest(".input-group"));
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            //$(this).data("ref", $(e.relatedTarget).closest(".input-group"));
            $(this).data("ref", $(e.relatedTarget));
            $("table[search]").bootstrapTable($.extend({}, TablePaginationDefault,
                    {
                        ajax: dataAjax
                    }));
        },
        'hidden.bs.modal': function (e) {
            //$("table[search]").bootstrapTable("destroy");
        }
    });
    $('#modal-new').on({
        'show.bs.modal': function (e) {
            //console.log($(e.relatedTarget).closest(".input-group"));
            dataUrl = $(e.relatedTarget).attr("data-url");
            initModalNew('#modal-new', dataUrl);
        },
        'hidden.bs.modal': function (e) {
            $("table[search]").bootstrapTable("destroy");
        }
    });


    $(document).on({
        'show.bs.modal': function () {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function () {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        },
        'hidden.bs.modal': function () {
            if ($('.modal:visible').length > 0) {
                // restore the modal-open class to the body element, so that scrolling works
                // properly after de-stacking a modal.
                setTimeout(function () {
                    $(document.body).addClass('modal-open');
                }, 0);
            }
        }
    }, '.modal');
}

function initModalNew(modal, dataUrl) {
    //funct_url = $("#modal-new").attr("data-url") + " #div-registro";

    $.ajax({
        url: dataUrl,
        async: false,
        dataType: 'html',
        success: function (html) {
            div = "";
            $.each($(html), function (i, r) {
                if ($(r).find(".page-header").length > 0) {
                    $(r).find(".page-header i").remove();
                    title = $(r).find(".page-header").html();
                    $(modal + ' .modal-title').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Registro - ' + title);

                }
                if ($(r).attr("id") === "div-registro") {
                    $(r).removeClass("hidden");
                    $(r).removeAttr("id");
                    $(r).find("button[new]").remove();
                    div = $(r);
                }

            });
            $(modal + ' .modal-body').html(div);
        }
    });

    $(modal + ' .selectpicker').selectpicker();
    $(modal + ' form').submit(function (e) {
        e.preventDefault();
        console.log("no se regreso");
    });

}


function getJson(params) {
    result = {};
    $.ajax({
        url: params.url,
        async: false,
        type: 'POST',
        dataType: 'json',
        data: params.data,
        success: function (response) {
            result = response;
        }
    });
    return result;
}

function save_global(datos) {
    $.ajax({
        url: datos.url,
        type: 'POST',
        async: false,
        dataType: 'json',
        data: datos.dt,
        success: function (response) {
            //loadTable();
            //$(table).bootstrapTable("refresh");
            hideRegistro();
        }
    });
}

function alertEliminarRegistro(row) {
    $.confirm({
        theme: "modern",
        title: 'Eliminar Registro?',
        content: 'Estás seguro de continuar?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Eliminar Registro',
                action: function () {
                    delet(row);
                }
            },
            cancelAction: {
                text: "Cancelar",
                action: function () {
                    //$.alert('action is canceled');
                }
            }
        }
    });
}

function alertEliminarRegistros() {
    $.confirm({
        theme: "modern",
        title: 'Eliminar Registros?',
        content: 'Estás seguro de continuar?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Eliminar Registros',
                action: function () {
                    deletes();
                }
            },
            cancelAction: {
                text: "Cancelar",
                action: function () {
                    //$.alert('action is canceled');
                }
            }
        }
    });
}

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();

    /* Agregar identificador  "id" */
    o["id"] = ($.isEmptyObject($(this).data("id"))) ? 0 : $(this).data("id");

    $.each(a, function (index, row) {
        o[row.name] = row.value;
    });
    /* Agregar input de type(checkbox) */
    $.each($(this).find("input[type='checkbox']"), function (index, row) {
        o[row.name] = $(row).is(":checked");
    });
    return JSON.stringify(o);
};

function btnSeleccion(value) {
    return '<button name="seleccion" class="btn btn-outline btn-success btn-sm"><i class="fa fa-check-square-o" aria-hidden="true"></i> Seleccionar</button>';
}

function defaultBtnAccion(value, rowData, index) {
    return '<div class="btn-group" name="shows">' +
            '<button type="button" class="btn btn-default dropdown-toggle btn-sm"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
            ' <i class="fa fa-fw fa-align-justify"></i>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-left" >' +
            '<li name="edit"><a href="#"> <i class="fa fa-edit"></i> Editar</a></li>' +
            ' <li name="delete" ><a href="#"> <i class="fa fa-trash"></i> Eliminar</a></li>' +
            '</ul>' +
            '</div>';
}

function formatterDepreciable(value) {
    return (parseInt(value)) ? "Si" : "No";
}

function limpiarContenedor(contenedor) {
    $(contenedor + " input").val("");
    $(contenedor + " textarea").val("");
    $(contenedor + " .selectpicker").selectpicker("refresh");
}

window.event_accion_default = {
    "click li[name='edit']": function (e, value, row, index) {
        showRegistro();
        edit(row);
    },
    "click li[name='delete']": function (e, value, row, index) {
        alertEliminarRegistro(row);
    },
    "click button[name='seleccion']": function (e, value, row, index) {
        action_seleccion_v2(row);
    }
};

$(function () {
    $("#page-wrapper").on("click", "button[name='btn_add']", function (e) {
        showRegistro();
    });
    $("#page-wrapper").on("click", "button[name='btn_del']", function (e) {
        alertEliminarRegistros();
    });
    $("#page-wrapper").on("click", "button[type='reset']", function (e) {
        //console.log($(this).closest(".modal-body"));
        if ($(this).closest(".modal-body").length > 0) {
            $(this).closest(".modal").modal("hide");
        } else {
            hideRegistro();
        }
    });



    $(window).on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
        var ids = $.map(!$.isArray(rows) ? [rows] : rows, function (row) {
            return row.ID;
        });
        if ($.inArray(e.type, ['check', 'check-all']) > -1) {
            //Add
            $.each(ids, function (i, id) {
                selections.push(id);
            });
        } else {
            //Delete
            $.each(ids, function (i, id) {
                if ($.inArray(id, selections) > -1) {
                    selections.splice($.inArray(id, selections), 1);
                }
            });
        }
    });


    var dropdownMenu;
    $(window).on('show.bs.dropdown', function (e) {
        if (!$.isEmptyObject($(e.target).attr("name"))) {
            dropdownMenu = $(e.target).find('.dropdown-menu');
            $('body').append(dropdownMenu.detach());
            var eOffset = $(e.target).offset();
            dropdownMenu.css({
                'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left + $(e.target).outerWidth() - $(dropdownMenu).width()
            });
        }
    });
    $(window).on('hide.bs.dropdown', function (e) {
        if (!$.isEmptyObject(dropdownMenu)) {
            $(e.target).append(dropdownMenu.detach());
            dropdownMenu.hide();
            dropdownMenu = null;
        }
    });
});
function responseHandler(res) {
    $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.ID, selections) !== -1;
    });
    return res;
}

function deletes() {
    $.ajax({
        url: url,
        type: "POST",
        async: false,
        data: {
            accion: "delete",
            op: op,
            ids: selections
        }
    });
    selections = [];
    $(table).bootstrapTable("destroy");
    $(table).bootstrapTable();
}

function showRegistro() {
    $("#Listado").fadeOut();
    $("#Listado").addClass("hidden");

    $("#div-registro").fadeIn("slow");
    $("#div-registro").removeClass("hidden");
}

function hideRegistro() {
    $("#div-registro").fadeOut();
    $("#div-registro").addClass("hidden");
    $("#Listado").fadeIn("slow");
    $("#Listado").removeClass("hidden");
    $("#div-registro form").removeData("id");
}