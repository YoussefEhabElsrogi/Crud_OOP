<?php session_start(); ?>
<?php require './inc/header.php' ?>
<?php require './inc/nav.php' ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="p-3 col text-center mt-5 text-white bg-primary">Edit Employees</h2>
    </div>
  </div>
</div>

<?php if (isset($_GET['id']) && is_numeric($_GET['id'])): ?>

  <?php if ($row = $db->find('employees', $_GET['id'])): ?>

    <div class="container" style="margin-bottom: 100px;">
      <div class="row">
        <div class="col-sm-12">
          <form method="POST" action="./handelers/handelUpdate.php">

            <?php if (isset($_SESSION['errors'])): ?>
              <?php foreach ($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center" role="alert">
                  <?php echo $error; ?>
                </div>
              <?php endforeach; ?>
              <?php unset($_SESSION['errors']); endif; ?>
            <div class="form-group mt-3">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
            </div>
            <div class="form-group mt-3">
              <label for="name">Name</label>
              <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="name"
                placeholder="Enter Name">
            </div>
            <div class="form-group mt-3">
              <label for="department">Department</label>
              <input type="text" name="department" value="<?= $row['department'] ?> " class="form-control" id="department"
                placeholder="Enter department">
            </div>
            <div class="form-group mt-3">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php endif; ?>

<?php endif; ?>

<?php require './inc/footer.php' ?>