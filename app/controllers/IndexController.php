<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->hotel = Hotels::find();
    }

    public function detailAction($hotelsId)
    {
        $this->view->hotels = Hotels::findFirst($hotelsId)
    }

}

