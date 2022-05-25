<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Collections') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">New collection</h4>
        <br />
        <p>Please enter following details to make new collection</p>
        <p>Note: it will be hidden by default</p>
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
        <form action="" method="post">
          @csrf
          <div class="mb-3 xl:w-96">
            <label for="name" class="form-label inline-block mb-2 text-gray-700">Name (internal) 🇺🇸</label>
            <input type="text" class="form-input" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="icon" class="form-label inline-block mb-2 text-gray-700">Icon (shown to visitors)</label>
            <input type="text" class="form-input" oninput="updateIcon()" id="icon" name="icon" placeholder="Enter icon" value="{{ old('icon') }}" />Preview: <i class="" id="icon_preview"></i>
          </div>
          <div class="mb-3 xl:w-96">
            <label for="short_description" class="form-label inline-block mb-2 text-gray-700">Short Description 🇺🇸</label>
            <input type="text" class="form-input" id="short_description" name="short_description" placeholder="Enter short description" value="{{ old('short_description') }}" />
          </div>
          <button type="submit" class="btn-success">Create</button>
        </form>
      </div>
    </div>
    <script>
      const iconInput = document.getElementById('icon');
      const iconPreview = document.getElementById('icon_preview');

      function updateIcon() {
        iconPreview.className = iconInput.value;
      }
    </script>
</x-app-layout>
