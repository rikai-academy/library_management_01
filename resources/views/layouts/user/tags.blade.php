@extends('layouts.user.content.app')
@section('content')
    <div id="sidebar">
        @include('layouts.user.content.menu')
    </div>
    <div id="content"><br>
        <div class="products">
            <h3>{{ __('message.tag_key')}} - {{request()->tag}}</h3>
            <ul>
                @foreach ($book_tags as $tag)
                    <li>
                        <div class="product">
                            <a href="{{ route('homepage.show', $tag->id) }}" class="info">
                                <span class="holder">
                                    <img src="{{ asset('/uploads') }}/{{ $tag->image }}" alt="" />
                                    <span class="book-name">{{ $tag->name }}</span>
                                </span>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cl">&nbsp;</div>
    </div>
@endsection
