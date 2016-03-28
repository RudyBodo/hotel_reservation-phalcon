<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class SignUpForm extends Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {
        //username fields
        $username = new Text('username');
        $username->setLabel('Username');
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Username is required'
            ))
        ));
        $this->add($username);

        //fullname fields
        $fullname = new Text('fullname');
        $fullname->setLabel('Fullname');
        $fullname->addValidators(array(
            new PresenceOf(array(
                'message' => 'Fullname is required'
            )),

            new StringLength(array(
                'min' => 5,
                'message' => 'username is too short. minimun 8 chackters'
            ))
        ));
        $this->add($fullname);

        //email fields
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'The email is required'
            )),
            new Email(array(
                'message' => 'The email is not valid'
            ))
        ));
        $this->add($email);

        //address fields
        $address = new Text('address');
        $address->setLabel('Address');
        $address->addValidators(array(
            new PresenceOf(array(
           'message' => 'Address is Required'
            ))
        ));
        $this->add($address);

        //phone_number fields
        $phone_number = new Text('phone_number');
        $phone_number->setLabel('Phone Number');
        $phone_number->addValidators(array(
            new PresenceOf(array(
                'message' => 'Phone number is required'
            ))
        ));

        $this->add($phone_number);

        //field password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'The password is required'
            )),

            new StringLength(array(
                'min' => 8,
                'messageMinimun' => 'Password is too short minimun 8 characters'
            )),

            new Confirmation(array(
                'message' => 'Password doesnt Confirmation',
                'with' => 'confirmPassword'
            ))
        ));
        $this->add($password);

        //confirm paswword
        $confirmPassword = new Password('confirmPassword');
        $confirmPassword->setLabel('Confirm Password');
        $confirmPassword->addValidators(array(
            new PresenceOf(array(
                'messages' => 'The confirm password must is required'
            ))
        ));

        $this->add($confirmPassword);

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