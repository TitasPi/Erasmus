<div class='columns-2 gap-4 mt-48 mx-32 h-100'>
  <div data-aos="fade-right" class="p-5 h-full">
    <p class="font-bold text-3xl mb-8 flex-col justify-between flex">{{ $collection->name }}</p>
    <p class="flex-col justify-between flex">{{ $collection->short_description }}</p>
  </div>
  <div data-aos="fade-left" class="w-full text-center p-5 group relative">
    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold bg-slate-600 bg-opacity-70">
      <a href="{{ route('collection', ['lang' => App::currentLocale(), 'collection' => $collection->id]) }}">Explore more...</a>
    </div>
    @php
      $images = $collection->welcome_images();
    @endphp
    <img src="{{ asset('images/' . $images[0]) }}" alt="" class="mx-auto" loading="lazy" onerror="this.src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Faskleo.com%2Fwp-content%2Fuploads%2F2013%2F07%2Fimage_not_found.png&f=1&nofb=1'">
  </div>
</div>
<div class="columns-2 gap-4 mt-10 mx-32 ease-in-out">
  <div data-aos="fade-right" data-aos-duration="1000" class="w-full text-center p-5">
    <img src="{{ asset('images/' . $images[1]) }}" alt="" class="mx-auto" loading="lazy" onerror="this.src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Faskleo.com%2Fwp-content%2Fuploads%2F2013%2F07%2Fimage_not_found.png&f=1&nofb=1'">
  </div>
  <div data-aos="fade-left" data-aos-duration="1000" class="w-full text-center p-5 pt-16">
    <img src="{{ asset('images/' . $images[2]) }}" alt="" class="mx-auto" loading="lazy" onerror="this.src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Faskleo.com%2Fwp-content%2Fuploads%2F2013%2F07%2Fimage_not_found.png&f=1&nofb=1'">
  </div>
</div>