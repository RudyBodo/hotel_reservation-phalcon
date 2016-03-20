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
                'role_id' => 2
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

    public function loginAction()
    {
        if($this->request->isPost()) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            //check existing user and hash password
            $user = User::findFirstByUsername($username);

            if($user) {

                if($this->security->checkHash($password, $user->password)) {

                    //create session to user
                    $this->_registerSession($user);
                    $this->flash->success('Login Success');
                    return $this->response->redirect('user');
                }
                else {
                    $this->flash->error('Wrong username and password');
                }
            }
            else {
                $this->flash->error('User not exist');
            }
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->flash->success('Good Bye');
    }
}

