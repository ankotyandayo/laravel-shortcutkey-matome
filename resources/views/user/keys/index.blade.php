<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 pt-2 mx-auto">
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
