<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Settings') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Generic settings</h4>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
          <form action="" method="post" id="form">
          @csrf
          @if ($errors->any())
          <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-blue-600">App settings</h5>
          @if($updater->source()->isNewVersionAvailable())
            <div class="alert-warning">You are currently running: {{ $updater->source()->getVersionInstalled() }}. There is update available ({{ $updater->source()->getVersionAvailable() }}) <a href="{{ route('dashboard.settings.generic.update') }}" class='btn btn-danger'>UPDATE</a></div>
          @else
            <div class="alert-success">You are currently running: {{ $updater->source()->getVersionInstalled() }}. You are up to date!</div>
          @endif
          <div class="mb-3 xl:w-96">
            <label for="site_name" class="form-label inline-block mb-2 text-gray-700">App name</label>
            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="site_name" name="site_name" placeholder="Site name" value="{{ app(GeneralSettings::class)->site_name }}" />
          </div>
          <div class="mb-3 xl:w-96">
            <div class="form-check">
              <input class="form-check-custom" type="checkbox" value="true" name="site_active" id="site_active" {{ (app(GeneralSettings::class)->site_active) ? 'checked' : '' }}>
              <label class="form-check-label inline-block text-gray-800" for="site_active">
                Site active
              </label>
            </div>
          </div>
          <div class="mb-3 xl:w-96">
            <div class="form-check">
              <input class="form-check-custom" type="checkbox" value="true" name="auth_enabled" id="auth_enabled" {{ (app(GeneralSettings::class)->auth_enabled) ? 'checked' : '' }}>
              <label class="form-check-label inline-block text-gray-800" for="auth_enabled">
                Registration enabled
              </label>
            </div>
          </div>
          <div class="mb-3 xl:w-96">
            <label for="contact_email" class="form-label inline-block mb-2 text-gray-700">Contact email</label>
            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="contact_email" name="contact_email" placeholder="Contact email" value="{{ app(GeneralSettings::class)->contact_email }}" />
          </div>

          <button type="submit" class="btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
