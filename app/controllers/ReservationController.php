<?php

class ReservationController extends ControllerBase
{

    public function initialize()
    {
        if (!$this->session->has('auth-user')) {

            $this->view->error = "You dont have permission";
            $this->response->redirect('session/login');
        }
    }

    public function indexAction()
    {

        $id = $this->request->getQuery("id", "int");

        if ($id) {
            $data = Reservation::findFirst($id);
            $this->view->id = $id;
            return;

        } else {
            $user_id = $this->session->get('auth-user')['id'];
            $data = Reservation::findByUser_id($user_id);
        }

        if(!$data) {
            $this->view->msg = "Record not found";
            return;
        }
        $this->view->data = $data;
    }

    public function detailAction($id)
    {
        $reservation = Reservation::findFirst($id);
        if(!$reservation) {
            $this->view->msg = "Reservation record not found";
            return;
        }
        $transaction = Transaction::findFirstByReservation_id($id);
        $this->view->price = $transaction;
        $this->view->data = $reservation;
    }

    public function addAction($id)
    {
        $hotel = Hotels::findFirstById($id);
        if(!$hotel) {

            $this->view->error = 'Hotel not found';
            return;
        }

        $form = new ReservationForm;

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

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
                    'night' => $this->request->getPost('night')
                ));

                //initialization price room
                $hotel_room = HotelRoom::findFirstByRoom($reservation->room);
                $price_room = $hotel_room->price;
                $adult = $reservation->adult;
                $night = $reservation->night;
                $total_price = ($price_room * $adult) + ($price_room * $night);

                //generate transaction
                $transaction = new Transaction();
                $transaction->reservation_id = $reservation->id;
                $transaction->total_price = $total_price;

                //save both table related
                $reservation->Transaction = $transaction;

                //validate save if error
                if (!$reservation->save()) {
                    $this->view->error($reservation->getMessages());
                } else {
                    $this->view->msg = "Reservation Create Was Successfully";
                }
            }
        }
        $this->view->room = HotelRoom::findByHotel_id($id);
        $this->view->form = $form;
    }

}
