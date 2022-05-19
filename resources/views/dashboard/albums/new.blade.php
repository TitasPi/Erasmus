<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Albums') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">New album</h4>
        <br />
        <p>Please enter following details to make new album</p>
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
            <label for="title" class="form-label inline-block mb-2 text-gray-700">Title</label>
            <input type="text" class="form-input" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="short_description" class="form-label inline-block mb-2 text-gray-700">Short Description 🇺🇸</label>
            <input type="text" class="form-input" id="short_description" name="short_description" placeholder="Enter short description" value="{{ old('short_description') }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="long_description" class="form-label inline-block mb-2 text-gray-700">Long description 🇺🇸</label>
            <textarea class="form-input" id="long_description" name="long_description" rows="3" placeholder="Leave empty to show short description">{{ old('long_description') }}</textarea>
          </div>
          <div class="mb-3 xl:w-96">
            <div class="datepicker relative form-floating mb-3 xl:w-96">
              <input type="text" class="form-input" placeholder="Select a date" name="date" />
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

          <button type="submit" class="btn-success">Create</button>
        </form>
      </div>
    </div>
</x-app-layout>
