<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginController  extends AppController {

    public function index() {

        View::template(null);
        
    }

    public function login() {
// Si se loguea se redirecciona al módulo de cliente
        if (Load::model('usuario')->login()) {
            Router::toAction('usuario/panel');
        }
    }

    public function logout() {
// Termina la sesion
        Load::model('usuario')->logout();
        Router::toAction('login');
    }

}

?>