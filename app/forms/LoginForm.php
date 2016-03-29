<?php
/**
 * Created by PhpStorm.
 * User: rudybodo
 * Date: 28/03/16
 * Time: 19:29
 */


use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form
{
    public function initialize($entitiy = null, $options = null)
    {
        //username fields
        $username = new Text('username', array(
            'placeholder' => 'Username'
        ));
        $username->setLabel('Username');
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Username is required'
            ))
        ));
        $this->add($username);

        //fieldpassword
        $password = new Password('password', array(
            'placeholder' => 'Password'
        ));
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password is required'
            ))
        ));
        $this->add($password);
    }

    public function  messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}