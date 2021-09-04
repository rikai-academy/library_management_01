@extends('layouts.user.content.app')
@section('content')
    <div id="sidebar">
        @include('layouts.user.content.menu')
    </div>
    <div id="content"><br>
        <div class="products">
            <h3>{{ __('public.book_list') }}</h3>
            <ul>
                @foreach ($userBooks as $ubs)
                    <li>
                        <div class="product">
                            <a href="{{ route('homepage.show', $ubs->id) }}" class="info">
                                <span class="holder">
                                    <img src="{{ asset('/uploads') }}/{{ $ubs->image }}" alt="" />
                                    <span class="book-name">{{ $ubs->name }}</span>
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
