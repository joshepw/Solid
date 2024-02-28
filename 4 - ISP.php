<?php

/**
 * Principio de Segregación de Interfaces (ISP - Interface Segregation Principle):
 * 
 * Este principio establece que una clase no debe verse obligada a implementar interfaces que no utiliza. Aquí hay un ejemplo:
 */

 // Incorrecto
interface Trabajador {
    public function trabajar();
    public function tomarDescanso();
}

class Oficinista implements Trabajador {
    public function trabajar() {
        // lógica para trabajar
    }

    public function tomarDescanso() {
        // lógica para tomar un descanso
    }
}

// Correcto
interface Trabajador {
    public function trabajar();
}

interface Descansador {
    public function tomarDescanso();
}

class Oficinista implements Trabajador, Descansador {
    public function trabajar() {
        // lógica para trabajar
    }

    public function tomarDescanso() {
        // lógica para tomar un descanso
    }
}
