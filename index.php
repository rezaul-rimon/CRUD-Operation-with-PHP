<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD Operation | PHP</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="display-2 text-center text-danger">CRUD Operation with PHP & AJAX</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-lg-4">
        <div class="employee mt-5 p-5 border border-danger rounded">
          <div class="msg mb-3">
          </div>

          <form>
            <div id="msg">
            </div>

            <div class="form-group">
              <input type="text" id="empName" class="form-control mb-3" placeholder="Enter Employee Name" required>
            </div>

            <div class="form-group">
              <input type="email" id="empEmail" class="form-control mb-3" placeholder="Enter Employee Email" required>
            </div>

            <div class="form-group">
              <input type="text" id="empPhone" class="form-control mb-3" placeholder="Enter Employee Phone" required>
            </div>

            <div class="form-group">
              <select id="empStatus" class="form-control mb-3" required>
                <option value="">---Select Once---</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>

            <div class="form-group">
              <input type="button" id="addEmp" class="form-control btn btn-danger w-100" value="Add Employee">
              <!-- <button id="addEmp" class="form-control btn btn-danger w-100">Add Employee</button> -->
            </div>

          </form>
        </div>
      </div>
      <div class="col-sm-12 col-lg-8">
        <div class="show-data mt-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tbody">
              <!-- we will gethed this field with ajax... -->
            </tbody>


          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/ajax.js"></script>
  <script src="js/main.js"></script>
</body>

</html>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning Message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item???
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="yesDelete">Yes Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="text" id="empNameUpd" class="form-control mb-3" placeholder="Enter Employee Name">
          </div>

          <div class="form-group">
            <input type="email" id="empEmailUpd" class="form-control mb-3" placeholder="Enter Employee Email">
          </div>

          <div class="form-group">
            <input type="text" id="empPhoneUpd" class="form-control mb-3" placeholder="Enter Employee Phone">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="yesUpdate">Yes Update</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel">Warning!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="lead">Are you sure? You want to Delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
        <button id="yesDelete" type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div> -->



<!-- Edit Modal -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="text" id="empName" class="form-control mb-3" placeholder="Enter Employee Name">
          </div>

          <div class="form-group">
            <input type="email" id="empEmail" class="form-control mb-3" placeholder="Enter Employee Email">
          </div>

          <div class="form-group">
            <input type="text" id="empPhone" class="form-control mb-3" placeholder="Enter Employee Phone">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" id="yesUpdate">Update</button>
      </div>
    </div>
  </div>
</div> -->

