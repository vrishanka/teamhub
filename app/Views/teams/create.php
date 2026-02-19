<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h4>Create Team</h4>

                <form method="post" action="/teams/store">
                    <div class="mb-3">
                        <label class="form-label">Team Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Create Team
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

