<div class='w-1/2 ml-auto pr-28'>
  <div class='font-semibold pt-28'>
    <p class='text-4xl'>{{ __('contact.firstLine') }}</p>
    <p class='text-2xl'>{{ __('contact.secondLine') }}</p>
    <p class='text-2xl'>{{ __('contact.thirdLine') }}</p>
  </div>
  <div class='mt-10'>
    <form action="" method="post">
      @if (session('status'))
      <div class="alert-success">
        {{ session('status') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @csrf
      <div class="mb-3 xl:w-96">
        <label for="name" class="form-label inline-block mb-2 text-gray-700">{{ __('contact.yourName.title') }}</label>
        <input type="text" class="form-input" id="name" name="name" placeholder="{{ __('contact.yourName.help') }}" value="{{ old('name') }}" />
      </div>
      <div class="mb-3 xl:w-96">
        <label for="email" class="form-label inline-block mb-2 text-gray-700">{{ __('contact.yourEmail.title') }}</label>
        <input type="email" class="form-input" id="email" name="email" placeholder="{{ __('contact.yourEmail.help') }}" value="{{ old('email') }}" />
      </div>
      <div class="mb-3 xl:w-96">
        <label for="message" class="form-label inline-block mb-2 text-gray-700">{{ __('contact.yourMessage.title') }}</label>
        <textarea class="form-input" id="message" name="message" rows="3" placeholder="{{ __('contact.yourMessage.help') }}">{{ old('message') }}</textarea>
      </div>
      <button type="submit" class='btn-success'>{{ __('contact.send') }} Send</button>
    </form>
  </div>
</div>
