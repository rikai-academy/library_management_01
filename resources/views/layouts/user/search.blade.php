@extends('layouts.user.content.app')
@section('content')
    <div id="sidebar">
        @include('layouts.user.content.menu')
    </div>
    <div id="content"><br>
        <div class="products">
            @if (isset($searchResults))
                @if ($searchResults->isEmpty())
                    <h3>{{ __('message.search_title_sr') }}<b>"{{ $search_term }}"</b>.</h3>
                @else
                    <h2 class="search_mess">{{ __('message.count_search') }}
                        {{ $searchResults->count() }}{{ __('message.search_key') }}
                        <b>"{{ $search_term }}"</b>
                    </h2>
                    @foreach ($searchResults->groupByType() as $type => $modelSearchResults)
                        <h3 class="box_search">{{ $type }}</h3>
                        <div class="product_search">
                            @foreach ($modelSearchResults as $searchResult)
                                <div class="search_info">
                                    <a href="{{ $searchResult->url_user }}" class="info">
                                        <div>
                                            @if (isset($searchResult->image))
                                                <img src="{{ asset('/uploads') }}/{{ $searchResult->image }}" alt="" />
                                            @endif
                                        </div>
                                        <div>
                                            <span class="book-name">{{ $searchResult->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
