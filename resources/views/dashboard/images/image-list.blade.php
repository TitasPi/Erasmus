<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                # (debug)
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Internal link
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Is on welcome page
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Actions 🧨 <a href="{{ route('dashboard.images.upload', ['collection' => $collection->id, 'album' => $album->id]) }}" class="font-bold border-4 rounded p-1">NEW ✨</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($images as $image)
            <tr class="border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $image->id }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a data-bs-toggle="modal" data-bs-target="#imagesModal" onclick="modalChangeImg('{{asset('images/'.$image->src)}}')" class="link-secondary" onmousemove="img_preview('{{$image->src}}')" onmouseover="img_preview('{{$image->src}}')" onmouseout="img_preview()">{{$image->src}}</a>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!! ($image->is_on_welcome_page) ? '<i class="fa-solid fa-circle-check text-green-500"> True</i>' : '<i class="fa-solid fa-circle-xmark text-red-500"> False</i>' !!}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @if($image->is_on_welcome_page)
                <a href="{{ route('dashboard.image.removeFromWelcomePage', ['collection' => $collection->id, 'album' => $album->id, 'image' => $image->id]) }}" class="btn-warning"><i class="fa-solid fa-circle-xmark"></i></a>
                @else
                <a href="{{ route('dashboard.image.addToWelcomePage', ['collection' => $collection->id, 'album' => $album->id, 'image' => $image->id]) }}" class="btn-success"><i class="fa-solid fa-circle-check"></i></a>
                @endif
                <a href="{{ route('dashboard.images.remove', ['collection' => $collection->id, 'album' => $album->id, 'image' => $image->id]) }}" class="btn-danger"><i class="fa-solid fa-trash-can"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
