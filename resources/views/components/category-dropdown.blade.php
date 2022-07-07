<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <x-dropdown-category>
        <x-slot name="trigger">
            <button class="flex-1 appearance-none w-full lg:w-32 bg-transparent py-2 pl-3 pr-9 text-sm font-semibold flex lg:inline-flex">
                {{isset($currentCategory) ? ucfirst($currentCategory->name) : 'Categories'}}
                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                    height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path fill="#222"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                    </g>
                </svg>
            </button>
        </x-slot>
        <x-anchor-dropdown-category href="/?{{http_build_query(request()->except('category','page'))}}" :active="request()->routeIs('home')">All</x-anchor-dropdown-category>
        @foreach($categories as $category)
            {{-- {{isset($currentCategory) && $currentCategory->is($category) ? 'text-white bg-blue-500' : ''}} --}}
            <x-anchor-dropdown-category href="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}"
                :active="request()->is('categories/'.$category->slug)">
                {{ucfirst($category->name)}}
            </x-anchor-dropdown-category>
        @endforeach
    </x-dropdown-category>



