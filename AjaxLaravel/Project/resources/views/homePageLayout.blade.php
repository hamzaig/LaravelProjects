<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 3</title>
</head>z

<body>

    <div class="wrapper">
        <nav class="navbar">
            <img class="logo" src="logo.png">
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Feedback</a></li>
            </ul>
        </nav>
        <div class="center">
            <h1>Welcome To Cascade</h1>
            <h2>Create Something New</h2>
            <div class="buttons">
                <button type="button" id="loginbtn" data-toggle="modal" data-target="#loginModal">Login</button>
                <button type="button" id="signupbtn" data-toggle="modal" data-target="#signupModal" class="btn2">Register</button>
            </div>
        </div>
    </div>

    <!--Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{URL::to('store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold danger text-danger" id="exampleModalLabel">SignUp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="signupbtn" class="btn btn-danger">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" name="login_form" id="login_form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold danger text-danger" id="exampleModalLabel">SignUp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="loginUsername" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-danger save-data">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
{{-- <script>

    
        var data = $("#frm_login").serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                type : 'POST',
                url: '{{route('login.check')}}',
                data : data,
            success : function(response)
            {
                console.log(response);
                if(response == 1)
                {
                  window.location.replace('{{route('test.index')}}');
                }
                else if(response == 3)
                {
                    $("#err").hide().html("Username or Password  Incorrect. Please Check").fadeIn('slow');
                }
            }
        });
    }

</script> --}}