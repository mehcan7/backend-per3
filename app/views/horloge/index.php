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
            <a href="<?= URLROOT; ?>/horloge/create" class="btn btn-warning text-dark">
                Nieuwe horloge toevoegen
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
                        <th>Diameter</th>
                        <th>Releasedatum</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['result'] as $horloge) : ?>
                        <tr>
                            <td><?php echo $horloge->Merk; ?></td>
                            <td><?php echo $horloge->Model; ?></td>
                            <td><?php echo $horloge->Type; ?></td>
                            <td><?php echo $horloge->Materiaal; ?></td>
                            <td><?php echo $horloge->Diameter; ?></td>
                            <td><?php echo $horloge->Releasedatum; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/horloge/update/<?= $horloge->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/horloge/delete/<?= $horloge->Id; ?>"
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
