<?php

/**
 * Principio de Inversión de Dependencias (DIP - Dependency Inversion Principle):
 * 
 * Este principio establece que las dependencias deben ser sobre abstracciones y no sobre implementaciones. Aquí hay un ejemplo:
 */

 // Incorrecto
class Lampara {
    public function encender() {
        // lógica para encender la lámpara
    }
}

class Interruptor {
    private $lampara;

    public function __construct(Lampara $lampara) {
        $this->lampara = $lampara;
    }

    public function presionar() {
        $this->lampara->encender();
    }
}

// Correcto
interface Dispositivo {
    public function encender();
}

class Lampara implements Dispositivo {
    public function encender() {
        // lógica para encender la lámpara
    }
}

class Interruptor {
    private $dispositivo;

    public function __construct(Dispositivo $dispositivo) {
        $this->dispositivo = $dispositivo;
    }

    public function presionar() {
        $this->dispositivo->encender();
    }
}
