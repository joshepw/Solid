<?php

/**
 * Pincipio de Responsabilidad Única (SRP - Single Responsibility Principle):
 * 
 * Este principio establece que una clase debe tener una sola razón para cambiar. Aquí hay un ejemplo en Laravel:
 */

// Incorrecto
class Usuario {
    public function guardarUsuario($datos) {
        // lógica para guardar un usuario en la base de datos
    }

    public function enviarCorreoBienvenida($correo) {
        // lógica para enviar un correo de bienvenida
    }
}

// Correcto
class UsuarioRepository {
    public function guardarUsuario($datos) {
        // lógica para guardar un usuario en la base de datos
    }
}

class CorreoService {
    public function enviarCorreoBienvenida($correo) {
        // lógica para enviar un correo de bienvenida
    }
}
