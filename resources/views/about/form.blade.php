<div class='w-1/2 ml-auto pr-28'>
  <div class='font-semibold pt-28'>
    <p class='text-4xl'>Let's get in touch!</p>
    <p class='text-2xl'>Question? Suggestion? Project?</p>
    <p class='text-2xl'>Don't hesitate to contact me</p>
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
        <label for="name" class="form-label inline-block mb-2 text-gray-700">Your name</label>
        <input type="text" class="form-input" id="name" name="name" placeholder="How should we call you?" value="{{ old('name') }}" />
      </div>
      <div class="mb-3 xl:w-96">
        <label for="email" class="form-label inline-block mb-2 text-gray-700">Your email</label>
        <input type="email" class="form-input" id="email" name="email" placeholder="How should we contact you?" value="{{ old('email') }}" />
      </div>
      <div class="mb-3 xl:w-96">
        <label for="message" class="form-label inline-block mb-2 text-gray-700">Your message</label>
        <textarea class="form-input" id="message" name="message" rows="3" placeholder="What would you like to talk about?">{{ old('message') }}</textarea>
      </div>
      <button type="submit" class='btn-success'>Send</button>
    </form>
  </div>
</div>
