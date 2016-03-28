<?php

class HotelController extends ControllerBase
{

    public function flashAction()
    {

    }


    public function indexAction()
    {
        $this->view->hotel = Hotels::find();

    }


    public function detailAction($hotelsId)
    {
        //check existing hotel
        $hotel = Hotels::findFirst($hotelsId);
        if(!$hotel) {

            $this->flash->error('Hotel not exist');
        }
        else {
            $this->view->detail = $hotel;
            $this->view->room = HotelRoom::findByHotel_id($hotelsId);
            $this->view->facility = Hotelsfacility::findByHotel_id($hotelsId);
        }

    }


    public function addAction()
    {
        $check_session = $this->session->has('auth-admin');

        if(!$check_session) {
            $this->flash->error('You dont have permission');
            return $this->response->forward('hotel');
        }

        if($this->request->isPost()) {

            $hotel = new Hotels();

            $hotel->assign(array(

                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'zipcode' => $this->request->getPost('zipcode'),
                'city_id' => $this->request->getPost('city'),
                'province_id' => $this->request->getPost('province'),
                'country_id' => $this->request->getPost('country')
            ));

            $hotelfacility = new Hotelsfacility();

            $hotelfacility->assign(array(

                'hotel_id' => $hotelsId,
                'facility_id' => $this->request->getPost('facility'),
                'value' => $this->request->getPost('value')
            ));

            $hotel->hotelsfacility = $hotelfacility;

            if (!$hotel->save()) {
                $this->flash->error($hotel->getMessages());

            } else {
                $this->flashSession->success('Hotel was create Sucessfully');

                return $this->response->redirect("/hotel/flash");
            }
        }

        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();
        $this->view->facility = Facility::find();
    }


    public function editAction($hotelsId)
    {

        if(!$this->session->has('auth-admin')) {

            $this->flash->error('You dont have permission');
            return $this->forward('/hotel');
        }

        $hotel = Hotels::findFirstById($hotelsId);
        if($this->request->isPost()){
            $hotel->assign(array(
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'zipcode' => $this->request->getPost('zipcode'),
                'price' => $this->request->getPost('price'),
                'city_id' => $this->request->getPost('city'),
                'province_id' => $this->request->getPost('province'),
                'country_id' => $this->request->getPost('country')
            ));

            $hotelfacility = new Hotelsfacility();

            $hotelfacility->assign(array(

                'hotel_id' => $hotelsId,
                'facility_id' => $this->request->getPost('facility'),
                'value' => $this->request->getPost('value')
            ));

            $hotel->hotelsfacility = $hotelfacility;

            if(!$hotel->save()){

                $this->flash->error($hotel->getMessages());
            }
            else{

                $this->flashSession->success('update hotel was successfully');

                return $this->response->redirect("/hotel/flash");
            }
        }

        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();

    }


    public function deleteAction($hotelsId)
    {

        if(!$this->session->has('auth-admin')) {

            $this->flash->error('You dont have permission');
            return $this->forward('/hotel');
        }

        $hotel = Hotels::findFirstById($hotelsId);
        if(!$hotel->delete()){
            $this->flash->error($hotel->getMessages());
        }
        else{
            $this->flashSession->success('The Hotel Deleted Successfully');

            return $this->response->redirect("hotel/flash");
        }
    }


}

