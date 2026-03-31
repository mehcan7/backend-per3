<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/sneaker/create" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk" value="<?= $_POST['merk'] ?? ''; ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model" value="<?= $_POST['model'] ?? ''; ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>" id="type" value="<?= $_POST['type'] ?? ''; ?>">
                    <?php if (isset($data['errors']['type'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['type']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>" id="materiaal" value="<?= $_POST['materiaal'] ?? ''; ?>">
                    <?php if (isset($data['errors']['materiaal'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['materiaal']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht</label>
                    <input name="gewicht" type="text" class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>" id="gewicht" value="<?= $_POST['gewicht'] ?? ''; ?>">
                    <?php if (isset($data['errors']['gewicht'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['gewicht']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>" id="releasedatum" value="<?= $_POST['releasedatum'] ?? ''; ?>">
                    <?php if (isset($data['errors']['releasedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/sneaker/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
