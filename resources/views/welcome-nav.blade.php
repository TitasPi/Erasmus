<nav class="flex justify-evenly items-center bg-[#F7F7F7] mx-2 relative z-10">
    <div id="navbar" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]" x-data="{ open: false }" onmouseover="this._x_dataStack[0].$data.open = true" onmouseout="this._x_dataStack[0].$data.open = false">
    {{ __('nav.collections') }}
      <div class="fixed top-[40px] right-[0px] px-2 w-1/2" x-show="open">
        <div class="flex justify-evenly items-center bg-[#F7F7F7]">
        @foreach (\App\Models\Collection::where('active', True)->get() as $collection)
          <div class="hover:bg-[#D7D7D7] flex justify-center w-full text-center" x-data="{ open_{{$collection->id}}: false }" onmouseover="this._x_dataStack[0].$data.open_{{$collection->id}} = true" onmouseout="this._x_dataStack[0].$data.open_{{$collection->id}} = false">
            <a href="{{route('collection', ['collection' => $collection, 'lang' => App::currentLocale()])}}" class="relative block p-2 w-full h-full text-center no-underline text-black font-semibold text-3xl {{$collection->icon}}"></a>
            <div class="px-2 absolute top-[45px] left-0 w-full" x-show="open_{{$collection->id}}">
              <div class="flex flex-col justify-evenly items-center bg-[#F7F7F7]">
              @foreach ($collection->albums()->get() as $album)
                  <button onclick="window.location.href='#goToAlbumPage-{{$album->id}}'" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7] tracking-widest font-sans">{{ $album->title }}</button>
              @endforeach
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <a href="{{ route('about', ['lang' => App::currentLocale()]) }}" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]">{{ __('nav.about_me') }}</a>
    @if(App::currentLocale() == 'en')
      @if(Route::currentRouteName() == 'collection')
        <a href="{{ route(Route::currentRouteName(), ['lang' => 'fr', 'collection' => $collection]) }}" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]">{{__('nav.change_to_French')}}</a>
      @else
        <a href="{{ route(Route::currentRouteName(), ['lang' => 'fr']) }}" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]">{{__('nav.change_to_French')}}</a>
      @endif
    @else
      @if(Route::currentRouteName() == 'collection')
        <a href="{{ route(Route::currentRouteName(), ['lang' => 'en', 'collection' => $collection]) }}" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]">{{__('nav.change_to_English')}}</a>
      @else
        <a href="{{ route(Route::currentRouteName(), ['lang' => 'en']) }}" class="p-2 w-full h-full text-center no-underline text-black hover:bg-[#D7D7D7]">{{__('nav.change_to_English')}}</a>
      @endif
    @endif
</nav>