<x-app-layout>
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
                                        <div class="h-full flex border-gray-200 border p-6 rounded-xlg">
                                            <figure class="flex">
                                                @if (empty($tag->filename))
                                                    <img class="md:rounded-none rounded-xlg rounded-full mx-auto"
                                                        src="{{ asset('images/no_image_icon.png') }}" alt=""
                                                        width="140" height="140">
                                                @else
                                                    <img class="md:rounded-none rounded-full mx-auto"
                                                        src="{{ asset('storage/tags/' . $tag->filename) }}" alt=""
                                                        width="140" height="140">
                                                @endif
                                                <div class="flex flex-col my-auto ml-6 lg:ml-6">
                                                    <h2 class="text-gray-900 font-avenir-next font-medium text-lg">
                                                        {{ $tag->name }}
                                                    </h2>
                                                    <div>
                                                        <a href="{{ route('admin.keys.index', ['tag' => $tag->id]) }}"
                                                            class="mt-6 itiranhe rounded-lg inline-block">
                                                            <span value="{{ $tag->id }}">
                                                                一覧へ
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </figure>
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
