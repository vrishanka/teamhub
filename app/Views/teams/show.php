<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container">

    <!-- TEAM HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Team Dashboard</h2>
    </div>


    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">Team Members</h5>

<ul class="list-group mb-3">
<?php foreach($members as $member): ?>
    <li class="list-group-item d-flex justify-content-between">
        <span><?= $member->name ?></span>
        <small class="text-muted"><?= $member->email ?></small>
    </li>
<?php endforeach; ?>
</ul>


            <!-- Invite Form -->
            <h6>Invite Member</h6>
<form onsubmit="sendInvite(event)">
    <input type="hidden" name="team_id" value="<?= $team_id ?>">

    <div class="input-group">
        <input type="email" id="inviteEmail" class="form-control" placeholder="Enter email" required>
        <button type="submit" id="inviteBtn" class="btn btn-primary">
            Invite
        </button>
    </div>
</form>

<script>
function sendInvite(event) {
    event.preventDefault(); // stop form submission

    const btn = document.getElementById("inviteBtn");

    btn.innerText = "Invitation Sent";
    btn.classList.remove("btn-primary");
    btn.classList.add("btn-success");
    btn.disabled = true;
}
</script>

        </div>
    </div>


    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Projects</h3>
        <a href="/projects/create/<?= $team_id ?>" class="btn btn-success">
            + Create Project
        </a>
    </div>

    <div class="row">
    <?php foreach($projects as $project): ?>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5><?= $project->name ?></h5>
                    <p class="text-muted"><?= $project->description ?></p>
                    <a href="/projects/<?= $project->id ?>" class="btn btn-dark btn-sm">
                        View Board
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>

