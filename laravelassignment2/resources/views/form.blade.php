<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <form action="FormController" method="POST" class="form-group m-4">
            <h1 class="text-center mb-4">Create your account</h1>
            @csrf
            <div class="row jumbotron">
                <div class="col-md-6">
                    <label for="inputfname">First name</label>
                    <input type="text" name="fname" id="" class="form-control" placeholder="First name">
                </div>

                <div class="col-md-6">
                    <label for="inputlname">Last name</label>
                    <input type="text" name="lname" id="" class="form-control" placeholder="Last name">
                </div>

                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email">
                </div>

                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password">
                </div>

                <div class="col-md-6">
                    <label for="address1">Address Line1</label>
                    <input type="text" name="address1" id="" class="form-control" placeholder="Address Line1">
                </div>

                <div class="col-md-6">
                    <label for="address2">Address Line2</label>
                    <input type="text" name="address2" id="" class="form-control" placeholder="Address Line2">
                </div>

                <div class="col-md-6">
                    <label for="city">City</label>
                    <input type="text" name="city" id="" class="form-control" placeholder="City">
                </div>

                <div class="col-md-4">
                    <label for="state">State</label>
                    <input type="text" name="state" id="" class="form-control" placeholder="State">
                </div>

                <div class="col-md-2">
                    <label for="zip code">Zip Code</label>
                    <input type="text" name="zipcode" id="" class="form-control" placeholder="Zip Code">
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>


            </div>
        </form>
    </div>
</body>
</html>