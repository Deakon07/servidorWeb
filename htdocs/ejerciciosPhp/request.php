<?php
    
    print_r($_REQUEST["nombre"]);
    print_r($_REQUEST['nacido']);
    //print_r($_REQUEST['hm']);
    
    if($_REQUEST["nombre"]==""){
      print_r("No ha escrito ningun nombre");
    }else{
        print_r("Su nombre es ".$_REQUEST['nombre']);
      }

      
    ?>