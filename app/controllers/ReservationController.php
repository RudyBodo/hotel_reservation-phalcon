<?php

class ReservationController extends ControllerBase
{

    public function initialize()
    {
        if(!$this->session->has('auth-user')) {

            $this->flash->error('You dont have permission');
            break;
        }
    }

    public function indexAction()
    {
        $user_id = $this->session->get('auth-user')['id'];

        $reservation = Reservation::findByUser_id($user_id);

        if(!$reservation) {

            $this->flash->error('You don have reservaton');
            $this->response->redirect('/hotel');
        }

        $this->view->reservation = $reservation;

    }

    public function detailAction($Id) {

        //check existing reservation
        $reservation = Reservation::findFirst($Id);

        if(!$reservation) {

            $this->flash->error('reservation not exist');
        }

        $this->view->detail = $reservation;
    }


}

