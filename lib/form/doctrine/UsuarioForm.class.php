<?php

class UsuarioForm extends BaseUsuarioForm
{
    public function configure()
    {
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['email'] = new sfValidatorEmail();

        $this->widgetSchema->setLabels(array(
            'nombre' => 'Nombre',
            'email' => 'Correo Electrónico',
            'password' => 'Contraseña'
        ));
        
        // Ensure password is hashed before saving
        $this->validatorSchema['password'] = new sfValidatorCallback(array('callback' => array($this, 'hashPassword')));
    }

    public function hashPassword($validator, $value)
    {
        return sha1($value);
    }
}