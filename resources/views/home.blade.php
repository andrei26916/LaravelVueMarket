<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>

<?php
    $user = [
        'id' => 1,
        'login' => 'andrei',
        'email' => 'andrei26916@mail.ru',
        'birthDate' => '1997-03-03',
        'last_name' => null,
        'first_name' => null,
        'father_name' => null,
        'phone' => '89997788357',
        'role' => 1,
        'avatar' => 'https://e7.pngegg.com/pngimages/109/949/png-clipart-computer-software-management-business-service-technical-support-sugarplum-miscellaneous-infographic.png',
    ];
?>

<div id="app" data-user='@json($user)'>
    <app></app>
</div>



</body>
</html>


