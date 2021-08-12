const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

var error1;
var error2;
var error3;
var error4;
var error5;

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

$("#signupnamefield").blur(function(){
  var letters = /^[a-zA-Z ]*$/;
  if (this.value === '') {
    error1 = 1;
    $("#signupnameerror").hide();
    $("#signupnamediv").css({"border": "solid 1px red" });
    $("#signupnamediv").after('<small id="signupnameerror" style="color:red;">Name Field Cannot Be Empty</small>');
  }else if(!(this.value.match(letters))){
     error1 = 1;
    $("#signupnameerror").hide();
    $("#signupnamediv").css({"border": "solid 1px red" });
    $("#signupnamediv").after('<small id="signupnameerror" style="color:red;">Name field cannot contain numbers</small>');
  }else{
    error1 = 0;
    $("#signupnamediv").css({"border": "" });
    $("#signupnameerror").hide();
  }
});


$("#signupusernamefield").blur(function(){
  if (this.value === '') {
    error2 = 1;
    $("#signupusernameerror").hide();
    $("#signupusernamediv").css({"border": "solid 1px red" });
    $("#signupusernamediv").after('<small id="signupusernameerror" style="color:red;">username Field Cannot Be Empty</small>');
  }else{
     error2 = 0;
    $("#signupusernamediv").css({"border": "" });
    $("#signupusernameerror").hide();
    jQuery.ajax({
      url : "usernameverify",
      method: 'get',
      data: {signupusername: jQuery('#signupusernamefield').val()},
      success: function (result) {
          if(result == 1){
              $("#signupusernameerror").hide();
              $("#signupusernamediv").css({"border": "solid 1px red" });
              $("#signupusernamediv").after('<small id="signupusernameerror" style="color:red;">username Already Exists</small>');
              error2 = 1;
          }    
       }
    });

  }
});



$("#signupemailfield").blur(function(){
  
  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


  if (this.value === '') {
     error3 = 1;
    $("#signupemailerror").hide();
    $("#signupemaildiv").css({"border": "solid 1px red" });
    $("#signupemaildiv").after('<small id="signupemailerror" style="color:red;">Email Field Cannot Be Empty</small>');
  }else if(!validateEmail(this.value)){
     error3 = 1;
    $("#signupemailerror").hide();
    $("#signupemaildiv").css({"border": "solid 1px red" });
    $("#signupemaildiv").after('<small id="signupemailerror" style="color:red;">Must be valid Email</small>');
  }
  else{
     error3 = 0;
    $("#signupemaildiv").css({"border": "" });
    $("#signupemailerror").hide();
    
    jQuery.ajax({
      url : "emailverify",
      method: 'get',
      data: {signupemail: jQuery('#signupemailfield').val()},
      success: function (result) {
          if(result == 1){
              $("#signupemailerror").hide();
              $("#signupemaildiv").css({"border": "solid 1px red" });
              $("#signupemaildiv").after('<small id="signupemailerror" style="color:red;">Email already axists</small>');
               error3 = 1;
          }
       }
    });

  }
});


$("#signuppasswordfield").blur(function(){
  if (this.value === '') {
     error4 =1;
    $("#signuppassworderror").hide();
    $("#signuppassworddiv").css({"border": "solid 1px red" });
    $("#signuppassworddiv").after('<small id="signuppassworderror" style="color:red;">Password Field Cannot Be Empty</small>');
  }else if(((this.value).length)<8){
     error4 = 1;
    $("#signuppassworderror").hide();
    $("#signuppassworddiv").css({"border": "solid 1px red" });
    $("#signuppassworddiv").after('<small id="signuppassworderror" style="color:red;">Password cannot be smaller then 8</small>');
  }else{
     error4 = 0;
    $("#signuppassworddiv").css({"border": "" });
    $("#signuppassworderror").hide();
  }
});

$("#signupconfirmPasswordfield").blur(function(){
  passwordValue = $("#signuppasswordfield").val()
  if (this.value === '') {
     error5 = 1;
    $("#signupconfirmpassworderror").hide();
    $("#signupconfirmPassworddiv").css({"border": "solid 1px red" });
    $("#signupconfirmPassworddiv").after('<small id="signupconfirmpassworderror" style="color:red;">Password Field Cannot Be Empty</small>');
  }else if(this.value !==  passwordValue){
     error5 = 1;
    $("#signupconfirmpassworderror").hide();
    $("#signupconfirmPassworddiv").css({"border": "solid 1px red" });
    $("#signupconfirmPassworddiv").after('<small id="signupconfirmpassworderror" style="color:red;">Password not same</small>');
  }else{
     error5 = 0;
    $("#signupconfirmPassworddiv").css({"border": "" });
    $("#signupconfirmpassworderror").hide();
  }
});


$("#signupbtn").click(function(e){

  signupnamefield = $("#signupnamefield").val()
  signupusernamefield = $("#signupusernamefield").val()
  signupemailfield = $("#signupemailfield").val()
  signuppasswordfield = $("#signuppasswordfield").val()
  signupconfirmPasswordfield = $("#signupconfirmPasswordfield").val()

  if(signupnamefield == '' || signupusernamefield == '' || signupemailfield == '' || signuppasswordfield == '' || signupconfirmPasswordfield == ''){
    // console.log("not ok");
  }else{
    
    if(error1 === 1 || error2 === 1 || error3 === 1 || error4 === 1 || error5 === 1){
      // console.log("not ok");
    }else{
      
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

      $.ajax({
           type:'post',
           url:"register",
           data:{name:signupnamefield, username:signupusernamefield, password: signuppasswordfield ,email:signupemailfield},
           success:function(data){
              if (data == 1) {
                    $("#signupnamediv").hide();
                    $("#signupusernamediv").hide();
                    $("#signupemaildiv").hide();
                    $("#signuppassworddiv").hide();
                    $("#signupconfirmPassworddiv").hide();
                    $("#signupbtn").hide();
                    $("#social-media").hide();
                    $("#title").text("Registered");
                    $("#social-text").text("Please SIGN IN");
                    
              }
           }
        });

    }
  }

  return false;
});


var loginerror1;
// login
$("#loginusernamefield").blur(function(){
  if (this.value === '') {
    loginerror1 = 1;
    $("#loginusernameerror").hide();
    $("#loginusernamediv").css({"border": "solid 1px red" });
    $("#loginusernamediv").after('<small id="loginusernameerror" style="color:red;">username Field Cannot Be Empty</small>');
  }else{
     loginerror1 = 0;
    $("#loginusernamediv").css({"border": "" });
    $("#loginusernameerror").hide();
    jQuery.ajax({
      url : "usernameverify",
      method: 'get',
      data: {signupusername: jQuery('#loginusernamefield').val()},
      success: function (result) {
          if(result == 0){
              $("#loginusernameerror").hide();
              $("#loginusernamediv").css({"border": "solid 1px red" });
              $("#loginusernamediv").after('<small id="loginusernameerror" style="color:red;">username does not Exists</small>');
              loginerror1 = 1;
          }    
       }
    });
  }
});


$("#signinbtn").click(function(e){
  loginusernamefield = $("#loginusernamefield").val()
  loginpasswordfield = $("#loginpasswordfield").val()
  if(loginusernamefield == '' || loginpasswordfield == ''){
  }else{
    if(error1 === 1 ){
    }else{
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
           type:'post',
           url:"login",
           data:{username:loginusernamefield, password: loginpasswordfield },
           success:function(data){
             if(data == 1){
                    $("#loginusernamediv").hide();
                    $("#loginpassworddiv").hide();
                    $("#signinbtn").hide();
                    $("#signinsocial-media").hide();
                    $("#signintitle").text("Logged In");
                    $("#signinsocial-text").text("Please Wait ...");
                    setInterval(function () {
                        window.location.replace("http://localhost:8000/products");
                      }, 2000);
                    
              }else{
                $("#loginpassworderror").hide();
                $("#loginpassworddiv").css({"border": "solid 1px red" });
                $("#loginpassworddiv").after('<small id="loginpassworderror" style="color:red;">Password does not match</small>');
             }
              
           }
        });
    }
  }
  return false;
});