<?php

class SessionController extends ControllerBase
{

    public function indexAction() {

        return $this->response->redirect('/session/login');
    }

    public function signupAction()
    {
        $form = new SignUpForm();

        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $user = new User();

                $username = $this->request->getPost('username');
                $fullname = $this->request->getPost('fullname');
                $email = $this->request->getPost('email');
                $address = $this->request->getPost('address');
                $phone_number = $this->request->getPost('phone_number');
                $password = $this->request->getPost('password');

                //call fucntion add users
                $reg = new Users();
                $reg->add($user, $username, $fullname, $email, $address, $phone_number, $password);

                $user->UserRoles = $reg->assignRoles($user->id, 2);
                //save data to database;
                $reg->saveUser($user);
            }
        }

        $this->view->form = $form;
    }

    public function loginAction()
    {
        $form = new LoginForm();

        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost())) {

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $login = new Users();
                //check existing users
                if($login->checkUser($username)) {
                    //check hashing password
                    if($login->checkHashUser($username, $password)){
                        //make session if hashing password valid
                        $session = 'auth-user';
                        $login->setSessionUser($username, $session);
                        return $this->response->redirect('user');
                    }
                    else {

                        $this->view->error = "Username or Password";
                    }
                }
                else {

                    $this->view->error = "user not valid";
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
