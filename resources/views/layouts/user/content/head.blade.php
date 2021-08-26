<head>
 <title>Library</title>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 <link href="{{ asset('css/userhome/images/favicon.ico') }}" >
 <link href="{{ asset('css/userhome/style.css') }}" rel="stylesheet" type="text/css" media="all">
 <script src = "{{ asset('/js/userhome/jquery-1.6.2.min.js') }}"></script>
 <script src = "{{ asset('/js/userhome/jquery.jcarousel.min.js') }}"></script>
 <script src = "{{ asset('/js/userhome/functions.js') }}"></script>
 <script src = "{{ asset('/js/userhome/script.js') }}"></script>
 @isset($og_fb)
 <meta property="og:url" content="{{$og_fb['url_page']}}"/>
 <meta property="og:description" content="{{$og_fb['title_book']}}" />
 <meta property="og:image" content="{{$og_fb['image_book']}}" />
 <meta property="og:title" content="{{$og_fb['name_book']}}" />
 <meta property="og:type" content="article" />
 @endisset
 @livewireStyles 
</head>