<?php

class TestController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $hotel = new Hotels();

        $hotel->assign(array(

            'name' => 'Hotel Bodo',
            'address' => 'BTN Minasaupa',
            'zipcode' => '92512',
            'price' => '780000',
            'city_id' => '3',
            'province_id' => '5',
            'country_id' => '1',

        ));

        $hotelsfacility = array();
        $hotelsfacility[0] = new Hotelsfacility();

        $hotelsfacility[0]->assign(array(
            'hotel_id' => $hotelsId,
            'facility_id' => '1',
            'value' => '2'
        ));

        $hotelsfacility[1] = new Hotelsfacility();
        $hotelsfacility[1]->assign(array(
            'hotel_id' => $hotelsId,
            'facility_id' => '2',
            'value' => '4'
        ));


        $hotel->hotelsfacility = $hotelsfacility;

        if(!$hotel->save()) {
            $this->flash->error($hotel->getMessages());
        }
        else {
            $this->flash->success('Success');
        }
    }

}

