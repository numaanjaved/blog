@props(['posts'])
<x-post-featured-card :post="$posts[0]"/>
@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-2">
        {{-- {{__($posts)}} --}}
        @foreach($posts->skip(1) as $post)
            @if($loop->iteration < 3)
                <x-post-card :post="$post"/>
            @endif

        @endforeach
    </div>
@endif
@if($posts->count() > 3)
    <div class="lg:grid lg:grid-cols-3">
        {{-- {{__($posts)}} --}}
        @foreach($posts->skip(3) as $post)
            @if($loop->iteration < 3)
                <x-post-card :post="$post"/>
            @endif

        @endforeach
    </div>
@endif
