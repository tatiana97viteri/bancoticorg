<html lang="es">
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="images/test.png" type="image/x-icon" rel="shortcut icon" />
        <title>Banco TIC</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
        <link href="css/custom.css" rel="stylesheet">
        <link href="jqui/jquery-ui.min.css" rel="stylesheet">
		<!--<link href="css/themes/united.css" rel="stylesheet">-->
        <link href="css/carrusel.css" rel="stylesheet">
         <link href="css/custom.css" rel="stylesheet"> 
    </head>
    <body>
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12" style="background-color:white">
    <?php  menu(); ?>
    <?php   contenido();  ?>       
    </div>
        <script src="js/jquery-1.11.2.js"></script>
        <script src="jqui/jquery-ui.min.js"></script>      
        <script src="js/bootstrap.min.js"></script>  
		<script  type="text/javascript" src="js/nuevo.js"></script>



        <script>
		function ChequearTodos(chkbox)
            {
                for (var i = 0; i < document.forms["form1"].elements.length; i++)
                {
                    var elemento = document.forms[0].elements[i];
                    if (elemento.type == "checkbox")
                    {
                        elemento.checked = chkbox.checked;
                    }
                }
            }
			
			$("#ptipo").change(function()
            {
                $.post("entidades.php", {tipo:$(this).val()}, function(data){$("#id_entidad").html(data);})

                if($("#ptipo").val()==='5')
                {
                    $("#gobernacion").removeClass('hidden');
                    $("#aportes").removeClass('hidden');
                    $("#universidad").addClass('hidden');
                    $("#autores").addClass('hidden');
                    $("#id_dnp").addClass('hidden');
                    $("#nid_dnp").addClass('hidden');
                    
                }         

                if($("#ptipo").val()==='6')
                {
                    $("#gobernacion").addClass('hidden');
                    $("#aportes").addClass('hidden');
                    $("#universidad").addClass('hidden');
                    $("#autores").addClass('hidden');
                    $("#id_dnp").removeClass('hidden');
                    $("#nid_dnp").removeClass('hidden');
                }         
                                 

                if($("#ptipo").val()==='4')
                {
                    $("#gobernacion").removeClass('hidden');
                    $("#aportes").removeClass('hidden');
                    $("#universidad").addClass('hidden');
                    $("#autores").addClass('hidden');
                    $("#id_dnp").removeClass('hidden');
                    $("#nid_dnp").removeClass('hidden');
                }               

                if($("#ptipo").val()==='2')
                {
                    $("#gobernacion").addClass('hidden');
                    $("#aportes").removeClass('hidden');
                    $("#universidad").addClass('hidden');
                    $("#autores").addClass('hidden');
                    $("#id_dnp").addClass('hidden');
                    $("#nid_dnp").addClass('hidden');
                }

                if($("#ptipo").val()==='3')
                {
                    $("#gobernacion").addClass('hidden');
                    $("#aportes").addClass('hidden');
                    $("#universidad").removeClass('hidden');
                    $("#autores").removeClass('hidden');
                    $("#id_dnp").addClass('hidden');
                    $("#nid_dnp").addClass('hidden');
                }
            });
			
			 $("#pid_area").change(function()
            {
                $.post("programas.php", {id_area:$(this).val()}, function(data){$("#pid_programa").html(data);})               
            });

              $("#int_region").change(function()
            {
                $.post("departamentos.php", {int_region:$(this).val()}, function(data){$("#int_departamento").html(data);})               
            });	

               $("#int_region1").change(function()
            {
                $.post("departamentos.php", {int_region:$(this).val()}, function(data){$("#int_departamento1").html(data);})               
            }); 

              $("#int_departamento").change(function()
            {
                $.post("municipios.php", {int_departamento:$(this).val()}, function(data){$("#int_municipio").html(data);})               
            }); 

              $("#id_eje").change(function()
            {
                $.post("politicas.php", {id_eje:$(this).val()}, function(data){$("#id_politica").html(data);})               
            });

             $("#id_politica").change(function()
            {
                $.post("programa.php", {id_politica:$(this).val()}, function(data){$("#id_programa").html(data);})               
            });  

            $("#id_programa").change(function()
            {
                $.post("subprograma.php", {id_programa:$(this).val()}, function(data){$("#id_subprograma").html(data);})               
            });  

            $("#id_subprograma").change(function()
            {
                $.post("metas.php", {id_subprograma:$(this).val()}, function(data){$("#id_meta").html(data);})               
            });  

            $("#id_sectorg").change(function()
            {
                $.post("programasg.php", {id_sectorg:$(this).val()}, function(data){$("#id_programag").html(data);})               
            });  

            $(document).ready(function() {
                $(".dropdown-toggle").mouseover(function() {
                    $(this).click();
                });
				$("#eliminar").click( function () {
                    drop ();
                });
                
                $("#agregar").click( function () {
                    crear ();
                });
                $("#eliminar1").click( function () {
                    drop1 ();
                });
                
                $("#agregar1").click( function () {
                    crear1 ();
                });	
			   });

             $("#ids").click(function (){
                    $("#clave1").attr("disabled",false);
                });
                
                $("#idn").click(function (){
                    $("#clave1").attr("disabled",true);
                });

                $("#cam_clave1").blur(function (){
                    var clave1 = $("#cam_clave1").val();
                    var clave2 = $("#cam_clave2").val();
                    if(clave1.length>0)
                    {
                      if(clave2.length>0)
                      {
                        if(clave1===clave2)
                        {

                        }
                        else
                        {
                            alert("La clave nueva y la confirmación de la clave nueva no coincide");
                        }
                      }
                    }
                    else
                    {
                     
                    }
                });

                $("#cam_clave2").blur(function (){
                    var clave1 = $("#cam_clave1").val();
                    var clave2 = $("#cam_clave2").val();
                    if(clave2.length>0)
                    {
                      if(clave2.length>0)
                      {
                        if(clave1===clave2)
                        {

                        }
                        else
                        {
                            alert("La clave nueva y la confirmación de la clave nueva no coincide");
                        }
                      }
                    }
                    else
                    {
                     
                    }
                });

            $(document).on("click", ".open-Modal", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #cedula1").val( res[0] );
                $(".modal-body #nombre1").val( res[1] );
                $(".modal-body #tipo1").val( res[2] );
                $(".modal-body #correo1").val( res[3] );
                $(".modal-body #telefono1").val( res[4] );
                $(".modal-body #clasificacion1").val( res[5] );
                $(".modal-body #clave1").val( res[6] );
                $(".modal-body #id_entidad1").val( res[7] );
                $(".modal-body #id_usuario").val( res[8] );                
            });

             $(document).on("click", ".open-Modal1", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_clasificacion1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
            });

             $(document).on("click", ".open-Modal3", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_area1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
            });


             $(document).on("click", ".open-Modal2", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_sector1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
            });

             $(document).on("click", ".open-Modal5", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_departamento1").val( res[2] );
                $(".modal-body #id_departamento2").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
                $(".modal-body #int_region1").val( res[3] );
            });

              $(document).on("click", ".open-Modal4", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_programa1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
                $(".modal-body #id_area1").val( res[2] );
            });

              $(document).on("click", ".open-Modal6", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_municipio1").val( res[0] );
                $(".modal-body #id_municipio2").val( res[3] );
                $(".modal-body #detalle1").val( res[1] );
                $(".modal-body #int_departamento1").val( res[2] );
                $(".modal-body #int_region1").val( res[4] );
            });

              $(document).on("click", ".open-Modal7", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_entidades1").val( res[0] );
                $(".modal-body #razon_social1").val( res[1] );
                $(".modal-body #tipo1").val( res[2] );
            });

              $(document).on("click", ".open-Modal8", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_region1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
                $(".modal-body #int_region1").val( res[2] );
            });

              $(document).on("click", ".open-Modal9", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_eje1").val( res[0] );
                $(".modal-body #detalle1").val( res[1] );
            });

               $("#id_eje1").change(function()
            {
                $.post("politicas.php", {id_eje:$(this).val()}, function(data){$("#id_politica1").html(data);})               
            });

                $("#id_politica1").change(function()
            {
                $.post("programa.php", {id_politica:$(this).val()}, function(data){$("#id_programa1").html(data);})               
            });  

            $("#id_programa1").change(function()
            {
                $.post("subprograma.php", {id_programa:$(this).val()}, function(data){$("#id_subprograma1").html(data);})               
            });  

               $(document).on("click", ".open-Modal10", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_politica1").val( res[0] );
                $(".modal-body #id_eje1").val( res[2] );
                $(".modal-body #detalle1").val( res[1] );
            });

              $(document).on("click", ".open-Modal11", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_politica1").val( res[2] );
                $(".modal-body #id_eje1").val( res[3] );
                $(".modal-body #detalle1").val( res[1] );
                $(".modal-body #id_programa1").val( res[0] );
            });

              $(document).on("click", ".open-Modal12", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_politica1").val( res[0] );
                $(".modal-body #id_eje1").val( res[1] );
                $(".modal-body #detalle1").val( res[2] );
                $(".modal-body #id_programa1").val( res[3] );
                $(".modal-body #id_subprograma1").val( res[4] );
            });

          $(document).on("click", ".open-Modal13", function () {
                var Codigo = $(this).data('id');
                var res = Codigo.split("-");
                $(".modal-body #id_politica1").val( res[0] );
                $(".modal-body #id_eje1").val( res[1] );
                $(".modal-body #detalle1").val( res[2] );
                $(".modal-body #id_programa1").val( res[3] );
                $(".modal-body #id_subprograma1").val( res[4] );
                $(".modal-body #id_meta1").val( res[4] );
            });





        </script>
     <script>
            window.onload = function() {
                $("#pfecha").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1940:c'
                });
            };
        </script>
    </body>
</html>