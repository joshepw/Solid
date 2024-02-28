<?php

/**
 * Principio de Sustitución de Liskov (LSP - Liskov Substitution Principle):
 * 
 * Este principio establece que los objetos de una clase base deben poder ser reemplazados por objetos de sus clases derivadas sin afectar la correctitud del programa. Aquí hay un ejemplo:
 */

// Incorrecto
class Pajaro {
    public function volar() {
        // lógica para volar
    }
}

class Pinguino extends Pajaro {
    public function volar() {
        // Pinguinos no vuelan, pero deben implementar este método
    }
}

// Correcto
interface Volador {
    public function volar();
}

class Pajaro implements Volador {
    public function volar() {
        // lógica para volar
    }
}

class Pinguino implements NoVolador {
    // No es necesario implementar el método volar
}
