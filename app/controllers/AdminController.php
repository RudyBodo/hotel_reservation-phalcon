<?php

class AdminController extends \Phalcon\Mvc\Controller
{
    public function validateAction() {

        $this->session->has('auth-admin');
    }

    private function _registerSession($admin)
    {
        $this->session->set(
            'auth-admin',
            array(
                'id' => $admin->id,
                'username' => $admin->username
            )
        );
    }

    public function indexAction()
    {
        if(!$this->session->has('auth-admin')) {

            $this->response->redirect('admin/login');
        }

    }

    public function loginAction()
    {

        if($this->request->isPost()) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            //check existing user
            $admin = User::findFirstByUsername($username);

            $check_hash = $this->security->checkHash($password, $admin->password);
            $check_role = UserRoles::findFirstByUser_id($admin->id);

            if($admin) {

                //check hash password
                if($check_hash) {

                    //check roles
                    if($check_role->role_id == 1) {
                        $this->_registerSession($admin);
                        $this->response->redirect('admin');
                    }
                }
                else {
                    $this->flash->error('wrong username and password');
                }
            }
            else {
                $this->flash->error('username not exist');
            }
        }
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

                $this->flash->success("User Registration Success");

                return $this->response->redirect('session/login');
            }
        }
    }

}

