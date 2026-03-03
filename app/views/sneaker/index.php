<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
        <?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>

<!-- Terugkoppeling naar de gebruiker -->
<div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
    <div class="col-10 text-begin text-primary">
        <div class="alert alert-success" role="alert">
            <?= $data['message']; ?>
        </div>
    </div>
</div>










            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Materiaal</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $sneaker) : ?>
                        <tr>
                            <td><?php echo $sneaker->Merk; ?></td>
                            <td><?php echo $sneaker->Model; ?></td>
                            <td><?php echo $sneaker->Type; ?></td>
                            <td><?php echo $sneaker->Materiaal; ?></td>
                            <td><?php echo $sneaker->Gewicht; ?></td>
                            <td><?php echo $sneaker->Releasedatum; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/SneakerController/delete/<?= $sneaker->Id; ?>"
                                    onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?php echo URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
    </div>
</div>

