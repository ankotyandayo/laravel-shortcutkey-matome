<x-app-layout>
    {{-- <x-slot name="header"> --}}
    {{-- </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 pt-2 mx-auto">
                            <x-flash-message />
                            @foreach ($detailtags as $detailtag)
                                <h2 class="font-avenir-next font-semibold text-lg relative border-l-6 color-border mb-4">
                                    {{ $detailtag->name }}</h2>
                                <div class="flex flex-wrap -m-2 mb-6">
                                    @foreach ($keys as $key)
                                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full"
                                            {{ $key['detailtag_id'] == $detailtag['id'] ? '' : 'hidden' }}>
                                            <div class="h-full flex border-gray-200 border rounded-lg">
                                                <div class="flex-grow p-4">
                                                    <h2 class="font-avenir-next font-medium inline-block text-gray-700">
                                                        <span class="key rounded-lg">
                                                            {{ $key->key_1 }}
                                                        </span>
                                                        @if (isset($key->key_2))
                                                            <span class="text-gray-500 ml-1">+</span>
                                                            <span class="key rounded-lg ">
                                                                {{ $key->key_2 }}
                                                            </span>
                                                        @endif
                                                        @if (isset($key->key_3))
                                                            <span class="text-gray-500 ml-1">+</span>
                                                            <span class="key rounded-lg ">
                                                                {{ $key->key_3 }}
                                                            </span>
                                                        @endif
                                                        @if (isset($key->key_4))
                                                            <span class="text-gray-500 ml-1">+</span>
                                                            <span class="key rounded-lg ">
                                                                {{ $key->key_4 }}
                                                            </span>
                                                        @endif
                                                    </h2>
                                                    <p class="mt-4 break-word">{{ $key->content }}</p>
                                                </div>
                                                <div class="flex flex-col">
                                                    <button type="button"
                                                        onclick="location.href='{{ route('admin.keys.edit', ['key' => $key->id]) }}'"
                                                        class="text-white bg-indigo-400 border-0 py-0.5 px-1 focus:outline-none hover:bg-indigo-500 rounded mb-1">??????</button>
                                                    <form id="delete_{{ $key->id }}" method="post"
                                                        action="{{ route('admin.keys.destroy', ['key' => $key->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" data-id="{{ $key->id }}"
                                                            onclick="deletePost(this)"
                                                            class="text-white bg-red-400 border-0 py-0.5 px-1 focus:outline-none hover:bg-red-500 rounded">??????</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </section>
                    {{-- ??????????????????
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
                ??????????????????
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
            if (confirm('????????????????????????????????????????')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
