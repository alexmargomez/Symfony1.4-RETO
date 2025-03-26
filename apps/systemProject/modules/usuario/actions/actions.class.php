<?php

class usuarioActions extends sfActions
{
    public function executeLogin(sfWebRequest $request)
    {
        $this->form = new LoginForm();

        if ($request->isMethod('post'))
        {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid())
            {
                $values = $this->form->getValues();
                if ($this->authenticate($values['email'], $values['password']))
                {
                    $this->getUser()->setAuthenticated(true);
                    $this->redirect('@homepage');
                }
                else
                {
                    $this->getUser()->setFlash('error', 'Invalid email or password');
                }
            }
        }
    }

    protected function authenticate($email, $password)
    {
        $usuario = Doctrine_Core::getTable('Usuario')->findOneByEmail($email);
        if ($usuario && $usuario->getPassword() === sha1($password))
        {
            $this->getUser()->setAttribute('usuario_id', $usuario->getId());
            return true;
        }
        return false;
    }

    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearCredentials();
        $this->getUser()->getAttributeHolder()->clear();
        $this->redirect('@login');
    }

    public function executeRegister(sfWebRequest $request)
    {
        $this->form = new UsuarioForm();

        if ($request->isMethod('post'))
        {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid())
            {
                $this->form->save();
                $this->redirect('@login');
            }
        }
    }
}