@extends('layouts.public')

@section('head')

@endsection

@section('header')
<header class='h-screen'>
  <div class='columns-2 gap-0'>
    <img src="{{ asset('img/welcome-background.jpg') }}" alt="" class="h-screen w-[50vw] object-cover img-load opacity-0">
    <div>
      @include('welcome-nav')
      <div class="rotate-90 fixed left-10 top-80">
        <div>
          <p class="text-9xl">{{$collection->name}}</p>
          <p class="custom-font text-8xl">Yoann Baty</p>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  @php
    $albums = $collection->albums;
  @endphp
  @for ($x = 0; $x < $albums->count(); $x++)
    @php
      $album = $albums[$x];
    @endphp
    <div class='columns-2'>
      <div></div>
      <div></div>
    </div>
    {{$album}}
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
