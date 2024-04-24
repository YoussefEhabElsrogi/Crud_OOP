<?php session_start(); ?>
<?php require './inc/header.php' ?>
<?php require './inc/nav.php' ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="p-3 col text-center mt-5 text-white bg-primary">All Employees</h2>
    </div>
  </div>
</div>

<div class="container">
  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success text-center" role="alert">
      <?php echo $_SESSION['success'] ?>
    </div>
    <?php unset($_SESSION['success']); endif; ?>
</div>

<?php $db = new Database(); ?>

<?php if (!empty($db->read('employees'))): ?>
  <div class="container">
    <div class="col-sm-12">
      <table class="table table-dark">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($db->read('employees') as $row): ?>

            <tr>
              <td><?= $row['name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= strtoupper($row['department']); ?></td>
              <td>
                <a href="edit-employee.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
              </td>
              <td>
                <a href="delete-employee.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>

            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    <?php else: ?>

      <div class="container">
        <div class="col-sm-12">
          <h3 class="alert alert-danger mt-5 text-center">Not Found Data</h3>
        </div>
      </div>

    <?php endif; ?>
  </div>
</div>

<?php require './inc/footer.php' ?>