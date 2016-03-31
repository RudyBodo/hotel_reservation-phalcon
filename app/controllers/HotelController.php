<?php

class HotelController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->hotel = Hotels::find();

    }


    public function detailAction($hotelsId)
    {
        //check existing hotel
        $hotel = Hotels::findFirst($hotelsId);
        if(!$hotel) {

            $this->view->error('Hotel not exist');
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
        }

        $form = new HotelAddForm();

        if($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

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
                    'hotel_id' => $hotel->id,
                    'facility_id' => $this->request->getPost('facility_id'),
                    'amount' => $this->request->getPost('amount')
                ));
                file_get_contents("/tmp/d.txt", print_r($this->request->getPost(), true));

                $hotel->hotelsfacility = $hotelfacility;

                if (!$hotel->save()) {
                    $this->view->err_save = $hotel->getMessages();

                } else {
                    $this->view->msg = 'Hotel was create successfully';
                }

            }
        }

        $this->view->form = $form;
        $this->view->facility = Facility::find();
    }


    public function editAction($Id)
    {

        if(!$this->session->has('auth-admin')) {

            $this->flash->error('You dont have permission');
            return $this->forward('/hotel');
        }

        $hotel = Hotels::findFirstById($Id);

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

                'hotel_id' => $hotel->id,
                'facility_id' => $this->request->getPost('facility'),
                'amount' => $this->request->getPost('amount')
            ));

            $hotel->hotelsfacility = $hotelfacility;

            if(!$hotel->save()){

                $this->flash->error($hotel->getMessages());
            }
            else{

                $this->view->msg = 'update hotel was successfully';
                return $this->response->redirect("/hotel/flash");
            }
        }

        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();

    }


    public function deleteAction($Id)
    {

        if(!$this->session->has('auth-admin')) {

            $this->flash->error('You dont have permission');
            return $this->forward('/hotel');
        }

        $hotel = Hotels::findById($Id);
        $hotel->Hotelsfacility;

        if(!$hotel->delete()){
            $this->view->error = 'Delete hotels not successfully';
        }
        else{
            $this->view->msg = 'The Hotel Deleted Successfully';
            $this->response->redirect('hotel');

        }
    }


}

