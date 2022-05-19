<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Collections') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Edit collection</h4>
        <br />
        <p>Please enter following details to edit collection</p>
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
            <label for="name_en" class="form-label inline-block mb-2 text-gray-700">Name(en) 🇺🇸</label>
            <input type="text" class="form-input" id="name_en" name="name_en" placeholder="Enter name" value="{{ old('name_en') ?? $collection->getTranslation('name', 'en') }}" />
            <label for="name_fr" class="form-label inline-block mb-2 text-gray-700">Name(fr) 🇫🇷</label>
            <input type="text" class="form-input" id="name_fr" name="name_fr" placeholder="Enter name" value="{{ old('name_en') ?? $collection->getTranslation('name', 'fr') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="icon" class="form-label inline-block mb-2 text-gray-700">Icon (shown to visitors) (enter classes from Font-Awesome)</label>
            <input type="text" class="form-input" id="icon" name="icon" placeholder="Enter icon" oninput="updateIcon()" value="{{ old('icon') ?? $collection->icon }}" />Preview: <i class="{{ old('icon') ?? $collection->icon }}" id="icon_preview"></i>
          </div>
          <div class="mb-3 xl:w-96">
            <label for="short_description_en" class="form-label inline-block mb-2 text-gray-700">Short Description (en) 🇺🇸</label>
            <input type="text" class="form-input" id="short_description_en" name="short_description_en" placeholder="Enter short description" value="{{ old('short_description_en') ?? $collection->getTranslation('short_description', 'en') }}" />
            <label for="short_description_fr" class="form-label inline-block mb-2 text-gray-700">Short Description (fr) 🇫🇷</label>
            <input type="text" class="form-input" id="short_description_fr" name="short_description_fr" placeholder="Enter short description" value="{{ old('short_description_fr') ?? $collection->getTranslation('short_description', 'fr') }}" />
          </div>
          <button type="submit" class="btn-success">Edit</button>
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
