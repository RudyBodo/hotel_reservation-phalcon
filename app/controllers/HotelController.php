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
        $hotel = Hotels::findFirst($hotelsId);

        $this->view->detail = $hotel;
        $this->view->facility = Hotelsfacility::findFirst($hotelsId);

    }


    public function addAction()
    {

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

