<?php

class Users extends \Phalcon\Mvc\User\Module

{

    function add($user, $username, $fullname, $email, $address, $phone_number, $password) {

        $user->assign(array(
            'username'      => $username,
            'fullname'      => $fullname,
            'email'         => $email,
            'address'       => $address,
            'phone_number'  => $phone_number,
            'password'      => $this->setHash($password),
        ));

    }

    function saveUser($data) {

        if(!$data->save()) {

            return $this->view->error = $data->getMessages();
        }
        else {

            return $this->view->success = "Registration Success";
        }
    }

    function assignRoles($param, $roles) {

        $user_roles = new UserRoles();
        $user_roles->assign(array(

            'user_id' => $param,
            'role_id' => $roles
        ));

        return $user_roles;
    }

    function checkRoles($username) {

        $user = User::findFirstByUsername($username);
        $user_roles = UserRoles::findFirstByUser_id($user->id);

        return $user_roles->role_id;

    }

    function checkUser($username) {

        $user = User::findFirstByUsername($username);
        return $user;

    }

    function setHash($param) {

        return $this->security->hash($param);
    }

    function checkHashUser($username, $password) {

        $user = User::findFirstByUsername($username);
        return $this->security->checkHash($password, $user->password);
    }

    function setSessionUser($username, $indentity) {

        $user = User::findFirstByUsername($username);

        $session = $this->session->set(
        $indentity,
        array(
            'id' => $user->id,
            'username' => $user->username
            )
        );

        return $session;
    }

    function getUser($session) {

        $identity = $this->session->get($session);
        return $identity['username'];
    }
}
