<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショートカットキー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-5 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                @foreach ($keys as $key)
                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 title-font font-medium">{{ $key->key_1 }} +
                                                    {{ $key->key_2 }} + {{ $key->key_3 }} + {{ $key->key_4 }}
                                                </h2>
                                                <p class="text-gray-500">{{ $key->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    {{-- エロクアント
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
                @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
