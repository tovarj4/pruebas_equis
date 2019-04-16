var studentUrl = "class/students.fn.php";
var colonias ="";
var student =
{
    listStudents: function()
    {
        /**
         *action
         * 0 = list
         **/
        var parametros =
        {
            "action": 0
        };
        $.ajax(
        {
            data: parametros,
            url: studentUrl,
            type: "post",
            success: function(response)
            {
                $("#tblStudent > tbody").empty();
                $("#tblStudent > tbody").append(response);
            },
            error: function(xhr, tStatus, err)
            {
                swal("", tStatus + " --- " + xhr.responseText, "error");
            }
        });
        $("#btnEdit").hide();
        $("#btnDelete").hide();
    },
    add: function()
    {
        if (($("#InputName").val().length == 0) || ($("#InputAge").val().length == 0))
        {
            return false;
        }
        var parametros =
        {
            "action": 1,
            "name": $("#InputName").val(),
            "age": $("#InputAge").val()
        };
        $.ajax(
        {
            data: parametros,
            url: studentUrl,
            type: "post",
            dataType: "json",
            success: function(response)
            {
                if (response.error == 'true')
                {
                    swal("Success!", "Student Added", "success");
                }
                else
                {
                    swal("Error!", 'Something wrong happen...', "error");
                }
            },
            error: function(xhr, tStatus, err)
            {
                swal("", tStatus + " --- " + xhr.responseText, "error");
            }
        });
        this.listStudents();
        this.clearForm();
    },
    edit: function()
    {
        var msg = this.setMessage(2);
        var parametros =
        {
            "action": 2,
            "id": $("#InputId").val(),
            "name": $("#InputName").val(),
            "age": $("#InputAge").val()
        };
        $.ajax(
        {
            data: parametros,
            url: studentUrl,
            type: "post",
            dataType: "json",
            success: function(response)
            {
                if (response.error == 'false')
                {
                    swal("Success!", msg, "success");
                }
                else
                {
                    swal("Error!", 'Something wrong happen...', "error");
                }
            },
            error: function(xhr, tStatus, err)
            {
                swal("", tStatus + " --- " + xhr.responseText, "error");
            }
        });
        $("#btnEdit").hide();
        $("#btnDelete").hide();
        $("#btnAdd").show();
        this.clearForm();
        this.listStudents();
    },
    delete: function()
    {
        swal(
        {
            title: "Sure you want to DELETE Student " + $("#InputName").val() + " from database?",
            //text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel this action!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm)
        {
            if (isConfirm)
            {
                var msg = student.setMessage(3);
                var parametros =
                {
                    "action": 3,
                    "id": $("#InputId").val()
                };
                $.ajax(
                {
                    data: parametros,
                    url: studentUrl,
                    type: "post",
                    dataType: "json",
                    success: function(response)
                    {
                        if (response.error == 'false')
                        {
                            swal("Success!", msg, "success");
                        }
                        else
                        {
                            swal("Error!", 'Something wrong happen...' + response.errDesc, "error");
                        }
                        student.clearForm();
                        student.listStudents();
                    },
                    error: function(xhr, tStatus, err)
                    {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });
            }
            else
            {
                swal("Canceled", "No student affected", "error");
                this.clearForm();
            }
        });
        $("#btnEdit").hide();
        $("#btnDelete").hide();
        $("#btnAdd").show();
    },
    loadToEdit: function(id)
    {
        /**
         *action
         * 4 = listOne
         **/
        var parametros =
        {
            "action": 4,
            "id": id
        };
        $.ajax(
        {
            data: parametros,
            url: studentUrl,
            type: "post",
            dataType: "json",
            before: function()
            {
                this.clearForm();
            },
            success: function(response)
            {
                if (response.error != undefined)
                {
                    alert(response.qry);
                }
                else
                {
                    $.each(response, function(index, st)
                    {
                        $("#InputId").val(st.id_student);
                        $("#InputName").val(st.student_name);
                        $("#InputAge").val(st.student_age);
                    });
                    $("#btnEdit").show();
                    $("#btnDelete").show();
                    $("#btnAdd").hide();
                }
            },
            error: function(xhr, tStatus, err)
            {
                swal("", tStatus + " --- " + xhr.responseText, "error");
            }
        });
    },
    setMessage: function(action)
    {
        var msg = "";
        switch (action)
        {
        case 2:
            msg = "Student Edited";
            break;
        case 3:
            msg = "Student Deleted";
            break;
        default:
            msg = "Student";
            break;
        };
        return msg;
    },
    clearForm: function()
    {
        $("#InputId").val("");
        $("#InputName").val("");
        $("#InputAge").val("");
    }
}

var domicilios =
    {
        loadMunicipios : function(){
            var parametros =
                {
                    "cp": $("#InputPostal").val(),
                    "w" : "m"
                };
            $.ajax(
                {
                    data: parametros,
                    url: "class/cp/postal.code.fn.php",
                    type: "post",
                    dataType: "json",
                    success: function(response)
                    {
                        if(response.status == "OK"){
                            $("#InputState").val(response.estado);
                            $("#InputMunicipality").val(response.municipio);
                            $("#InputIdPostal").val(response.cpostal);

                        }

                    },
                    error: function(xhr, tStatus, err)
                    {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });
        }
        ,
        loadColonias : function(){
            var parametros =
                {
                    "cp": $("#InputPostal").val(),
                    "w" : "c"
                };
            colonias = "";
            $.ajax(
                {
                    data: parametros,
                    url: "class/cp/postal.code.fn.php",
                    type: "post",
                    dataType: "json",
                    success: function(response)
                    {
                        //JSON.parse(response);
                        colonias = {
                            data: response
                        };



                    },
                    complete: function(){
                        $("#InputNeighborhood").easyAutocomplete(colonias);
                        $("#InputNeighborhood").focus();
                    },
                    error: function(xhr, tStatus, err)
                    {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });
        }

    }
var clientes =
    {
        show: function () {
            $("#content").empty().load("./views/clientes_view.html");
            this.get();
        },
        add: function () {

            let params = {
                "action": "1",
                "name": $("#InputName").val(),
                "phone": $("#InputPhone").val(),
                "rfc": $("#InputRfc").val(),
                "social": $("#InputSocial").val(),
                "address": $("#InputAddress").val(),
                "postal": $("#InputIdPostal").val(),
                "contact": $("#InputContactPerson").val(),
                "contactMail": $("#InputClientEmail").val()
            }

            $.ajax(
                {
                    data: params,
                    url: "class/clientes/clientes.fn.php",
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 'OK') {
                            swal("Success!", "Cliente Agregado", "success");
                        } else {
                            swal("Error!", 'Something wrong happen...', "error");
                        }
                    },
                    error: function (xhr, tStatus, err) {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });

        },
        get: function () {

            $.ajax(
                {
                    data: {"action":"3"},
                    url: "class/clientes/clientes.fn.php",
                    type: "post",
                    beforeSend: function(){

                    }
                    ,
                    success: function (response) {
                        $(response).appendTo("#tblClientes > tbody");
                    },
                    complete: function(){
                        $("#frm_clientes").hide();
                        common.createDataTable("#tblClientes");

                    },

                    error: function (xhr, tStatus, thrownError) {
                        swal("", tStatus + " - " + xhr.responseText+ "-" + thrownError, "error" );
                    }
                });



        },
        getOne: function(cte){
            let params = { "action": "2", "id": cte }

            $.ajax(
            {
                data: params,
                url: "class/clientes/clientes.fn.php",
                type: "post",
                dataType: "json",
                success: function (response) {
                    if(response.status == 'OK'){
                       $("#InputId").val(response[0].id);
                        $("#InputIdPostal").val(response[0].id_cp);
                        $("#InputName").val(response[0].nombre);
                        $("#InputPhone").val(response[0].telefono);
                        $("#InputAddress").val(response[0].direccion);
                        $("#InputPostal").val(response[0].codigo_postal);
                        $("#InputNeighborhood").val(response[0].colonia);
                        $("#InputMunicipality").val(response[0].municipio);
                        $("#InputState").val(response[0].estado);
                        $("#InputContactPerson").val(response[0].persona_contacto);
                        $("#InputSocial").val(response[0].razon_social);
                        $("#InputClientEmail").val(response[0].email);
                        $("#InputRfc").val(response[0].rfc);

                    }else{
                        swal("", "No se encontro información  para este cliente", "warning");
                    }
                },
                complete:function(){
                    $("#frm_clientes").show();
                },
                error: function (xhr, tStatus, err) {
                    swal("", tStatus + " --- " + xhr.responseText, "error");
                }
            });
        }
    }
const common = {
    /**********************/
    createDataTable: function (id, rows) {
        rows = typeof rows !== 'undefined' ? rows : 5;
        var table = $(id).DataTable({
            //"autoWidth": false,
            "pageLength": rows,
            "pagingType": "full",
            "info": true,
            "lengthChange": false,
            "searching": true,
            "dom": "<pi<t>>",
            "fnInfoCallback": function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
                var o = this.fnPagingInfo();
                return "Página " + (o.iPage + 1) + " de " + o.iTotalPages;
            },
            "initComplete": function () {
                $(this).children('tbody').on('click', 'tr', function () {
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                    } else {
                        table.$('tr.active').removeClass('active');
                        $(this).addClass('active');
                    }
                });
            },
            "columnDefs": [{
                "targets": "no-sort",
                "orderable": false
            }],
            "language": {
                "emptyTable": "No hay datos para mostrar en la tabla.",
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando de 0 a 0 de 0 registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "zeroRecords": "No hay registros relacionados",
                "lengthMenu": "Mostrar _MENU_ registros",
                "search": "Buscar:",
                "paginate": {
                    "first": '<i class="fa fa-fast-backward"></i>',
                    "last": '<i class="fa fa-fast-forward"></i>',
                    "next": '<i class="fa fa-forward"></i>',
                    "previous": '<i class="fa fa-backward"></i>'
                }
            }
        });
    }

    /**********************/
};



