<?php
class Viaje{
    //atributos
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = array();

    //metodo
    public function construct($codigo, $destino, $maxPasajeros, $pasajeros){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajeros = $pasajeros;
    }

    //retornos
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }

    //valor
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setMaxPasajeros($maxPasajeros){
        $this->maxPasajeros = $maxPasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }

    /**
     * agrega pasajeros
     * @param string $nombre
     * @param string $apellido
     * @param float $dni
     */
    public function agregarPasajeros($nombre, $apellido, $dni){
        array_push($this->pasajeros, array('nombre'=> $nombre, 'apellido'=>$apellido, 'documento'=>$dni));
    }

    /**
     * permite modificar a los pasajeros
     * @param float $dni
     * @param string $nombre
     * @param string $apellido
     * @return boolean
     */
    public function modificarPasajeros($dni, $nombre, $apellido){
        $pasaj = $this->pasajeros;
        $c = count($pasaj);
        $encontrado = false;
        $i = 0;

        while($i < $c && $encontrado == false){
            if ($pasaj[$i]['documento'] == $dni) {
                $pasaj[$i]['nombre'] = $nombre;
                $pasaj[$i]['apellido'] = $apellido;
                $this->setPasajeros($pasaj);
                $encontrado = true;
            }
            $i++;


        }
       
        return $encontrado;
    }

    public function __toString(){
        return "". $this->getCodigo(). "". $this->getDestino(). "". $this->getMaxPasajeros(). "". $this->getPasajeros();
        
    }




}
