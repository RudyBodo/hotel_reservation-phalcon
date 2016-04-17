<?php

class AdminController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        if(!$this->session->has('auth-admin')) {

            $this->response->redirect('admin/login');
        }

    }

    public function loginAction()
    {
        $form = new LoginForm();

        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $login = new Users();

                //check existing users
                if($login->checkUser($username)) {
                    //check hashing user
                    if($login->checkHashUser($username, $password)) {
                        //check roles user
                        if($login->checkRoles($username) == 1) {
                        
                            //make session if user valid
                            $session = 'auth-admin';
                            $login->setSessionUser($username, $session);
                            //redirect users in hotel page when valid
                            return $this->response->redirect('hotel');
                        }
                        else {

                            $this->view->error = "Permission Error";
                        }
                    }
                    else {
                        $this->view->error = "Username or password";
                    }
                }
                else {

                    $this->view->error = "User not valid";
                }
            }
        }
        $this->view->form = $form;
    }

    public function view_userAction(){

        $this->view->user = User::find();
    }

    public function addAction() {

        if($this->request->isPost()) {

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
                'role_id' => 3
            ));

            $user->UserRoles = $userRoles;

            if(!$user->save()) {

                $this->flash->error($user->getMessages());
            }
            else {

                $this->view->msg = 'Add user was successfully';

                return $this->response->redirect('session/login');
            }
        }
    }

}
