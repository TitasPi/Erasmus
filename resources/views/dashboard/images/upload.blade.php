<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Images') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">New image</h4>
        <br />
        <p>Please enter following details to upload new image</p>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        @if ($errors->any())
        <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="" method="post" enctype='multipart/form-data'>
          @csrf
          <div class="mb-3 w-96">
            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Select image</label>
            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image" name="image">
          </div>

          <button type="submit" class="btn-success">Upload</button>
        </form>
      </div>
    </div>
</x-app-layout>
