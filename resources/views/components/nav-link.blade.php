@props(['active' => false, 'type'])
<!-- a prop are data we want to pass through to that component 
  so that we can use it within the component.-->

@if($type == 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" 
        aria-current="{{ $active ? 'page': 'false' }}" 
        {{ $attributes }}
    >{{ $slot }}    </a>
    <!-- aria-current is the way to indicate if the current link represent the current page in a list of pages-->
@elseif($type == "button")
    <button class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" 
        aria-current="{{ $active ? 'page': 'false' }}" 
        {{ $attributes }}
    >{{ $slot }}    </button>
@endif

