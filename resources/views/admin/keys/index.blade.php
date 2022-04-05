<x-app-layout>
    {{-- <x-slot name="header"> --}}
    {{-- </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 pt-2 mx-auto">
                            @foreach ($detailtags as $detailtag)
                                <div class="flex mb-4 ">
                                    <h2 class="font-avenir-next font-semibold text-lg">
                                        {{ $detailtag->name }}</h2>
                                </div>
                                <x-flash-message />
                                <div class="flex flex-wrap -m-2 mb-6">
                                    @foreach ($keys as $key)
                                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full"
                                            {{ $key['detailtag_id'] == $detailtag['id'] ? '' : 'hidden' }}>
                                            <div class="h-full flex border-gray-200 border p-4 rounded-lg">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 font-avenir-next font-medium">
                                                        {{ $key->key_1 }}
                                                        @if (isset($key->key_2))
                                                            <span class="text-gray-500">+</span> {{ $key->key_2 }}
                                                        @endif
                                                        @if (isset($key->key_3))
                                                            <span class="text-gray-500">+</span> {{ $key->key_3 }}
                                                        @endif
                                                        @if (isset($key->key_4))
                                                            <span class="text-gray-500">+</span> {{ $key->key_4 }}
                                                        @endif
                                                    </h2>
                                                    <p class="pt-1 break-word">{{ $key->content }}</p>
                                                </div>
                                                <div class="flex flex-col">
                                                    <button type="button"
                                                        onclick="location.href='{{ route('admin.keys.edit', ['key' => $key->id]) }}'"
                                                        class="text-white bg-indigo-400 border-0 py-0.5 px-1 focus:outline-none hover:bg-indigo-500 rounded mb-1">編集</button>
                                                    <form id="delete_{{ $key->id }}" method="post"
                                                        action="{{ route('admin.keys.destroy', ['key' => $key->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" data-id="{{ $key->id }}"
                                                            onclick="deletePost(this)"
                                                            class="text-white bg-red-400 border-0 py-0.5 px-1 focus:outline-none hover:bg-red-500 rounded">削除</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
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
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
