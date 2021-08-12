<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset("style.css") }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          
          <form action="#" class="sign-in-form">
            <h2 class="title" id="signintitle">Sign in</h2>
            
            <div class="input-field " id="loginusernamediv">
              <i class="fas fa-user"></i>
              <input id="loginusernamefield" type="text" placeholder="Username" />
            </div>

            <div class="input-field" id="loginpassworddiv">
              <i class="fas fa-lock"></i>
              <input id="loginpasswordfield" type="password" placeholder="Password" />
            </div>

            <button id="signinbtn" name="signinbtn" class="btn solid" >LOGIN</button>

            <p class="social-text" id="signinsocial-text">Or Sign in with social platforms</p>
            <div class="social-media" id="signinsocial-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          <form class="sign-up-form" >
            <h2 class="title" id="title">Sign up</h2>

            <div class="input-field" id="signupnamediv">
              <i class="fas fa-user"></i>
              <input id="signupnamefield" name="signupname" type="text" placeholder="Name" />
            </div>

            <div class="input-field" id="signupusernamediv">
              <i class="fas fa-user"></i>
              <input id="signupusernamefield" name="signupusername" type="text" placeholder="Username" />
            </div>

            <div class="input-field" id="signupemaildiv">
              <i class="fas fa-envelope"></i>
              <input id="signupemailfield" name="signupemail" type="email" placeholder="Email" />
            </div>

            <div class="input-field" id="signuppassworddiv">
              <i class="fas fa-lock"></i>
              <input id="signuppasswordfield" name="signuppassword" type="password" placeholder="Password" />
            </div>

            <div class="input-field" id="signupconfirmPassworddiv">
              <i class="fas fa-lock"></i>
              <input id="signupconfirmPasswordfield" name="signupconfirmPassword" type="password" placeholder="Confirm Password" />
            </div>

            <button id="signupbtn" name="signupbtn" class="btn" >Sign up</button>
            <p class="social-text" id="social-text">Or Sign up with social platforms</p>
            <div class="social-media" id="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{{ asset("img/log.svg") }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{{ asset("img/register.svg") }}" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="jquery.js"></script>
    <script src="{{ asset("app.js") }}"></script>
  </body>
</html>
