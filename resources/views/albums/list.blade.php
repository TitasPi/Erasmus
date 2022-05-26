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
          <p class="text-9xl">{{$album->title}}</p>
          <p class="custom-font text-8xl">Yoann Baty</p>
        </div>
        <div class='m-20'>
          <p class='text-5xl my-5'>{{ $album->short_description }}</p>
          <p class='text-3xl'>{{ $album->long_description }}</p>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  @php
    $images = $album->images;
  @endphp
    <div class='flex'>
      <div class='w-[70vw]'>
        <img src="/images/{{$images[0]->src}}" alt="" class="w-1/2 mx-auto opacity-0">
      </div>
      <div class='text-center'>
  @for ($x = 0; $x < $images->count(); $x++)
    @php
      $image = $images[$x];
    @endphp
      @if ($x % 2 == 0)
        <img src="/images/{{$images[$x]->src}}" data-bs-toggle="modal" data-bs-target="#imagesModal" onclick="modalChangeImg('{{asset('images/'.$image->src)}}')" alt="" class="w-2/5 p-4 ml-auto hover:grayscale duration-500" onclick='alert(this.src)'>
      @else
        <img src="/images/{{$images[$x]->src}}" data-bs-toggle="modal" data-bs-target="#imagesModal" onclick="modalChangeImg('{{asset('images/'.$image->src)}}')" alt="" class="w-2/5 p-4 mr-auto hover:grayscale duration-500" onclick='alert(this.src)'>
      @endif
  @endfor
      </div>
    </div>
    @include('dashboard.images.modal')
    <script>
      function modalChangeImg(src) {
        const img = document.getElementById('modalImg');
        img.src = src;
      }
    </script>
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
