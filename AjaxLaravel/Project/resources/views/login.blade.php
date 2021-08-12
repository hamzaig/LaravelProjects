@extends('homePageLayout')
@section('content')
    <h1>You Are Logged In</h1>
@endsection
@section('script')
    <script>
        document.getElementById("loginbtn").style.display = "none";
        document.getElementById("signupbtn").style.display = "none";
    </script>
@endsection

    