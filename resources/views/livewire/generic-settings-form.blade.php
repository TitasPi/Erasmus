<div>
  <form action="" method="post" id="form" wire:submit.prevent="save">
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
      <input wire:model="site_name" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="site_name" name="site_name" placeholder="Site name" />
    </div>
    <div class="mb-3 xl:w-96">
      <div class="form-check">
        <input wire:model="site_active" class="form-check-custom" type="checkbox" value="true" name="site_active" id="site_active">
        <label class="form-check-label inline-block text-gray-800" for="site_active">
          Site active
        </label>
      </div>
    </div>
    <div class="mb-3 xl:w-96">
      <div class="form-check">
        <input wire:model="auth_enabled" class="form-check-custom" type="checkbox" value="true" name="auth_enabled" id="auth_enabled">
        <label class="form-check-label inline-block text-gray-800" for="auth_enabled">
          Registration enabled
        </label>
      </div>
    </div>
    <div class="mb-3 xl:w-96">
      <label for="contact_email" class="form-label inline-block mb-2 text-gray-700">Contact email</label>
      <input wire:model="contact_email" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="contact_email" name="contact_email" placeholder="Contact email" />
    </div>

    <button type="submit" class="btn-success">Save</button>
  </form>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    const Toast = Swal.mixin({
      toast: true
      , position: 'top-right'
      , showConfirmButton: false
      , showCloseButton: true
      , timer: 5000
      , timerProgressBar: true
      , didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    window.addEventListener('alert', ({
      detail: {
        type
        , message
      }
    }) => {
      Toast.fire({
        icon: type
        , title: message
      })
    })

  </script>
</div>
