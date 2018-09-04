<?php
    /*
        $archivo = fopen("archivo.txt","modo");
        modo: 
        r  r+
        w  w+
        a  a+
        x  x+
        fclose($archivo)
        fwrite($archivo, "string");
        fread para leer archivo: echo fread($archivo,filesize("archivo.txt"));
        fgets leer linea echo fgets($archivo);
        copy copiar archivos copy("origen.txt","destino.txt");
        unlink borrar archivo unlink("destino.txt");

        GET -> traer
        POST -> insertar;
        put -> modificar;
        delete -> borrar

        explode separar cadena string por caracter
    */
    $archivo = fopen("archivo.txt","a+");
    if(isset($_POST['nombre'])){
        fwrite($archivo,$_POST['nombre'].";"); 
    }
    if(isset($_POST['apellido'])){
        fwrite($archivo,$_POST['apellido'].";"); 
    }
    if(isset($_POST['legajo'])){       
        fwrite($archivo,$_POST['legajo'].";"); 
    }
    //fwrite($archivo,"".PHP_EOL);
    fclose($archivo);   

    
    $archivo = fopen("archivo.txt","a+");
    if(isset($_GET['legajo']))
    {
        $legajoBusqueda = $_GET['legajo'];
        echo "Buscando legajo ".$legajoBusqueda."<br>";
        
        while(!feof($archivo))
        {
            $linea = fgets($archivo);
            $persona = explode(";",$linea);

            echo "Nombre: ".$persona[0]."<br>";
            echo "Apellido: ".$persona[1]."<br>";
            //echo "Legajo: ".$persona[2]."<br>";
        } 
    }else
    {
        while (!feof($archivo)) {
            echo fgets($archivo);
        }
    }
    fclose($archivo);   
    
    //copy("archivo.txt","archivocopy.txt");
    //unlink("archivocopy.txt");
?>
