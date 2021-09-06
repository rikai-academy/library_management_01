  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ __('message.title_logo') }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{ secure_asset('site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ secure_asset('site/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('site/css/btn-image.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('site/css/search.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('site/css/jqueryui.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('site/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('Layout.Elements.js')
  @livewireStyles
