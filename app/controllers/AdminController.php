<?php

class AdminController extends \Phalcon\Mvc\Controller
{

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

    public function indexAction() {

    }


    public function loginAction()
    {
        if($this->request->isPost()) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            //check existing user
            $admin = User::findFirstByUsername($username);

            if($admin != false) {

                //check hash password and Role
                if($this->security->checkHash($password, $admin->password)
                    AND ($this->$admin->UserRoles->role_id == 1)) {

                    $this->_registerSession($admin);
                    $this->response->redirect('admin');
                }
                else {
                    $this->flash->error('Check Admin Failure');
                }
            }

            else {
                $this->flash->error('Admin Not Exist');
            }
        }

    }

    public function registAction() {

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
                'role_id' => 1
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

