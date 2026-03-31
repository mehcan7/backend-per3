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
            'message' => '',
            'color' => 'success',
            'errors' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty(trim($_POST['merk'] ?? ''))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['model'] ?? ''))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['materiaal'] ?? ''))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 25) {
                $errors['materiaal'] = 'Materiaal mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['diameter'] ?? ''))) {
                $errors['diameter'] = 'Voer een diameter in';
            } elseif (strlen($_POST['diameter']) > 10) {
                $errors['diameter'] = 'Diameter mag maximaal 10 tekens bevatten';
            }

            if (empty($_POST['releasedatum'] ?? '')) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } else {
                $releaseDate = DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']);
                if (!$releaseDate || $releaseDate->format('Y-m-d') !== $_POST['releasedatum']) {
                    $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
                }
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['color'] = 'danger';
                $data['message'] = 'Controleer de invoer';
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['color'] = 'success';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->horlogeModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/horloge/index');
            }
        }

        $this->view('horloge/create', $data);
    }

    public function update($Id)
    {
        $horloge = $this->horlogeModel->getHorlogeById($Id);

        if (empty($horloge)) {
            header('Location: ' . URLROOT . '/horloge/index');
            exit();
        }

        $data = [
            'title' => 'Wijzig horloge',
            'display' => 'none',
            'message' => '',
            'color' => 'success',
            'errors' => [],
            'horloge' => $horloge
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty(trim($_POST['merk'] ?? ''))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['model'] ?? ''))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['materiaal'] ?? ''))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 25) {
                $errors['materiaal'] = 'Materiaal mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['diameter'] ?? ''))) {
                $errors['diameter'] = 'Voer een diameter in';
            } elseif (strlen($_POST['diameter']) > 10) {
                $errors['diameter'] = 'Diameter mag maximaal 10 tekens bevatten';
            }

            if (empty($_POST['releasedatum'] ?? '')) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } else {
                $releaseDate = DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']);
                if (!$releaseDate || $releaseDate->format('Y-m-d') !== $_POST['releasedatum']) {
                    $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
                }
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['color'] = 'danger';
                $data['message'] = 'Controleer de invoer';
                $data['errors'] = $errors;
            } else {
                $updateData = [
                    'id' => $Id,
                    'merk' => $_POST['merk'],
                    'model' => $_POST['model'],
                    'type' => $_POST['type'],
                    'materiaal' => $_POST['materiaal'],
                    'diameter' => $_POST['diameter'],
                    'releasedatum' => $_POST['releasedatum']
                ];

                $this->horlogeModel->update($updateData);

                header('Refresh: 3; URL=' . URLROOT . '/horloge/index');

                $data['display'] = 'flex';
                $data['color'] = 'success';
                $data['message'] = 'De gegevens zijn gewijzigd';
                $data['horloge'] = (object) [
                    'Id' => $Id,
                    'Merk' => $updateData['merk'],
                    'Model' => $updateData['model'],
                    'Type' => $updateData['type'],
                    'Materiaal' => $updateData['materiaal'],
                    'Diameter' => $updateData['diameter'],
                    'Releasedatum' => $updateData['releasedatum']
                ];
            }
        }

        $this->view('horloge/update', $data);
    }

}