@extends('homePageLayout')
@section('content')
    <h1>Your Account is Created</h1>
@endsection
@section('script')
    <script>
        document.getElementById("loginbtn").style.display = "none";
        document.getElementById("signupbtn").style.display = "none";
    </script>
@endsection

    