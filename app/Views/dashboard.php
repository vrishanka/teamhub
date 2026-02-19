<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Your Teams</h2>
    <a href="/teams/create" class="btn btn-primary">+ Create Team</a>
</div>

<div class="row">
<?php foreach($teams as $team): ?>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5><?= $team->name ?></h5>
                <a href="/teams/<?= $team->id ?>" class="btn btn-sm btn-dark mt-2">Open</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?= $this->endSection() ?>

