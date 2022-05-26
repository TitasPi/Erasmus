@extends('layouts.public')

@section('head')

@endsection

@section('header')
<header class='h-screen'>
  <div class='columns-2 gap-0'>
    <img src="{{ asset('img/welcome-background.jpg') }}" alt="" class="h-screen w-[50vw] object-cover img-load opacity-0">
    <div>
      @include('welcome-nav')
      <div>
        <div class='rotate-90 fixed left-10 top-80'>
          <p class="text-9xl">{{$collection->name}}</p>
          <p class="custom-font text-8xl">Yoann Baty</p>
        </div>
        <div class='m-20'>
          <p class='text-5xl my-5'>{{ $collection->name }}</p>
          <p class='text-3xl'>{{ $collection->short_description }}</p>
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
      <div class='col-span-1 w-[50vw]'>
        <img src="/images/{{$album->images[0]->src}}" alt="" class="w-1/2 mx-auto opacity-0">
      </div>
      <div class='text-center group' onclick='window.location.href="{{ route("album", ["lang" => App::currentLocale(), "collection" => $collection->id, "album" => $album->id]) }}"'>
        <p class='relative rotate-90 text-7xl top-40 -right-80 group-hover:text-8xl duration-300'>{{ $album->title }}</p>
        <img src="/images/{{$album->images[0]->src}}" alt="" class="w-1/2 mx-auto">
      </div>
    </div>
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
