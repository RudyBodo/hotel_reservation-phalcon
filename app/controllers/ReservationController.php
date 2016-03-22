<?php

class ReservationController extends ControllerBase
{

    public function initialize()
    {
        if (!$this->session->has('auth-user')) {

            $this->flash->error('You dont have permission');
            $this->response->redirect('/hotel');
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
}

