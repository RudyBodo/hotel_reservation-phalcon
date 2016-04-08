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
            $this->view->error = 'Hotel not exist';
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
            $this->view->error = 'You dont have permisson';
            return $this->response->redirect('hotel');

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

                $facility = $this->request->getPost('facility_id');
                $amount = $this->request->getPost('amount');

                $facilities = array_map(function($f, $a) use ($hotel){

                    $hotelFacility = new Hotelsfacility();
                    $hotelFacility->hotel_id = $hotel->id;
                    $hotelFacility->facility_id = $f;
                    $hotelFacility->amount = $a;
                    $hotelFacility->save();

                    return $hotelFacility;

                }, $facility, $amount);

                $rooms = $this->request->getPost('room');
                $price = $this->request->getPost('price');

                $hotelroom = array_map(function($r, $p) use ($hotel) {

                    $room_hotel = new HotelRoom();
                    $room_hotel->hotel_id = $hotel->id;
                    $room_hotel->room = $r;
                    $room_hotel->price = $p;
                    $room_hotel->save();

                    return $room_hotel;

                }, $rooms, $price);


                //file_put_contents("/tmp/d.txt", print_r($this->request->getPost(), true), FILE_APPEND);

                $hotel->Hotelsfacility = $facilities;
                $hotel->HotelRoom = $hotelroom;

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

        $check_session = $this->session->has('auth-admin');

        if(!$check_session) {
            $this->view->error = 'You dont have permission';
            return $this->response->redirect('hotel');
        }

        $hotel = Hotels::findFirstById($Id);
        if(!$hotel) {
            $this->view->error = 'Id Required';
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

                $facility = $this->request->getPost('facility_id');
                $amount = $this->request->getPost('amount');

                $facilities = array_map(function($f, $a) use ($hotel){

                    $hotelFacility = new Hotelsfacility();
                    $hotelFacility->hotel_id = $hotel->id;
                    $hotelFacility->facility_id = $f;
                    $hotelFacility->amount = $a;
                    $hotelFacility->save();

                    return $hotelFacility;

                }, $facility, $amount);

                $rooms = $this->request->getPost('room');
                $price = $this->request->getPost('price');

                $hotelroom = array_map(function($r, $p) use ($hotel) {

                    $room_hotel = new HotelRoom();
                    $room_hotel->hotel_id = $hotel->id;
                    $room_hotel->room = $r;
                    $room_hotel->price = $p;
                    $room_hotel->save();

                    return $room_hotel;

                }, $rooms, $price);


                //file_put_contents("/tmp/d.txt", print_r($this->request->getPost(), true), FILE_APPEND);

                $hotel->Hotelsfacility = $facilities;
                $hotel->HotelRoom = $hotelroom;

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
