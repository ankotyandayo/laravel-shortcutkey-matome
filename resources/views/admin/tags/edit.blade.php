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
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">キー編集
                                </h1>
                            </div>
                            <div class="mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="post" action="{{ route('admin.tags.update', ['tag' => $edittag->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="-m-2">
                                        {{-- ===== ここからキー入力エリア開始====== --}}
                                        <div class="p-2 justify-center">
                                            <label for="name" class="leading-7 text-sm text-gray-600">TagName</label>
                                            <input type="text" id="name" name="name" value="{{ $edittag->name }}"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                        <div class="p-2 justify-center">
                                            <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                            <input type="file" id="image" name="image"
                                                accept="image/png,image/jpeg,image/jpg"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                        {{-- <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="note"
                                                            class="leading-7 text-sm text-gray-600">Note</label>
                                                        <textarea id="note" name="note"
                                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $edittag->note }}</textarea>
                                                    </div>
                                                </div> --}}
                                    </div>
                                    {{-- ===== ここでキー入力エリア終了====== --}}
                            </div>
                            <div class="p-2 w-full flex justify-around mt-4">
                                <button onclick="location.href='{{ route('admin.tags.index') }}'" type="button"
                                    class=" bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit"
                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                            </div>
                        </div>
                        </form>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
