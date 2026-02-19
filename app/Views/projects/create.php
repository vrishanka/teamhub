<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-body">
        <h4>Create Project</h4>

        <form method="post" action="/projects/store">
            <input type="hidden" name="team_id" value="<?= $team_id ?>">

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Project Name" required>
            </div>

            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>

            <button class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

