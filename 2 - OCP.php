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
    public function aplicarDescuento($monto): float;
}

class Estudiante implements DescuentoInterface {
    public function aplicarDescuento($monto): float {
        return $monto * 0.8; // 20%
    }
}

class Empleado implements DescuentoInterface {
    public function aplicarDescuento($monto): float {
        return $monto * 0.9; // 10%
    }
}

class TerceraEdad extends Cliente implements DescuentoInterface {
    public function aplicarDescuento($monto): float {
		return 0.65; // 35%
	}
}

class Cliente {

}

// AssertTrue
$instance = new Estudiante();
if ($instance instanceof DescuentoInterface) { // true
	$instance->aplicarDescuento(100.00); // 80.0
}

// AssertFalse
$instance = new Cliente();
$instance instanceof DescuentoInterface; // false