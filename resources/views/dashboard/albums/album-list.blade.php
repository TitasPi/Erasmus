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
                Title
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Short description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Long description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Date
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Actions 🧨 <a href="{{ route('dashboard.albums.add', ['collection' => $collection->id]) }}" class="font-bold border-4 rounded p-1">NEW ✨</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($albums as $album)
              <tr class="border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $album->id }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{route('dashboard.albums.images', ['collection' => $collection->id, 'album' => $album->id])}}" class="link-secondary">{{$album->title}}</a>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$album->short_description}}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @if(empty($album->long_description))
                  <b class="underline font-semibold">Short description will be used</b>
                @else
                  {{$album->long_description}}
                @endif
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$album->date}}
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