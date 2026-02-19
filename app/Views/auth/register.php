<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Register</h3>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/store" method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="/login">Login</a>
        </p>
    </div>
</div>

<?= $this->endSection() ?>

