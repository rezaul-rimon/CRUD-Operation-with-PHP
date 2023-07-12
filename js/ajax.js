$(function($){
    //Add a new Employee
    $("#addEmp").click(function(event){

        event.preventDefault();
        event.stopPropagation(); //Prevent event propagation

        var empName = $("#empName").val();
        var empEmail = $("#empEmail").val();
        var empPhone = $("#empPhone").val();
        var empStatus = $("#empStatus").val();

        if(empName && empEmail && empPhone && empStatus){
            $.ajax({
                url: "classes/Employee.php",
                type: "GET",
                success: function(resp){
                    $("#msg").html(resp);
    
                    $("#msg").fadeOut(3000);
                    
                    $("#empName").val("");
                    $("#empEmail").val("");
                    $("#empPhone").val("");
                    $("#empStatus").val("");
    
                    Show_Employee();
                },
                data: {
                    name : empName,
                    email : empEmail,
                    phone : empPhone,
                    status : empStatus,
                    action : "ADD_Employee"
                }
            });
        }
        
        $(this).blur(); //for defocusing the button after click

    });

    //Show Employee
    Show_Employee();
    function Show_Employee(){
        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data:{
                action: "Show_Employee"
            },
            success: function(resp) {
                // alert(resp);
                $("#tbody").html(resp);
            }
        });
    }

    //Active to Inactive a User
    $(document).on("click", "#userAct", function(){
        // alert("I am Here");
        var id = $(this).val();
        // alert(id);
        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data:{
                sl: id,
                action: "Act_to_Inact"
            },
            success: function(resp) {
                //alert(resp);
                Show_Employee();
            }
        });
    });


    //Inactive to Active an User
    $(document).on("click", "#userInAct", function(){
        // alert("I am Here");
        var id = $(this).val();
        // alert(id);
        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data:{
                sl: id,
                action: "Inact_to_Act"
            },
            success: function(resp) {
                //alert(resp);
                Show_Employee();
            }
        });
    });

    //Delete an Item
    $(document).on("click", "#delete", function(){
        var id = $(this).val(); //Get id from Main Delete button
        $("#yesDelete").val(id); //pass id to Modal's Delete Button
    });

    $(document).on("click", "#yesDelete", function(){
        var id2 = $(this).val(); //Get id from Modal's Delete Button and store on id2
        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data:{
                sl: id2,
                action: "Delete_User"
            },
            success: function(resp){
                $("#deleteModal").modal("hide");
                Show_Employee();
            }
        });
    });

    //Edit Employee
    $(document).on("click", "#edit", function(){
        var id = $(this).val(); //gather th id from edit button
        $("#yesUpdate").val(id); //pass the id to yesUpdate Button

        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data:{
                sl: id,
                action: "Edit_User"
            },
            dataType: "json",
            success: function(resp){
                // alert(resp);
                $("#empNameUpd").val(resp.name);
                $("#empEmailUpd").val(resp.email);
                $("#empPhoneUpd").val(resp.phone);
            }
        });
    });

    //Update Employee
    $(document).on("click", "#yesUpdate", function(){
        var name = $("#empNameUpd").val();
        var email = $("#empEmailUpd").val();
        var phone = $("#empPhoneUpd").val();
        var id = $(this).val();

        //alert(name+" "+email+" "+phone+" "+id);

        $.ajax({
            url: "classes/Employee.php",
            type: "get",
            data: {
                sl: id,
                empName: name,
                empEmail: email,
                empPhone: phone,
                action: "Updata_User"
            },
            success: function(resp){
                //alert(resp);
                $("#editModal").modal("hide");
                Show_Employee();
            }
        });
    });

    

});