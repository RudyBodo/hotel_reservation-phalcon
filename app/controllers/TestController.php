<?php

class TestController extends \Phalcon\Mvc\Controller
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

    public function indexAction()
    {
        $user = new User();

        $user->assign(array(
            'username' => 'admin',
            'fullname' => 'qwerty',
            'email' => 'transkumba@gmail.com',
            'address' => 'Jalan Pisang',
            'phone_number' => '081223997987',
            'password' => $this->security->hash(andirudini123),
        ));

        $userRoles = new UserRoles();
        $userRoles->assign(array(
            'user_id' => '$userId',
            'role_id' => 1
        ));

        $user->UserRoles = $userRoles;

        if (!$user->save()) {

            $this->flash->error($user->getMessages());
        } else {

            $this->flash->success("User Registration Success");
        }
    }

    public function loginAction()
    {
        $username = 'admin';
        $password = andirudini123;

        //check existing user
        $admin = User::findFirstByUsername($username);

        $check_hash = $this->security->checkHash($password, $admin->password);
        $check_role = UserRoles::findFirstByUser_id($admin->id);

        if($admin) {
            //check hash password
            if($check_hash) {

                $this->flash->success('password hash check success');
                //check roles
                if($check_role->role_id == 1)

                    $this->_registerSession($admin);
                    $this->response->redirect('admin');
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




