@props(['$trigger'])
<div x-data=" show: false">

    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 w-full mt-2 rounded-xl z-50">
        {{ $slot }}

{{--        @foreach($categories as $category)--}}
{{--            <a href="{{ route('categories.view',$category->slug) }}"--}}
{{--               class="block text-left px-3 text-sm leading-5 hover:bg-blue-300 focus:bg-blue-300 hover:text-white focus:text-white">--}}
{{--                {{ ucwords($category->name) }}--}}
{{--            </a>--}}
{{--        @endforeach--}}
    </div>
</div>
