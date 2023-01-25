<?= $this->extend('cms/layouts/' . $pageMeta['layout']) ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col col-md-6 offset-md-4">
            <?= $pageContent ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>