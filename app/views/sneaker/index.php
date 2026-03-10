<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 d-flex justify-content-start">
            <a href="<?= URLROOT; ?>/sneaker/create" class="btn btn-warning text-dark">
                Nieuwe sneaker toevoegen
            </a>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Materiaal</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['result'] as $sneaker) : ?>
                        <tr>
                            <td><?php echo $sneaker->Merk; ?></td>
                            <td><?php echo $sneaker->Model; ?></td>
                            <td><?php echo $sneaker->Type; ?></td>
                            <td><?php echo $sneaker->Materiaal; ?></td>
                            <td><?php echo $sneaker->Gewicht; ?></td>
                            <td><?php echo $sneaker->Releasedatum; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/sneaker/delete/<?= $sneaker->Id; ?>"
                                   onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
