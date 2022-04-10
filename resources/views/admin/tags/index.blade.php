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
                            <div class="flex flex-wrap -m-2 mb-6">
                                @foreach ($tags as $tag)
                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                        <div class="h-full flex border-gray-200 border p-4 rounded-lg">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 font-avenir-next font-medium">
                                                    {{ $tag->name }}
                                                </h2>
                                            </div>
                                            <div class="flex flex-col">
                                                <button type="button"
                                                    onclick="location.href='{{ route('admin.tags.edit', ['tag' => $tag->id]) }}'"
                                                    class="text-white bg-indigo-400 border-0 py-0.5 px-1 focus:outline-none hover:bg-indigo-500 rounded mb-1">編集</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
