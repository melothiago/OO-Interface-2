<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador{
    //Atributos
    private $volume;
    private $ligado;
    private $tocando;
    // Metodos especiais
    function __construct() {
        
        $this->volume = 50;
        $this->ligado = FALSE;
        $this->tocando = FALSE;
        
    }
    private function getVolume() {
        return $this->volume;
    }
    private function getLigado() {
        return $this->ligado;
    }
    private function getTocando() {
        return $this->tocando;
    }
    private function setVolume($volume) {
        $this->volume = $volume;
    }
    private function setLigado($ligado) {
        $this->ligado = $ligado;
    }
    private function setTocando($tocando) {
        $this->tocando = $tocando;
    }
    // Sobrescrevendo metodos
    public function ligar() {
        $this->setLigado(TRUE);
    }
    public function desligar() {
        $this->setLigado(FALSE);
    }
    public function abrirMenu() {
        echo "<br>------- MENU -------";
        echo "<br>Esta ligado?: " . ($this->getLigado()?"Sim":"Nao");
        echo "<br>Esta tocando?: " . ($this->getTocando()?"Sim":"Nao");
        echo "<br>Volume: " . $this->getVolume();
        
        for ($i=0; $i <= $this->getVolume(); $i+=10){
            echo "|";
        }
        echo "<br>";
    }
    public function fecharMenu() {
        echo "<br>Fechando menu...";
    }
    public function maisVolume() {
        if($this->getLigado()){
            $this->setVolume($this->getVolume() + 5);
        }else{
            echo "</br>Nao posso aumentar volume!";
        }
    }
    public function menosVolume() {
        if($this->getLigado()){
            $this->setVolume($this->getVolume() - 5);
        }else{
            echo "</br>Nao posso diminuir volume!";
        }
    }
    public function ligarMudo() {
        if($this->getLigado() && $this->getVolume() > 0){
            $this->setVolume(0);
        }
    }
    public function desligarMudo() {
        if($this->getLigado() && $this->getVolume() == 0){
            $this->setVolume(50);
        }
    }
    public function play() {
        if($this->getLigado() && !($this->getTocando())){
            $this->setTocando(TRUE);
        }
    }
    public function pause() {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(FALSE);
        }
    }
}
