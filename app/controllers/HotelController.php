<?php

class HotelController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->hotel = Hotels::find();

    }

    public function detailAction($hotelsId)
    {
        $hotel = Hotels::findFirst($hotelsId);
        $facility = Hotelsfacility::findFirstByHotelid($hotelsId);
        $city = $hotel->city;
        $province = $hotel->province;
        $country = $hotel->country;

        $this->view->detail = $hotel;
        $this->view->facility = $facility;
    }

    public function addAction()
    {
        $hotel = new Hotels;

    }

}

