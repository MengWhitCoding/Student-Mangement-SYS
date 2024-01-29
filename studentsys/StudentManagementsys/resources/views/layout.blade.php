<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Management System</title>
    <style>
        .main {
            display: flex;
            justify-content: space-between;
        }

        .sidebar {

            background-color: rgb(228, 228, 233);
            display: flex;
            flex-direction: column;
            text-align: center;
            box-shadow: 10px 4px 26px 0px rgba(170, 148, 148, 0.75);
            list-style-type: none;
            margin: 0;
            padding: 0;
            border-radius: 7px;
            overflow: hidden;
        }

        .si {
            width: 20%;
        }

        .con {
            width: 75%;
        }

        .a {
            display: block;
            font-weight: 500;
            color: blue;
            padding: 15px 16px;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
        }

        .active{
            background-color: blue;
            padding: 15px 16px;
            color: white;
        }

        a:hover {
            background-color: #5177f4;
            color: white;

        }
        .member{

            text-align: center;
            padding: 70px 0px;
            color: blue;
            height: 430px;
        }
    </style>
</head>

<body style="background-color: #8dbdf8;">

    <div class="container">
        <div class="row">
            <div class="col md-12">
                <nav class="text-center mt-5" style="background-color: blue; border-radius:7px;">
                    <h2 style="color: white; padding:15px; ">Student Management System</h2>
                </nav>
            </div>
        </div>
        <div class="main" >
            <div class="si">
                @include('components.sibar')
            </div>
            <div class="con">
                @yield('content')
            </div>
        </div>
    </div>
</body>
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('.a');
        const menuLength = menuItem.length
        for(let i=0; i<menuLength; i++){
            if(menuItem[i].href === currentLocation){
                menuItem[i].className = "active"
            }
        }
    </script>
</html>

