<?php session_start(); ?>
<?php require './inc/header.php' ?>
<?php require './inc/nav.php' ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="p-3 col text-center mt-5 text-white bg-primary">Add New Employee</h2>
    </div>
  </div>
</div>

<div class="container" style="margin-bottom: 100px;">
  <div class="row">
    <div class="col-sm-12">
      <form method="POST" action="./handelers/handelEmployees.php">
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success text-center" role="alert">
            <?php echo $_SESSION['success'] ?>
          </div>
          <?php unset($_SESSION['success']); endif; ?>

        <?php if (isset($_SESSION['errors'])): ?>
          <?php foreach ($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center" role="alert">
              <?php echo $error; ?>
            </div>
          <?php endforeach; ?>
          <?php unset($_SESSION['errors']); endif; ?>
        <div class="form-group mt-3">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group mt-3">
          <label for="department">Department</label>
          <input type="text" name="department" class="form-control" id="department" placeholder="Enter department">
        </div>
        <div class="form-group mt-3">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email">
        </div>
        <div class="form-group mt-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1"
            placeholder="Enter Password">
        </div>
        <div class="form-group mt-3">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require './inc/footer.php' ?>