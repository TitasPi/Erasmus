<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Images') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Images settings</h4>
      </div>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-blue-600">All images of {{ $album->title }} <i class="{{ $collection->icon }}"></i></h5>
        @include('dashboard.images.image-list')
        @include('dashboard.images.modal')
      </div>
    </div>
  </div>
  <script>
    function modalChangeImg(src) {
      const img = document.getElementById('modalImg');
      img.src = src;
    }
  </script>
</x-app-layout>
