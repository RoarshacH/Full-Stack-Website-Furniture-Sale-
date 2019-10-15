  function validate(){
    var flag = false;
    if (document.getElementById("name").value=="") {
      swal("Empty Field!", "You Need to enter the Name!", "warning");
    }
    else if (document.getElementById("subject").value=="") {
      swal("Empty Field!", "You Need to enter the subject!", "warning");
    }
    else if (document.getElementById("email").value=="") {
      swal("Empty Field!", "You Need to enter your email!", "warning");
    }
    else if (document.getElementById("message").value=="") {
      swal("Empty Field!", "You Need to enter the messege!", "warning");
    }
    else
    {
      flag = true;
    }
    return flag;
  }
  // End OF ther ContactUS Validation

  function validate_cat(){
    var flag = false;
    if (document.getElementById("cat").value=="0") {
      swal("Empty Field!", "You Need to Select the Category!", "warning");
    }
    else if (document.getElementById("sub_catergory").value=="") {
      swal("Empty Field!", "You Need to enter the New Sub category!", "warning");
    }
    else
    {
      flag = true;
    }
    return flag;
  }

// <!-- END OF validation category -->
function validate_user(){
  var flag = false;
  if(document.getElementById("f_name").value==""){
    swal("Empty Field!", "Please insert the First Name its required!", "warning");
  }
  else if (document.getElementById("l_name").value=="") {
    swal("Empty Field!", "Please insert the Last Name its required!", "warning");
  }
  else if (document.getElementById("line1").value=="") {
    swal("Empty Field!", "Please insert the Address its required!", "warning");
  }
  else if (document.getElementById("city").value=="") {
    swal("Empty Field!", "Please insert the City its required!", "warning");
  }
  else if (document.getElementById("phoneno").value=="") {
    swal("Empty Field!", "Please insert the PhoneNumber its required!", "warning");
  }
  else if (document.getElementById("cat").value=="0") {
    swal("Empty Field!", "You Need to Select the User Type!", "warning");
  }
  else if (document.getElementById("usernm").value=="") {
    swal("Empty Field!", "Please Give a Username!", "warning");
  }
  else if (document.getElementById("password").value=="") {
    swal("Empty Field!", "Please fill Password field!", "warning");
  }
  else
  {
    flag = true;
  }
  return flag;
}

// End of the User validation
function validate_search(){
  var flag = false;
  if (document.getElementById("name_product").value=="") {
    swal("Empty Search Field!", "You Need to enter the Name Of the Product!", "warning");
  }
  else if (document.getElementById("cat_name").value=="100"){
    swal("Empty Search Category!", "You Need to Select the Category!", "warning");
  }
  // else if (document.getElementById("cat_name").value=="10"){
  //   swal("qw", "You Need to Give a Value!", "warning");
  // }
  else
  {
    flag = true;
  }
  return flag;
}
// End of search Validation

  function validate_product(){
    var flag = false;
    if(document.getElementById("name").value==""){
      swal("Empty Name!", "You Need Enter Product Name!", "warning");
    }
    else if (document.getElementById("price").value=="") {
      swal("Empty Price!", "You Need to give a Price!", "warning");
    }
    else if (document.getElementById("length").value=="") {
      swal("Empty Field!", "You Need to Give length of the Product!", "warning");
    }
    else if (document.getElementById("width").value=="") {
      swal("Empty Field!", "You Need to Give Width of the Product!", "warning");
    }
    else if (document.getElementById("height").value=="") {
      swal("Empty Field!", "You Need to Give Height of the Product!", "warning");
    }
    else if (document.getElementById("desc").value=="") {
      swal("Empty Field!", "You Need to Give a Descryption of the Product!", "warning");
    }
    else if (document.getElementById("cat_pro").value=="0") {
      swal("Empty Category!", "You Need to Select the Category!", "warning");
    }
    // else if (document.getElementById("pic_file").value =="" {
    //   swal("Empty Picture!", "You Need to Select a Pictire!", "warning");
    // }
    else
    {
      flag = true;
    }
    return flag;
  }

//end of product validation
