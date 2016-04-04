<?php

class ReservationController extends ControllerBase
{

    public function initialize()
    {
        if (!$this->session->has('auth-user')) {

            $this->flash->error('You dont have permission');
            $this->response->redirect('session/login');
        }
    }

    public function indexAction()
    {
        $id = $this->request->getQuery("id");

        if ($id) {

            $data = Reservation::findFirst($id);
            $this->view->id = $id;

        } else {

            $user_id = $this->session->get('auth-user')['id'];
            $data = Reservation::findByUser_id($user_id);
        }

        if(!$data) {

            $this->flash->error("record not found");
            return;
        }

        $this->view->data = $data;
    }

    public function addAction($Id)
    {
        //check exsiting hotel
        $hotel = Hotels::findFirst($Id);

        if(!$hotel) {
            $this->flash->error($hotel->getMessages());
            break;
        }

        $hotel_room = HotelRoom::findByHotel_id($hotel->id);


        if ($this->request->isPost()) {

            $reservation = new Reservation();

            $reservation->assign(array(

                'user_id' => $this->session->get('auth-user')['id'],
                'hotel_id' => $hotel->id,
                'reservation_code' => "INV-" . substr(rand(), 0, 6),
                'checkin_date' => $this->request->getPost('checkin'),
                'checkout_date' => $this->request->getPost('checkout'),
                'room_number' => $this->request->getPost('room_number'),
                'room' => $this->request->getPost('room'),
                'adult' => $this->request->getPost('adult'),
                'amount' => $this->request->getPost('amount'),
                'night' => $this->request->getPost('night'),
            ));

            //initialization price room
            $price_room = $hotel_room->price;

            //generate transaction
            $transaction = new Transaction();
            $transaction->assign(array(
                'reservation_id' => $reservationId,
                'total_price' => ($reservation->adult * $price_room) + ($reservation->amount * $price_room) +
                    ($reservation->night * $price_room)
            ));

            //save both table related
            $reservation->Transaction = $transaction;

            if(!$reservation->save()) {

                $this->flash->error($reservation->getMessages());
            }
            else {

                $this->view->msg ='Reservation Create Was Successfully';
            }
        }
        $this->view->room = $hotel_room;
    }

}

