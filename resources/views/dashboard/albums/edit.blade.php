<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Album') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Edit album</h4>
        <br />
        <p>Please enter following details to edit album</p>
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
            <label for="title_en" class="form-label inline-block mb-2 text-gray-700">Title(en) 🇺🇸</label>
            <input type="text" class="form-input" id="title_en" name="title_en" placeholder="Enter title" value="{{ old('title_en') ?? $album->getTranslation('title', 'en') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="title_fr" class="form-label inline-block mb-2 text-gray-700">Title(fr) 🇫🇷</label>
            <input type="text" class="form-input" id="title_fr" name="title_fr" placeholder="Enter title" value="{{ old('title_fr') ?? $album->getTranslation('title', 'fr') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="short_description_en" class="form-label inline-block mb-2 text-gray-700">Short Description(en) 🇺🇸</label>
            <input type="text" class="form-input" id="short_description_en" name="short_description_en" placeholder="Enter short description" value="{{ old('short_description') ?? $album->getTranslation('short_description', 'en') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="short_description_fr" class="form-label inline-block mb-2 text-gray-700">Short Description(fr) 🇫🇷</label>
            <input type="text" class="form-input" id="short_description_fr" name="short_description_fr" placeholder="Enter short description" value="{{ old('short_description') ?? $album->getTranslation('short_description', 'fr') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="long_description_en" class="form-label inline-block mb-2 text-gray-700">Long description(en) 🇺🇸</label>
            <textarea class="form-input" id="long_description_en" name="long_description_en" rows="3" placeholder="Leave empty to show short description">{{ old('long_description_en') ?? $album->getTranslation('long_description', 'en') }}</textarea>
          </div>
          <div class="mb-3 xl:w-96">
            <label for="long_description_fr" class="form-label inline-block mb-2 text-gray-700">Long description(fr) 🇫🇷</label>
            <textarea class="form-input" id="long_description_fr" name="long_description_fr" rows="3" placeholder="Leave empty to show short description">{{ old('long_description_fr') ?? $album->getTranslation('long_description', 'fr') }}</textarea>
          </div>
          <div class="mb-3 xl:w-96">
            <div class="datepicker relative form-floating mb-3 xl:w-96">
              <input type="text" class="form-input" placeholder="Select a date" name="date" value="{{ $album->date }}" />
              <label for="floatingInput" class="text-gray-700">Select a date</label>
            </div>
          </div>
          <div class="mb-3 xl:w-96">
            <select class="form-select-custom" aria-label="Select collection" name="collection">
              <option selected>Select collection</option>
              @foreach (\App\Models\Collection::all() as $c)
              <option value="{{ $c->id }}" @if($collection->id == $c->id) selected @endif>{{ $c->name }} -> {{ $c->icon }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn-success">Edit</button>
        </form>
      </div>
    </div>
</x-app-layout>
