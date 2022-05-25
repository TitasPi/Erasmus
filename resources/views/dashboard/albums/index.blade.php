<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Albums') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Albums settings</h4>
      </div>
    </div>
    @php
      $images = $collection->welcome_images();
    @endphp    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        @if(count(array_filter($images)) != 3)
          <div class="alert-danger">
            Only <b>{{ count(array_filter($images)) }}</b> image{{ (count(array_filter($images)) != 1) ? 's are' : ' is' }} selected for front page. Please select <b>{{ 3-count(array_filter($images)) }}</b> more image{{ (3-count(array_filter($images)) != 1) ? 's' : '' }}
          </div>
        @endif
        <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-blue-600">Welcome page images for {{ $collection->name }} <i class="{{ $collection->icon }}"></i></h5>
        <div class="flex">
          @foreach ($collection->welcome_images() as $image)
            <a href="{{ asset('images/' . $image) }}">
              <img src="{{ asset('images/' . $image) }}" alt="{{ $image }}" srcset="" class="max-w-xs">
            </a>
          @endforeach
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-blue-600">All albums of {{ $collection->name }} <i class="{{ $collection->icon }}"></i></h5>
        @include('dashboard.albums.album-list')
      </div>
    </div>
  </div>
</x-app-layout>
