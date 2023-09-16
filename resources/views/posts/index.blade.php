<x-layouts.app>
    <div class="overflow-x-auto w-full h-screen">
        <table class="w-11/12 mt-2 mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:bg-[#5A5A5A] dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="{{ asset($post->images->first()->path) }}" alt="{{ $post->images->first()->alt }}" class="w-20 h-20 rounded-full">
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="fixed bg-center bg-origin-border bg-cover inset-x-0 mx-auto w-[1440px] h-[1024px] blur-sm z-10" style="background-image: url({{ Vite::asset('resources/img/sea.jpg') }})">
        <span class="fixed w-[1440px] h-[1024px] inset-x-0 mx-auto backdrop-blur-lg backdrop bg-black/50"></span>
    </div>

    <div class="fixed inset-x-0 mx-auto inset-y-0 my-auto w-[1248px] h-[720px] z-20 bg-white/20">
        <div class="grid grid-cols-3 gap-y-12 px-[40px] py-[60px] w-full h-full overflow-y-auto place-items-center scrollbar-thin scrollbar-thumb-white scrollbar-track-black/20 scrollbar-thumb-rounded-3xl">
            @foreach($post->images as $image)
                <div class="w-[336px] h-[300px] border">

                </div>
            @endforeach
        </div>
    </div>

</x-layouts.app>
