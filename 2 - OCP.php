<?php

/**
 * Principio de Abierto/Cerrado (OCP - Open/Closed Principle):
 * 
 * Este principio establece que una clase debe estar abierta para su extensión pero cerrada para su modificación. Aquí hay un ejemplo:
 */

 // Incorrecto
class Descuento {
    public function aplicarDescuento($monto, $tipo) {
        if ($tipo === 'Estudiante') {
            return $monto * 0.8;
        } elseif ($tipo === 'Empleado') {
            return $monto * 0.9;
        }
    }
}

// Correcto
interface DescuentoInterface {
    public function aplicarDescuento($monto);
}

class DescuentoEstudiante implements DescuentoInterface {
    public function aplicarDescuento($monto) {
        return $monto * 0.8;
    }
}

class DescuentoEmpleado implements DescuentoInterface {
    public function aplicarDescuento($monto) {
        return $monto * 0.9;
    }
}
