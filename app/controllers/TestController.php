<?php

class TestController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $reservation = new Reservation();
        $hotel_room = HotelRoom::findFirstById(1);

        $reservation->assign(array(

            'user_id' => $this->session->get('auth-user')['id'],
            'hotel_id' => $hotel_room->hotel_id,
            'reservation_code' => "INV-" . substr(rand(), 0, 6),
            'checkin_date' => '2016-03-21',
            'checkout_date' => '2016-03-22',
            'room_number' => 'A21',
            'room' => $hotel_room->Room->room,
            'adult' => 1,
            'amount' => 1,
            'night' => 1,
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

            $this->flash->success('Reservation Create Was Successfully');
        }

    }

}




