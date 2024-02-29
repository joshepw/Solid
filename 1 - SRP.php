<?php

/**
 * Pincipio de Responsabilidad Única (SRP - Single Responsibility Principle):
 * 
 * Este principio establece que una clase debe tener una sola razón para cambiar. Aquí hay un ejemplo en Laravel:
 */

interface SQL {
	public static function tablaExiste(): bool;
	public static function guardarModelo(): bool;
}

// Incorrecto
class Usuario {
	private string $nombre;
	private int $edad;

    public function guardarUsuario($datos) {
        // lógica para guardar un usuario en la base de datos
    }

    public function enviarCorreoBienvenida($correo) {
        // lógica para enviar un correo de bienvenida
    }

	public function crearUsuario($nombre, $edad): bool {
		if (strlen($nombre) < 3) {
			return false;
		}

		if ($edad < 18) {
			return false;
		}

		$this->nombre = $nombre;
		$this->edad = $edad;

		if (SQL::tablaExiste()) {
			SQL::guardarModelo('tabla', $nombre, $edad);

			return true;
		} else {
			return false;
		}
	}
}

// Correcto
class UsuarioRepository {
	private string $nombre;
	private int $edad;

	private function validarDatosDeUsuario(string $nombre, int $edad): ?bool {
		if (strlen($nombre) < 3) {
			return false;
		}

		if ($edad < 18) {
			return false;
		}
	}

	private function asignarValoresAPropiedades(string $nombre, int $edad) {
		$this->nombre = $nombre;
		$this->edad = $edad;
	}

	private function guardarUsuarioEnBaseDeDatos(string $nombre, int $edad): bool {
		if (SQL::tablaExiste()) {
			SQL::guardarModelo('tabla', $nombre, $edad);

			return true;
		} else {
			return false;
		}
	}

    public function guardarUsuario($datos) {
        // lógica para guardar un usuario en la base de datos
    }

	public function crearUsuario($nombre, $edad): bool {
		if (!$this->validarDatosDeUsuario($nombre, $edad)) {
			return false;
		}

		$this->asignarValoresAPropiedades($nombre, $edad);

		return $this->guardarUsuarioEnBaseDeDatos($nombre, $edad);
	}
}

class CorreoService {
    public function enviarCorreoBienvenida($correo) {
        // lógica para enviar un correo de bienvenida
    }
}
