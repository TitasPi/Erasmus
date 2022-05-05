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
                Name
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Icon
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Short description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Actions 🧨 <a href="{{ route('dashboard.collections.add') }}" class="font-bold border-4 rounded p-1">NEW ✨</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collections as $collection)
            
              @if($collection->active)
              <tr class="border-b">
              @else
              <tr class="border-b bg-purple-100 border-purple-200">
              @endif
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $collection->id }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{ route('dashboard.albums', ['collection' => $collection->id]) }}" class="link-secondary">{{$collection->name}} @if(!$collection->active) (hidden) @endif</a>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <img src="{{ asset($collection->icon) }}" />
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$collection->short_description}}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @if($collection->active)
                <a href="{{ route('dashboard.collections.hide', ['collection' => $collection->id]) }}" class="btn-danger"><i class="fa-solid fa-eye-slash"></i></a> 
                @else
                <a href="{{ route('dashboard.collections.show', ['collection' => $collection->id]) }}" class="btn-success"><i class="fa-solid fa-eye"></i></a>
                @endif
                <a href="{{ route('dashboard.collections.edit', ['collection' => $collection->id]) }}" class="btn-warning"><i class="fa-solid fa-pencil"></i></a>
                <a href="{{ route('dashboard.collections.remove', ['collection' => $collection->id]) }}" class="btn-danger"><i class="fa-solid fa-trash-can"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>