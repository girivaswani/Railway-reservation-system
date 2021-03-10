var name;
function UserLogin() {
    name = $("#UserEmail").val();
    var pass =$("#UserPassword").val(); 
    if (name=="") {
        $("#UserEmail").css("border-color","red");
        alert("Please Enter Username");
    }
    else if (pass=="") {
        $("#UserPassword").css("border-color","red");
        alert("Please Enter Password");
    }
    if (!name=="") {
        $("#UserEmail").css("border-color","red");
    }
    if (!pass=="") {
        $("#UserPassword").css("border-color","red");
    }

}

function signup() {
    var fname = $("#fname").val();
    var lname =$("#lname").val(); 
    var pno =$("#pno").val();
    var select =$("#select").val();
    var dob =$("#dob").val();
    var age =$("#age").val();
    var email =$("#email").val();
    var aadhar =$("#aadhar").val();
    var username =$("#username").val();
    var pass =$("#pass").val();
    var cpass =$("#cpass").val();
    // alert(select)
    // if (fname=="") {
    //     $("#fname").css("border-color","red");
    //     alert("Please Enter first name");
    // }
    // else if (lname=="") {
    //     $("#lname").css("border-color","red");
    //     alert("Please Enter last name");
    // } 
    // else if (pno=="") {
    // $("#pno").css("border-color","red");
    // alert("Please Enter Phone number");
    // }
    // if (select=="Select") {
    //     $("#select").css("border-color","red");
    //     alert("Please Select Gender");
    // }
    if(pno.length!=10){
        alert("Mobile number should be of 10 digits");
    }
    if(aadhar.length!=12){
        alert("Aadhar number should be of 12 digits");
    }
    // else if (dob=="") {
    //     $("#dob").css("border-color","red");
    //     alert("Please Enter Date of birth");
    // }
    //     else if (age=="") {
    //     $("#age").css("border-color","red");
    //     alert("Please Enter age");
    // }
    //    else if (email=="") {
    //     $("#email").css("border-color","red");
    //     alert("Please Enter email");
    // }
    //     else if (aadhar=="") {
    //     $("#aadhar").css("border-color","red");
    //     alert("Please Enter Aadhar number");
    // }
    //     else if (username=="") {
    //     $("#username").css("border-color","red");
    //     alert("Please Enter username");
    // }
    //     else if (pass=="") {
    //     $("#pass").css("border-color","red");
    //     alert("Please Enter password");
    // }
    // else if(cpass==""){
    //     $("#cpass").css("border-color","red");
    //     alert("Please Enter Confirmed password");
    // }
    // if (!fname=="") {
    //     $("#fname").css("border-color","green");
        
    // }
    // if (!lname=="") {
    //     $("#lname").css("border-color","green");
        
    // } 
    // if (!pno=="") {
    // $("#pno").css("border-color","green");
    // }
    // if (!select=="") {
    //     $("#select").css("border-color","green");
    // }
    // if (!dob=="") {
    //     $("#dob").css("border-color","green");
    // }
    // if (!age=="") {
    //     $("#age").css("border-color","green");
    // }
    // if (!email=="") {
    //     $("#email").css("border-color","green");
    // }
    // if (!aadhar=="") {
    //     $("#aadhar").css("border-color","green");

    // }
    // if (!username=="") {
    //     $("#username").css("border-color","green");
    //         }
    // if (!pass=="") {
    //     $("#pass").css("border-color","green");
    //         }
    // if(!cpass==""){
    //     $("#cpass").css("border-color","green");

    // }
}