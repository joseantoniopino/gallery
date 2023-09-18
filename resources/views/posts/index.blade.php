<x-layouts.app>
    <div class="overflow-y-auto w-full h-screen">
        <table class="text-sm text-left text-gray-400 w-11/12 mt-2 mx-auto">
            <thead class="text-xs text-gray-400 uppercase bg-custom-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="border-b bg-gray-800 border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        <img src="{{ asset($post->images->first()?->path) }}" alt="{{ $post->images->first()?->alt }}"
                             class="w-20 h-20 rounded-full">
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                        <button
                            x-data={}
                            @click="$dispatch('showGallery', { nameSpace: {{ json_encode(get_class($post)) }}, modelId: {{ $post->id }} })"
                            class="text-center w-[122.9px] h-[30px] rounded-[15px] self-center tracking-[0.03em] font-medium leading-[14px] text-[12px] text-indigo-900 bg-indigo-300 hover:bg-indigo-900 hover:text-indigo-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <livewire:gallery/>
    </div>


</x-layouts.app>
