<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Documentation') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600 text-center">Table of contents</h4>
        <div class="flex justify-center">
          <div class="bg-gray-100 rounded-lg border border-gray-200 w-96 text-gray-900">
            <a href="#article-updating-system" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-0 focus:bg-gray-200 focus:text-gray-600 transition duration-500 cursor-pointer">
              How to update the system ⭐
            </a>
            <a href="#!" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-0 focus:bg-gray-200 focus:text-gray-600 transition duration-500 cursor-pointer">
              How to create albums 📚
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600">How to update the system ⭐</h4>
        <p class="text-xl font-light leading-relaxed mt-6 mb-4 text-gray-800">
          Update process happens <strong>automagically</strong> every midnight. You can check if you have latest version in <a class="bg-blue-200" href="{{ route('dashboard.settings.generic') }}">generic settings</a> page.
        </p>
      </div>
    </div>
  </div>
</x-app-layout>
