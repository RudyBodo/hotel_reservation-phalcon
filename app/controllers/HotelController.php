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

        $this->view->detail = $hotel;
        $this->view->facility = $facility;
    }

    public function addAction()
    {
        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();

        if($this->request->isPost()) {

            $hotel = new Hotels();
            
            $hotel->assign(array(
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'zipcode' => $this->request->getPost('zipcode'),
                'price' => $this->request->getPost('price'),
                'city_id' => $this->request->getPost('city'),
                'province_id' => $this->request->getPost('province'),
                'country_id' => $this->request->getPost('country')
            ));

            if (!$hotel->save()) {
                $this->flash->error($hotel->getMessages());
            } else {
                $this->flash->success('Hotel was create Sucessfully');
            }
        }

    }

}

