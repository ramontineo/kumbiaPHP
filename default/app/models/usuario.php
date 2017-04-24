<?php
// Carga de la libreria auth2
Load::lib('auth2');

class Usuario extends ActiveRecord
{
    /**
     * Iniciar sesion
     *
     */
    public function login()
    {
        // Obtiene el adaptador
        $auth = Auth2::factory('model');

        // Modelo que utilizará para consultar
        $auth->setModel('usuario');

        if($auth->identify()) return true;
        
        Flash::error($auth->getError());
        return false;
    }

    /**
     * Terminar sesion
     * 
     */
    public function logout()
    {
        Auth2::factory('model')->logout();
    }

    /**
     * Verifica si el usuario esta autenticado
     * 
     * @return boolean
     */
    public function logged()
    {
        return Auth2::factory('model')->isValid();
    }
}
?>