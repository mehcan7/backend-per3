<?php

class Sneaker extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('SneakerModel');
    }

    public function index($display='none', $message='fuck you nigga')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view()-method uit de BaseController-class wordt de view 
         * aangeroepen
         */
        $this->view('sneaker/index', $data);
    }



public function delete($Id)
{
    $result = $this->sneakerModel->delete($Id);

    header('Refresh:3 ; url=' . URLROOT . '/sneakerController/index');

    $this->index('flex', 'Record is verwijderd');
    }

}