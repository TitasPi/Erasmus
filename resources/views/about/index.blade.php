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
        <p>My story</p>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
  <div>
    <p class='w-1/2 m-auto pt-28 text-2xl'>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt at esse veniam voluptatem quis dolorem rerum illum aperiam debitis dolore, commodi nisi accusantium unde repudiandae consectetur eius reprehenderit mollitia impedit natus ab suscipit dicta laborum. Enim beatae incidunt, fuga dolorum voluptate nam molestias maxime accusamus quam suscipit voluptatem excepturi porro, accusantium optio voluptas nihil explicabo ullam deserunt. Eveniet at harum earum voluptates dolor explicabo accusamus deserunt eaque assumenda nemo est, doloremque temporibus id modi excepturi saepe fugit odio aperiam distinctio rem nisi! Error sed nobis, rerum temporibus officia quia minima. Necessitatibus natus reiciendis corrupti reprehenderit enim odio amet ipsam ullam.
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
