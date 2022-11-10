<?php


if (isset($_POST)){

    $info = json_encode($_POST);

    if(!is_dir('datos')){
        mkdir('datos');
    }

    $t = time();
    file_put_contents("datos/{$t}.dat", $info);

}
 

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Formulario de becas</title>
    <style>
        
.validacion{

color:red !important ;
}

    </style>
</head>
    
<body>

    <form id="formBeca" method ="post">

        <div class="parent">

        <div class="child1"></div>

        <div  class="child2">
            <div class=" imagenHTML">

                <img src="img/banner5.jpg"/>
                </div>
            
                <br/>
                <h3>Formulario de becas</h3>
                <table style="margin-left: 10px;">
            
                    <tr>
                        <th>Nombre</th>
                        <td> <input  type = "text" name= "nombre"/></td>
                    </tr>
 
                    <tr>
                        <th>Apellido</th>
                        <td> <input  type = "text" name= "apellido"/> </td>
                    </tr>
            
                    <tr>
                        <th>Cedula</th>
                        <td> <input  type = "text" name= "cedula"/> </td>
                    </tr>
            
                    <tr>
                        <th>Direccion</th>
                        <td> <input  type = "text" name= "direccion"/> </td>
                    </tr>

                    <tr>
                        <th>Fecha de nacimiento</th>
                        <td> <input  type = "text" name= "nacimiento"/> </td>
                    </tr>

                    <tr>
                        <th>Sexo</th>
                        <td> <select name= "sexo" id= "sexo"> 
                            <option value="M" >Masculino</option>
                            <option value="F" >Femenino</option>
                        </select> </td>
                    </tr>

                    <tr>
                        <th>Tipo de sangre</th>
                        <td> <input  type = "text" name= "sangre"/> </td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td> <input  type = "text" name= "email"/> </td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td> <input  type = "text" name= "telefono"/> </td>
                    </tr>

                    <tr>
                        <th>Celular</th>
                        <td> <input  type = "text" name= "celular"/> </td>
                    </tr>

                    <tr>
                        <th>Estado civil</th>
                        <td> <select name = "estadocivil" id= "estadocivil"> 
                            <option value="Soltero/a" >Soltero/a</option>
                            <option value="Casado/a" >Casado/a</option>
                        </select> </td>
                    </tr>

                    <tr>
                        <th>Color Favorito</th>
                        <td> <input  type = "text" name= "color"/> </td>
                    </tr>

                    <tr>
                        <th>Equipo de pelota favorito</th>
                        <td> <input  type = "text" name= "pelota"/> </td>
                    </tr>

                    <tr>
                        <th>Promedio de notas del bachillerato</th>
                        <td> <input  type = "text" name= "promedio"/> </td>
                    </tr>

                    <tr>
                        <th>Comentario</th>
                        <td> <textarea name="comment" rows="5" cols="24"></textarea> </td>
                    </tr>
            
                </table>
                <br/>

                <i class="iconStyle fa-regular fa-floppy-disk" onClick= validar()></i><br/><br/>

                <fieldset>
                            <legend>Datos Agregados </legend>
                            <div id="tblDatos">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cedula</th>
                                            <th>Direccion</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Sexo</th>
                                            <th>Tipo de sangre</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Estado Civil</th>
                                            <th>Color Favorito</th>
                                            <th>Equipo de pelota favorito</th>
                                            <th>Promedio de notas del bachillerato</th>
                                            <th>Comentario</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php

                                        if(is_dir('datos')){

                                            $archivos = scandir('datos');

                                            foreach($archivos as $arc){
                                                $ruta = "datos/{$arc}";
                                            
                                                if(is_file($ruta)){
                                                $info = file_get_contents($ruta);
                                                $info = json_decode($info);
                                                
                                                echo "<tr>";
                                                    foreach($info as $campo){
                                                        echo "<td>
                                                        {$campo}
                                                        </td>";
                                                    }
                                                echo "</tr>";
                                                }
                                            }
                                        }
                                        
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div >
                        </fieldset>
                </div>

                <div class="child3"></div>


            <hr/>
        </div>
    </form>
</body>

<script src="validacion.js"></script>
</html>