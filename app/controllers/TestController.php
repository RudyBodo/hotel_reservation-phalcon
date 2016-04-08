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
        $form = new testForm;
        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $checkin = $this->request->getPost('checkin');
                $checkout = $this->request->getPost('checkout');
            }
        }
        $this->view->form = $form;
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
