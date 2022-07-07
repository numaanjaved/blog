<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count() > 0)
            <x-posts-grid :posts="$posts" />

            {{$posts->links()}}
        @else
            {{__('No Posts yet. Please check back later.')}}
        @endif
        {{-- <div class="lg:grid lg:grid-cols-3">
            <x-post-card/>
            <x-post-card/>
            <x-post-card/>
        </div> --}}
    </main>

</x-layout>
