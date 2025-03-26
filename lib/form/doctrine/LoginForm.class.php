<?php 

class LoginForm extends sfForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'email' => new sfWidgetFormInputText(),
            'password' => new sfWidgetFormInputPassword()
        ));

        $this->setValidators(array(
            'email' => new sfValidatorEmail(),
            'password' => new sfValidatorString(array('max_length' => 255))
        ));

        $this->widgetSchema->setNameFormat('login[%s]');
        $this->widgetSchema->setLabels(array(
            'email' => 'Correo Electrónico',
            'password' => 'Contraseña'
        ));
    }
}