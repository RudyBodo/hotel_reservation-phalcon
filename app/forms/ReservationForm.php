<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class ReservationForm extends Form
{

    public function initialize()
    {
        //field checkin
        $checkin = new text('checkin');
        $checkin->addValidators(array(
            new PresenceOf(array(
                'message' => 'Checkin date is required'
            ))
        ));
        $this->add($checkin);

        //field checkout
        $checkout = new text('checkout');
        $checkout->addValidators(array(
            new PresenceOf(array(
                'message' => 'Checkout date is required'
            ))
        ));
        $this->add($checkout);
    }

    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}
