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
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-blue-600">All albums of {{ $collection->name }} <img src="{{ asset($collection->icon) }}" /></h5>
        @include('dashboard.albums.album-list')
      </div>
    </div>
  </div>
</x-app-layout>
