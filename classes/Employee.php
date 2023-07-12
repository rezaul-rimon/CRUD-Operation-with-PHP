<?php

$dbcon = new mysqli("localhost", "root", "", "ajax_crud");

//echo "Hi I am from AJAX";

$action = $_GET['action'];
$action();


function Add_Employee() {
    global $dbcon;
    //echo "I am from Add emp";

    $empName = $_GET['name'];
    $empEmail = $_GET['email'];
    $empPhone = $_GET['phone'];
    $empStatus = $_GET['status'];

    $sql = "INSERT INTO `employee`(`name`, `email`, `phone`, `status`) VALUES ('$empName','$empEmail','$empPhone','$empStatus')";

    $res = $dbcon->query($sql);

    if($res){ ?>
        <div class="alert alert-success" role="alert" id="msg">Data Insert Done</div>
    <?php }
}


// Show Employee
function Show_Employee(){
    global $dbcon;
    $sql = "SELECT * FROM `employee`";
    $res = $dbcon->query($sql);

    $sl=1;
    
    foreach($res as $item){ ?>

        <tr>
            <td><?php echo $sl++ ?></td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['phone'] ?></td>
            <td>
                <?php if($item['status']){ ?>
                    <button id="userAct" class="btn btn-sm btn-success" value="<?php echo $item['sl'] ?>"><i class="fa-solid fa-user-check"></i></button>
                    
                    <?php
                } 
                else{ ?>
                    <button id="userInAct" class="btn btn-sm btn-danger" value="<?php echo $item['sl'] ?>"><i class="fa-solid fa-user-xmark"></i></button>

                <?php }
                ?>

            </td>
            <td>
                <button id="edit" class="btn btn-sm btn-warning" value="<?php echo $item['sl'] ?>" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen-to-square"></i></button>

                <button id="delete" class="btn btn-sm btn-danger" value="<?php echo $item['sl'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></button>
            </td>
      </tr>
      <?php
    }
}

//User Active to Inactive
function Act_to_Inact(){
    global $dbcon;
    $id = $_GET['sl'];
    // echo $id;
    $sql = "UPDATE `employee` SET `status`= '0' WHERE sl = '$id'";
    $res = $dbcon->query($sql);

    if($res){
        echo "Inactivated";
    }

}

//User Inactive to Active
function Inact_to_Act(){
    global $dbcon;
    $id = $_GET['sl'];
    // echo $id;
    $sql = "UPDATE `employee` SET `status`= '1' WHERE sl = '$id'";
    $res = $dbcon->query($sql);

    if($res){
        echo "Activated";
    }

}

//Delete an User
function Delete_User(){
    global $dbcon;
    $id = $_GET['sl'];
    $sql = "DELETE FROM `employee` WHERE sl='$id'";
    $res = $dbcon->query($sql);

    if($res){
        echo "Item deleted";
    }
}

//Edit an User
function Edit_User(){
    global $dbcon;
    $id = $_GET['sl'];
    $sql = "SELECT * FROM `employee` WHERE sl = '$id'";

    $res = $dbcon->query($sql);

    if($res){
        // echo "Asi re vai asi";
        $row = $res->fetch_assoc();
        echo json_encode($row);
    }
}

//Update Employee
function Updata_User(){
    global $dbcon;
    $id = $_GET['sl'];
    $name = $_GET['empName'];
    $email = $_GET['empEmail'];
    $phone = $_GET['empPhone'];

    $sql = "UPDATE `employee` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE sl='$id'";
    $res = $dbcon->query($sql);

    if($res){
        echo "Updated";
    }
}








?>