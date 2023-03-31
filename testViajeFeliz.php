<?php
include 'viajeFeliz.php';

$objViaje = new Viaje(0, 0, 0, array());

$salir = false;

while($salir == false){
    echo "Menú de opciones: \n";
    echo "1- Ingresar información del viaje \n";
    echo "2- Modificar información del viaje \n";
    echo "3- Agregar pasajero \n";
    echo "4- Modificar datos del pasajero \n";
    echo "5- Ver datos del viaje \n";
    echo "6- Salir \n";
    echo "Elija una opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            //pide ingresar datos del viaje
            echo "Ingrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            $objViaje = new Viaje($codigo, $destino, $maxPasajeros, "");
            echo "Se cargaron los datos correctamente. \n";
            break;
        
        case 2:
            //modificar datos del viaje
            echo "Ingrese el nuevo código: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la nueva cantidad máxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            $objViaje -> setCodigo($codigo);
            $objViaje -> setDestino ($destino);
            $objViaje -> setMaxPasajeros($maxPasajeros);
            echo "Se modificaron los datos correctamente. \n";
            break;

        case 3: 
            //Agrega un pasajero
            $cantP = 0;
            for ($cantP=0; $cantP < $maxPasajeros ; $cantP++) { 
            echo "Ingrese el nombre: ";
            $nomP = trim(fgets(STDIN));
            echo "Ingrese el apellido: ";
            $apllP = trim(fgets(STDIN));
            echo "Ingrese el número de documento: ";
            $docP = trim(fgets(STDIN));
            $objViaje -> agregarPasajeros($nomP, $apllP, $docP);
            echo "Se agregó correctamente. \n";
            }
            break;

        case 4:
            //permite modificar los datos del pasajero
            echo "Ingrese el número de documento: ";
            $docP = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre: ";
                $nomP = trim(fgets(STDIN));
                echo "Ingrese el nuevo apellido: ";
                $apllP = trim(fgets(STDIN));
            $modP = $objViaje-> modificarPasajeros($docP, $nomP, $apllP);
            if($modP == false){
                echo "No hay ningun pasajero con el DNI: ". $docP."\n";
            } else {
                echo "Se modificaron los datos correctamente. \n";
            }
            

            break;

        case 5:
            //permite ver los datos del viaje
            echo "Código del viaje: ". $codigo. "\n";
            echo "Destino: ". $destino. "\n";
            echo "Cantidad máxima de pasajeros: ". $maxPasajeros. "\n";
            $arrayP = $objViaje->getPasajeros();
            print_r($arrayP);
            break;

        case 6:
            $salir = true;
            break;


    }
}

