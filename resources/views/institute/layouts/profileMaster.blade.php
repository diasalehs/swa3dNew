<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href=" {{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('vendor/css/styles.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/footer.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/profile.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/jquery.tag-editor.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
    <link href="{{ URL::asset('vendor/css/bootstrap-select.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
      @include('institute/includes.instituteHeader')
      @yield('content')
    </div>

    @include('includes.footer')
</body>
</html>
