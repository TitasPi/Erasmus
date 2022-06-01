<div class="pt-10">
  <div class="flex justify-evenly px-96 py-5 text-4xl">
    @foreach(\App\Models\Collection::where('active', True)->get() as $collection)
      <a href="#linkToCollection-{{ $collection->id }}" class="{{ $collection->icon }} hover:text-[#3C3C3C] text-[#7B7B7B]"></a>
    @endforeach
  </div>
  <div class="flex justify-evenly px-96 py-5 text-4xl">
    <a href="{{ route('about', ['lang' => App::currentLocale()]) }}">{{ __('footer.about_me') }}</a>
    <a href="{{ route('policy.show') }}">{{ __('footer.privacy_policy') }}</a>
    <a href="{{ route('about', ['lang' => App::currentLocale()]) }}">{{ __('footer.contact') }}</a>
  </div>
  <div class="flex justify-center px-96 py-5">
    <a href=""><img src="{{ asset('svg/instagram.svg') }}" alt=""></a>
  </div>
</div>