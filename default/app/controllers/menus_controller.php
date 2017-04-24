<?php

/**
 * Carga del modelo Menus...
 */
Load::models('menus');

class MenusController extends AppController {

    /**
     * Obtiene una lista para paginar los menus
     */
    public function index($page = 1) {
        View::template('dashboard');
        $menu = new Menus();
        $this->listMenus = $menu->getMenus($page);
    }

    /**
     * Crea un Registro
     */
    public function create() {
        /**
         * Se verifica si el usuario envio el form (submit) y si ademas
         * dentro del array POST existe uno llamado "menus"
         * el cual aplica la autocarga de objeto para guardar los
         * datos enviado por POST utilizando autocarga de objeto
         */
        if (Input::hasPost('menus')) {
            /**
             * se le pasa al modelo por constructor los datos del form y ActiveRecord recoge esos datos
             * y los asocia al campo correspondiente siempre y cuando se utilice la convención
             * model.campo
             */
            $menu = new Menus(Input::post('menus'));
            //En caso que falle la operación de guardar
            if (!$menu->save()) {
                Flash::error('Falló Operación');
            } else {
                Flash::valid('Operación exitosa');
                //Eliminamos el POST, si no queremos que se vean en el form
                Input::delete();
            }
        }
    }

    /**
     * Edita un Registro
     *
     * @param int $id (requerido)
     */
    public function edit($id) {
        $menu = new Menus();

        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('menus')) {

            if (!$menu->update(Input::post('menus'))) {
                Flash::error('Falló Operación');
            } else {
                Flash::valid('Operación exitosa');
//enrutando por defecto al index del controller
                return Router::redirect(null, 10);
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->menus = $menu->find((int) $id);
        }
    }

    /**
     * Eliminar un menu
     *
     * @param int $id (requerido)
     */
    public function del($id) {
        $menu = new Menus();
        if (!$menu->delete((int) $id)) {
            Flash::error('Falló Operación');
        } else {
            Flash::valid('Operación exitosa');
        }

        //enrutando por defecto al index del controller
        return Router::redirect();
    }

}
