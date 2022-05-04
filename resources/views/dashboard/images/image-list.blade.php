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
                Actions 🧨 <a href="{{ route('dashboard.collections.add') }}" class="font-bold border-4 rounded p-1">NEW ✨</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($images as $image)
              <tr class="border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $album->id }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{asset($image->src)}}" class="link-secondary" onmousemove="img_preview('{{$image->src}}')" onmouseover="img_preview('{{$image->src}}')" onmouseout="img_preview()">{{$image->src}}</a>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{($image->is_on_welcome_page) ? 'True' : 'False'}}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{ route('dashboard.albums.edit', ['collection' => $collection->id, 'album' => $album->id]) }}" class="btn-warning"><i class="fa-solid fa-pencil"></i></a>
                <a href="{{ route('dashboard.albums.remove', ['collection' => $collection->id, 'album' => $album->id]) }}" class="btn-danger"><i class="fa-solid fa-trash-can"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>