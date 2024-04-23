@props(['href', 'active', 'color'])

@php
    $classes = $active
        ? 'flex items-center p-2 text-black rounded-lg  hover:bg-gray-10 group justify-between'
        : 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 justify-between';

    $show = $active 
        ? 'd-block'
        : 'hidden';

    $current = $active
        ? 'text-black transition duration-75'
        : 'text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white';
        @endphp

<li>
    <a href="{{ $href }}" class="{{ $classes }}">
        <div class="flex items-center">

            <span class="slot-icon {{$current}}">
                {{ $icon ?? '' }}
            </span>
            <span class="ms-3">
                {{ $slot }}
            </span>
        </div>
        <span class="h-auto bg-{{$color}}-600 w-2 float-end rounded-s-md {{$show}}">&nbsp;</span>
    </a>
</li>
