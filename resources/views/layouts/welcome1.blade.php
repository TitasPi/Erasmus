<div class='columns-2 gap-4 mt-48 mx-32 h-100'>
  <div data-aos="fade-right" class="w-full text-center p-5 group relative">
    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold bg-slate-600 bg-opacity-70">
      <a href="#goToCollection">Explore more...</a>
    </div>
    <img src="{{ asset('img/welcome-cover-1.jpg') }}" alt="" class="mx-auto" loading="lazy">
  </div>
  <div data-aos="fade-left" data-aos-duration="1000" class="p-5 h-full">
    <p class="font-bold text-3xl mb-8 flex-col justify-between flex">{{ $collection->name }}</p>
    <p class="flex-col justify-between flex">{{ $collection->short_description }}</p>
  </div>
</div>
<div class="columns-2 gap-4 mt-10 mx-32">
  <div data-aos="fade-right" data-aos-duration="1000" class="w-full text-center mt-16 p-5">
    <img src="{{ asset('img/welcome-cover-2.jpg') }}" alt="" class="mx-auto" loading="lazy">
  </div>
  <div data-aos="fade-left" data-aos-duration="1000" class="w-full text-center mb-16 p-5">
    <img src="{{ asset('img/welcome-cover-3.jpg') }}" alt="" class="mx-auto" loading="lazy">
  </div>
</div>