@extends('layouts.public')

@section('head')

@endsection

@section('header')
<header class='h-screen'>
  <div class='columns-2 gap-0'>
    <img src="{{ asset('img/about.png') }}" alt="" class="h-screen w-[50vw] object-cover img-load">
    <div>
      @include('welcome-nav')

      <div class="custom-font -rotate-90 text-9xl relative left-[-40%] top-60">
        <p>{{ __('about.title') }}</p>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  <div>
    <p class='w-1/2 m-auto pt-28 text-2xl'>
      {{ __('about.description') }}
    </p>
  </div>

  @include('about.form')
@endsection

@section('footer')
  @include('footer')
@endsection

@section('scripts')
  @env('local')
  {{-- <script src="http://localhost:35729/livereload.js"></script> --}}
  @endenv
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
@endsection
