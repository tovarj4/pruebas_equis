var studentUrl = "class/students.fn.php";
var colonias ="";

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
        showfrm: function (opt) {

            $("#frm_clientes").show();
            $("#tblClientes").hide();
            if(opt==1){
                $("#btnAdd").show();
                $("#btnEdit").hide();
                $("#btnDelete").hide();
            }else if(opt==2){
                $("#btnAdd").hide();
                $("#btnEdit").show();
                $("#btnDelete").show();
            }

        },//showfrm
        show: function () {
            this.get();
        },//show
        get: function () {

            $.ajax(
                {
                    data: {"action":"0"},
                    url: "class/clientes/clientes.fn.php",
                    type: "post",
                    beforeSend: function(){
                        $("#content").empty().load("./views/clientes_view.html");
                        $("#frm_clientes").hide();
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



        },//get
        getOne: function(cte){
            let params = { "action": "1", "id": cte }

            $.ajax(
            {
                data: params,
                url: "class/clientes/clientes.fn.php",
                type: "post",
                dataType: "json",
                beforeSend: function(){
                    //clientes.showfrm(2);
                    common.showfrm({"form":"frm_clientes","table":"tblClientes","btn":2})
                },
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


                },
                error: function (xhr, tStatus, err) {
                    swal("", tStatus + " --- " + xhr.responseText, "error");
                }
            });
        },//getOne
        add: function () {

            let params = {
                "action": "2",
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
                    complete :function(){
                        clientes.get();
                    },
                    error: function (xhr, tStatus, err) {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });

        },//add
        edit: function () {

            let params = {
                "action": "3",
                "name": $("#InputName").val(),
                "phone": $("#InputPhone").val(),
                "rfc": $("#InputRfc").val(),
                "social": $("#InputSocial").val(),
                "address": $("#InputAddress").val(),
                "postal": $("#InputIdPostal").val(),
                "contact": $("#InputContactPerson").val(),
                "contactMail": $("#InputClientEmail").val(),
                "id": $("#InputId").val()
            }

            $.ajax(
                {
                    data: params,
                    url: "class/clientes/clientes.fn.php",
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 'OK') {
                            swal("Success!", "Cliente Modificado", "success");
                        } else {
                            swal("Error!", 'No se pudo realizar el cambio...', "error");
                        }
                    },
                    complete: function(){
                        clientes.get();
                    },
                    error: function (xhr, tStatus, err) {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });

        },//edit
        delete: function(){
            let params = {
                "action": "4",
                "id": $("#InputId").val()
            }

            $.ajax(
                {
                    data: params,
                    url: "class/clientes/clientes.fn.php",
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 'OK') {
                            swal("Success!", "Cliente Deshabilitado", "info");
                        } else {
                            swal("Error!", 'No se pudo realizar el cambio...', "error");
                        }
                    },
                    complete: function(){
                        clientes.get();

                    },
                    error: function (xhr, tStatus, err) {
                        swal("", tStatus + " --- " + xhr.responseText, "error");
                    }
                });
        }//delete
    }

const common = {
    /**********************/
    createDataTable: function (id, rows) {
        rows = typeof rows !== 'undefined' ? rows : 5;
        var table;
        if ( $.fn.dataTable.isDataTable(id) ) {
            table = $(id).DataTable();
        }
        else {
            table = $(id).DataTable({
                //"autoWidth": false,
                "pageLength": rows,
                "pagingType": "full",
                "info": true,
                "lengthChange": false,
                "searching": true,
                "dom": "<pi<t>>",
                /*
                 "fnInfoCallback": function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
                     var o = this.fnPagingInfo();
                     return "Página " + (o.iPage + 1) + " de " + o.iTotalPages;
                 },*/
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

    },//createDataTable
    showfrm: function (opt) {

        $("#"+opt.form).show();
        $("#"+opt.table).hide();

        if(opt.btn==1){
            $("#btnAdd").show();
            $("#btnEdit").hide();
            $("#btnDelete").hide();
        }else if(opt.btn==2){
            $("#btnAdd").hide();
            $("#btnEdit").show();
            $("#btnDelete").show();
        }

    }

    /**********************/
};



