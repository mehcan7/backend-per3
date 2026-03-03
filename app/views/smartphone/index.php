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
                        <th>Prijs</th>
                        <th>Geheugen</th>
                        <th>Besturingssysteem</th>
                        <th>Schermgrootte</th>
                        <th>Releasedatum</th>
                        <th>MegaPixels</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $smartphone) : ?>
                        <tr>
                            <td><?php echo $smartphone->Merk; ?></td>
                            <td><?php echo $smartphone->Model; ?></td>
                            <td><?php echo $smartphone->Prijs; ?></td>
                            <td><?php echo $smartphone->Geheugen; ?></td>
                            <td><?php echo $smartphone->Besturingssysteem; ?></td>
                            <td><?php echo $smartphone->Schermgrootte; ?></td>
                            <td><?php echo $smartphone->Releasedatum; ?></td>
                            <td><?php echo $smartphone->MegaPixels; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/SmartphoneController/delete/<?= $smartphone->Id; ?>" 
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

