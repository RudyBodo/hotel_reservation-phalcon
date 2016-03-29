<?php

class SessionController extends ControllerBase
{

    private function _registerSession($user) {

       $this->session->set(
           'auth-user',
           array(
               'id' => $user->id,
               'username' => $user->username
           )
       );
    }

    public function signupAction()
    {
        $form = new SignUpForm();

        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $user = new User();

                $user->assign(array(
                    'username' => $this->request->getPost('username'),
                    'fullname' => $this->request->getPost('fullname'),
                    'email' => $this->request->getPost('email'),
                    'address' => $this->request->getPost('address'),
                    'phone_number' => $this->request->getPost('phone_number'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                ));

                $userRoles = new UserRoles();
                $userRoles->assign(array(
                    'user_id' => '$userId',
                    'role_id' => 2
                ));

                $user->UserRoles = $userRoles;

                if (!$user->save()) {

                    $this->view->error = $user->getMessages($user);
                } else {

                    $this->view->msg ="Registration Success";
                }
            }
        }

        $this->view->form = $form;
    }

    public function loginAction()
    {
        $form = new LoginForm();

        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                //check existing user and hash password
                $user = User::findFirstByUsername($username);

                if ($user) {

                    if ($this->security->checkHash($password, $user->password)) {

                        //create session to user
                        $this->_registerSession($user);
                        $this->view->msg = "Login Success";
                        return $this->response->redirect('user');
                    } else {

                        $this->view->error = 'Wrong username or password';
                    }
                } else {
                    $this->view->error = "User not exist";
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->flash->success('Good Bye');
    }
}

