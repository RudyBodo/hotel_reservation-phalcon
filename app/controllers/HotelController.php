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

        $facility = Hotelsfacility::find(array(
            "hotelid = '$hotelsId'"
        ));

        $this->view->detail = $hotel;
        $this->view->facility = $facility;
    }


    public function addfacilityAction($hotelsId)
    {
        $hotel = Hotels::findFirst($hotelsId);

        if($this->request->isPost()) {

            $facility = new Hotelsfacility();

            $facility->assign(array(
                'hotelid' => $hotelsId,
                'name' => $this->request->getPost('name'),
                'value' => $this->request->getPost('value')
            ));

            if($facility->save() == false){
                $this->flash->error($facility->getMessages());
            }
            else {
                $this->flash->success('facility create was successfully');
            }
        }
        $this->view->hotel = $hotel;

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

            if (!$hotel->save()) {
                $this->flash->error($hotel->getMessages());

            } else {
                $this->flash->success('Hotel was create Sucessfully');

                $this->dispatcher->forward(
                    array(
                        "action" => "index"
                    )
                );
            }
        }

        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();
        $this->view->facility = Hotelsfacility::find();

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
                $this->flash->success('update hotel was successfully');
            }
        }

        $this->view->city = City::find();
        $this->view->provinces = Province::find();
        $this->view->country = Country::find();
        $this->view->facility = Hotelsfacility::find();

    }


    public function deleteAction($hotelsId)
    {
        $hotel = Hotels::findFirstById($hotelsId);
        if($hotel->delete() == false){
            $this->flash->error($hotel->getMessages());
        }
        else{
            $this->flash->success('The Hotel Deleted Successfully');

            $this->dispatcher->forward(
                array(
                    "action" => "index"
                )
            );
        }
    }

}

