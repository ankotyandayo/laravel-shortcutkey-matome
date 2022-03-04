<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                エロクアント
                @foreach ($e_all as $e_key)
                  {{ $e_key->key_1 }}
                  {{ $e_key->key_2 }}
                  {{ $e_key->key_3 }}
                  {{ $e_key->key_4 }}
                  {{ $e_key->note }}
                  {{ $e_key->content }}
                  {{ $e_key->created_at->diffForHumans() }}
                @endforeach
                <br>
                クエリビルダ
                @foreach ($q_get as $q_key)
                  {{ $q_key->key_1 }}
                  {{ $q_key->key_2 }}
                  {{ $q_key->key_3 }}
                  {{ $q_key->key_4 }}
                  {{ $q_key->note }}
                  {{ $q_key->content }}
                  {{ Carbon\Carbon::parse($q_key->created_at)->diffForHumans() }}
                @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
