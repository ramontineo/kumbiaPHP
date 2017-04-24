/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Unes
 * Created: 19-mar-2017
 */

ALTER TABLE usuario ADD CONSTRAINT fk_persona_a_usuario FOREIGN KEY (persona_id) REFERENCES persona(id);