<x-app-layout>
    {{-- <x-slot name="header">
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-5 mx-auto">
                            <x-flash-message status="info" />
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">キー登録
                                </h1>
                            </div>
                            <div class="mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="post" action="{{ route('admin.keys.store') }}">
                                    @csrf
                                    <div class="flex">
                                        {{-- ===== ここからキー入力エリア開始====== --}}
                                        <div class="flex flex-wrap -m-2 w-1/2">
                                            <div class="p-2 w-1/4">
                                                <div class="relative">
                                                    <label for="new_tag"
                                                        class="leading-7 text-sm text-gray-600">Key_1</label>
                                                    <input type="text" id="key_1" name="key_1"
                                                        value="{{ old('key_1') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/4">
                                                <div class="relative">
                                                    <label for="key_2"
                                                        class="leading-7 text-sm text-gray-600">Key_2</label>
                                                    <input type="text" id="key_2" name="key_2"
                                                        value="{{ old('key_2') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/4">
                                                <div class="relative">
                                                    <label for="key_3"
                                                        class="leading-7 text-sm text-gray-600">Key_3</label>
                                                    <input type="text" id="key_3" name="key_3"
                                                        value="{{ old('key_3') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/4">
                                                <div class="relative">
                                                    <label for="key_4"
                                                        class="leading-7 text-sm text-gray-600">Key_4</label>
                                                    <input type="text" id="key_4" name="key_4"
                                                        value="{{ old('key_4') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="note"
                                                        class="leading-7 text-sm text-gray-600">Note</label>
                                                    <textarea id="note" name="note" value="{{ old('note') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="content"
                                                        class="leading-7 text-sm text-gray-600">Content</label>
                                                    <textarea id="content" name="content" value="{{ old('content') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ===== ここでキー入力エリア終了====== --}}
                                        <div class="p-4">

                                        </div>
                                        {{-- ===== ここからタグ入力エリア開始====== --}}
                                        <div class="flex flex-wrap -m-2 w-1/2">
                                            <div class="p-2 w-3/5">
                                                <div class="relative">
                                                    <label for="new_tag"
                                                        class="leading-7 text-sm text-gray-600">NewTag</label>
                                                    <input type="text" id="new_tag" name="new_tag"
                                                        value="{{ old('new_tag') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-2/5">
                                                <div class="relative">
                                                    <label for="existing_tag"
                                                        class="leading-7 text-sm text-gray-600">Existing_Tag
                                                        <select class="form-select w-full" id="existing_tag"
                                                            name="existing_tag">
                                                            <option class="font-semibold text-indigo-700">
                                                            </option>
                                                            @foreach ($tags as $tag)
                                                                <option class=""
                                                                    value="{{ $tag->id }}">
                                                                    {{ $tag->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="p-2 w-3/5">
                                                <div class="relative">
                                                    <label for="new_detail_tag"
                                                        class="leading-7 text-sm text-gray-600">New_Detail_Tag</label>
                                                    <input type="text" id="new_detail_tag" name="new_detail_tag"
                                                        value="{{ old('new_detail_tag') }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-2/5">
                                                <div class="relative">
                                                    <label for="existing_detail_tag"
                                                        class="leading-7 text-sm text-gray-600">Existing_Detail_Tag
                                                        <select class="form-select w-full" id="existing_detail_tag"
                                                            name="existing_detail_tag">
                                                            <option class="font-semibold text-indigo-700">
                                                            </option>
                                                            @foreach ($detailtags as $detailtag)
                                                                <option class=""
                                                                    value="{{ $detailtag->id }}">
                                                                    {{ $detailtag->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- ===== ここでタグ入力エリア終了====== --}}
                                        </div>
                                    </div>
                                    <div class="p-2 w-full flex justify-around mt-4">
                                        <button onclick="location.href='{{ route('admin.keys.index') }}'"
                                            type="button"
                                            class=" bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                        <button type="submit"
                                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
