<?php

class Sneaker extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('SneakerModel');
    }

    public function index($display='none', $message='')
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
    $this->sneakerModel->delete($Id);

    header('Refresh:3 ; url=' . URLROOT . '/sneaker/index');

    $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe sneaker toevoegen',
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

            if (empty(trim($_POST['gewicht'] ?? ''))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (strlen($_POST['gewicht']) > 25) {
                $errors['gewicht'] = 'Gewicht mag maximaal 25 tekens bevatten';
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

                $this->sneakerModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/sneaker/index');
            }
        }

        $this->view('sneaker/create', $data);
    }

    public function update($Id)
    {
        $sneaker = $this->sneakerModel->getSneakerById($Id);

        if (empty($sneaker)) {
            header('Location: ' . URLROOT . '/sneaker/index');
            exit();
        }

        $data = [
            'title' => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
            'color' => 'success',
            'errors' => [],
            'sneaker' => $sneaker
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

            if (empty(trim($_POST['gewicht'] ?? ''))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (strlen($_POST['gewicht']) > 25) {
                $errors['gewicht'] = 'Gewicht mag maximaal 25 tekens bevatten';
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
                    'gewicht' => $_POST['gewicht'],
                    'releasedatum' => $_POST['releasedatum']
                ];

                $this->sneakerModel->update($updateData);

                header('Refresh: 3; URL=' . URLROOT . '/sneaker/index');

                $data['display'] = 'flex';
                $data['color'] = 'success';
                $data['message'] = 'De gegevens zijn gewijzigd';
                $data['sneaker'] = (object) [
                    'Id' => $Id,
                    'Merk' => $updateData['merk'],
                    'Model' => $updateData['model'],
                    'Type' => $updateData['type'],
                    'Materiaal' => $updateData['materiaal'],
                    'Gewicht' => $updateData['gewicht'],
                    'Releasedatum' => $updateData['releasedatum']
                ];
            }
        }

        $this->view('sneaker/update', $data);
    }

}