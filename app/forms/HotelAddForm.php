<?php
/**
 * Created by PhpStorm.
 * User: rudybodo
 * Date: 29/03/16
 * Time: 0:36
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class HotelAddForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        //field name
        $name = new Text('name', array(
            'placeholder' => 'Enter hotels name'
            ));
        $name->setLabel('Hotels Name');
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Hotel name is required'
            ))
        ));
        $this->add($name);

        //field address
        $address = new Text('address', array(
            'placeholder' => 'Enter address hotels'
        ));
        $address->setLabel('Address');
        $address->addValidators(array(
            new PresenceOf(array(
                'message' => 'Address is required'
            ))
        ));
        $this->add($address);

        //field zipcode
        $zipcode = new Text('zipcode', array(
            'placeholder' => 'Enter zipcode hotels'
        ));
        $zipcode->setLabel('Zipcode');
        $zipcode->addValidators(array(
            new PresenceOf(array(
                'message' => 'Zipcode required'
            )),
            new StringLength(array(
                'min' => 5
            ))
        ));
        $this->add($zipcode);

        //field city
        $city = new Select('city', City::find(), array(
                'using' => array(
                    'id',
                    'city'
                )
            )
        );
        $city->setLabel('City');
        $this->add($city);

        //field Province
        $province = new Select('province', Province::find(), array(
            'using' => array(
                'id',
                'province'
            )
        ));
        $province->setLabel('Province');
        $this->add($province);

        //field country
        $country = new Select('country', Country::find(), array(
            'using' => array(
                'id',
                'country'
            )
        ));
        $country->setLabel('Country');
        $this->add($country);

        //field facility
        $facility_id = new Select('facility_id', Facility::find(), array(
            'using' => array(
                'id',
                'name'
            )
        ));
        $facility_id->setLabel('Facility');
        $this->add($facility_id);


        //field Value facility
        $amount = new Text('amount[]', array(
            'placeholder' => 'Enter Value Facility'
        ));
        $amount->setLabel('Value');
        $amount->addValidators(array(
            new PresenceOf(array(
                'message' => 'Value is required'
            ))
        ));
        $this->add($amount);

        $room = new Text('room[]', array(
        'placeholder' => "Room name"
        ));
        $room->addValidators(array(
            new PresenceOf(array(
                'message' => 'Room is required'
            ))
        ));
        $this->add($room);

        $price = new Text('price[]', array(
            'placeholder' => "Price Rooms"
        ));
        $price->addValidators(array(
            new PresenceOf(array(
                'message' => 'Price is required'
            ))
        ));
        $this->add($price);


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