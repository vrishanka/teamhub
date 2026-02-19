<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4"><?= $project->name ?></h3>

<!-- Add Task -->
<div class="card mb-4">
    <div class="card-body">
<form method="post" action="/tasks/store">
    <input type="hidden" name="project_id" value="<?= $project->id ?>">

    <div class="row g-2">

        <div class="col-md-3">
            <input type="text" name="title" class="form-control"
                   placeholder="Task title" required>
        </div>

        <div class="col-md-3">
            <input type="text" name="description" class="form-control"
                   placeholder="Description">
        </div>

        <div class="col-md-2">
            <select name="assigned_to" class="form-select">
                <option value="">Assign User</option>
                <?php foreach($members as $member): ?>
                    <option value="<?= $member->id ?>">
                        <?= $member->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-2">
            <input type="date" name="due_date" class="form-control">
        </div>

        <div class="col-md-2">
            <button class="btn btn-success w-100">Add</button>
        </div>

    </div>
</form>

    </div>
</div>

<div class="row">

<?php
$columns = [
    'todo' => 'To Do',
    'in_progress' => 'In Progress',
    'done' => 'Done'
];
?>

<?php foreach($columns as $key => $label): ?>
    <div class="col-md-4">
        <div class="kanban-column shadow-sm">
            <h5><?= $label ?></h5>
            <hr>

            <?php foreach($tasks as $task): ?>
                <?php if($task->status == $key): ?>
                   
<div class="task-card shadow-sm p-3 mb-3 bg-white rounded">

    <strong><?= esc($task->title) ?></strong>
    <p class="mb-2"><?= esc($task->description) ?></p>

    <?php
    $assignedName = null;
    foreach ($members as $m) {
        if ($m->id == $task->assigned_to) {
            $assignedName = $m->name;
            break;
        }
    }
    ?>

    <?php if ($assignedName): ?>
        <div>
            <small class="text-primary">
                👤 <?= esc($assignedName) ?>
            </small>
        </div>
    <?php endif; ?>

    <?php if ($task->due_date): ?>
        <div>
            <small class="text-danger">
                📅 Due: <?= date('d M Y', strtotime($task->due_date)) ?>
            </small>
        </div>
    <?php endif; ?>

    <!-- Status Buttons -->
    <div class="mt-2">
        <?php if($key != 'todo'): ?>
            <a href="/tasks/update-status/<?= $task->id ?>/todo"
               class="btn btn-sm btn-secondary">To Do</a>
        <?php endif; ?>

        <?php if($key != 'in_progress'): ?>
            <a href="/tasks/update-status/<?= $task->id ?>/in_progress"
               class="btn btn-sm btn-warning">In Progress</a>
        <?php endif; ?>

        <?php if($key != 'done'): ?>
            <a href="/tasks/update-status/<?= $task->id ?>/done"
               class="btn btn-sm btn-success">Done</a>
        <?php endif; ?>
    </div>

    <!-- Edit & Delete Buttons INSIDE Card -->
    <div class="mt-3 d-flex justify-content-between">
        <button class="btn btn-sm btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#editTaskModal<?= $task->id ?>">
            Edit
        </button>

        <a href="/tasks/delete/<?= $task->id ?>"
           class="btn btn-sm btn-outline-danger"
           onclick="return confirm('Delete this task?')">
            Delete
        </a>
    </div>

</div>

<!-- Edit Task Modal -->
<div class="modal fade" id="editTaskModal<?= $task->id ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" action="/tasks/update">

        <div class="modal-header">
          <h5 class="modal-title">Edit Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <input type="hidden" name="task_id" value="<?= $task->id ?>">
            <input type="hidden" name="project_id" value="<?= $project->id ?>">

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title"
                       value="<?= esc($task->title) ?>"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description"
                          class="form-control"><?= esc($task->description) ?></textarea>
            </div>

            <div class="mb-3">
                <label>Assign User</label>
                <select name="assigned_to" class="form-select">
                    <option value="">None</option>
                    <?php foreach($members as $member): ?>
                        <option value="<?= $member->id ?>"
                            <?= $task->assigned_to == $member->id ? 'selected' : '' ?>>
                            <?= esc($member->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Due Date</label>
                <input type="date"
                       name="due_date"
                       value="<?= $task->due_date ?>"
                       class="form-control">
            </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>


         

                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
<?php endforeach; ?>

</div>

<?= $this->endSection() ?>

