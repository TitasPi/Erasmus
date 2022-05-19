@extends('layouts.public')

@section('head')

@endsection

@section('header')
<header class='h-screen'>
  <div class='columns-2 gap-0'>
    <img src="{{ asset('img/welcome-background.jpg') }}" alt="" class="h-screen w-[50vw] object-cover img-load">
    <div>
      @include('welcome-nav')

      <div class="custom-font -rotate-90 text-9xl relative left-[-40%] top-80">
        <p>Yoann Baty</p>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  @php
    $collections = \App\Models\Collection::where('active', true)->get();
  @endphp
  @for ($x = 0; $x < $collections->count(); $x++)
    @php
      $collection = $collections[$x];
    @endphp
    @if($x % 2 == 0)
      @include('layouts.welcome1', ['collection' => $collection])
    @else
      @include('layouts.welcome2', ['collection' => $collection])
    @endif
  @endfor
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
