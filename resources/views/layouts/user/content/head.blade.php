<head>
 <title>Library</title>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 <link href="{{ secure_asset('css/userhome/images/favicon.ico') }}" >
 <link href="{{ secure_asset('css/userhome/style.css') }}" rel="stylesheet" type="text/css" media="all">
 <script src = "{{ secure_asset('/js/userhome/jquery-1.6.2.min.js') }}"></script>
 <script src = "{{ secure_asset('/js/userhome/jquery.jcarousel.min.js') }}"></script>
 <script src = "{{ secure_asset('/js/userhome/functions.js') }}"></script>
 <link href="{{ secure_asset('site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
 <script src = "{{ secure_asset('/js/userhome/script.js') }}"></script>
 @isset($og_fb)
 <meta property="og:url" content="{{$open_graph_face_book['url_page']}}"/>
 <meta property="og:description" content="{{$open_graph_face_book['title_book']}}" />
 <meta property="og:image" content="{{$open_graph_face_book['image_book']}}" />
 <meta property="og:title" content="{{$open_graph_face_book['name_book']}}" />
 <meta property="og:type" content="article" />
 @endisset
 @livewireStyles 
</head>