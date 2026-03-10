<?php

class Horloge extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('HorlogeModel');
    }

    public function index($display='none', $message='')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view()-method uit de BaseController-class wordt de view 
         * aangeroepen
         */
        $this->view('horloge/index', $data);
    }



    public function delete($Id)
    {
        $this->horlogeModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/horloge/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['diameter']) ||
                empty($_POST['releasedatum'])) {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->horlogeModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/horloge/index');
            }
        }

        $this->view('horloge/create', $data);
    }

}