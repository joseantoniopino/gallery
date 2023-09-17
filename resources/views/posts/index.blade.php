<x-layouts.app>
    <div class="overflow-x-auto w-full h-screen">
        <table class="text-sm text-left text-gray-400 w-11/12 mt-2 mx-auto">
            <thead class="text-xs text-gray-400 uppercase bg-custom-600">
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
                <tr class="border-b bg-gray-800 border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
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


    <div class="fixed flex flex-row justify-between inset-x-0 mx-auto w-[1248px] top-20 h-12 z-20">
        <p class="text-white text-xl leading-[23.48px] font-medium">Image Gallery for Car [car name]</p>
        <div class="flex group cursor-pointer">
            <span class="mr-2 w-[25px] h-[25px] bg-[#3F54D1] rounded-full flex justify-between inset-x-0 group-hover:bg-indigo-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-4 h-4 mx-auto my-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <p class="font-medium text-white group-hover:text-indigo-800 text-xs mt-1 mr-1">
                Back To Cars List
            </p>
        </div>
    </div>

    <div class="fixed inset-x-0 mx-auto w-[1440px] h-[1024px] bg-center bg-origin-border bg-cover blur-sm z-10" style="background-image: url({{ Vite::asset('resources/img/sea.jpg') }})">
        <span class="fixed w-[1440px] h-[1024px] inset-x-0 mx-auto backdrop-blur-lg backdrop bg-black/50"></span>
    </div>

    <div class="fixed inset-x-0 mx-auto inset-y-0 my-auto w-[1248px] h-[720px] z-20 rounded-lg bg-white/20">
        <div class="grid grid-cols-3 gap-y-12 px-[40px] py-[60px] w-full h-full overflow-y-auto place-items-center scrollbar-thin scrollbar-thumb-white scrollbar-track-black/20 scrollbar-thumb-rounded-3xl">
            @foreach($post->images as $image)
                <div class="relative w-[336px] h-[300px] rounded-lg">

                    <div class="absolute flex justify-center items-stretch top-[19px] right-[19.82px] w-[41.63px] h-[43px] rounded-full bg-black/[0.15] z-40 cursor-pointer hover:bg-indigo-800" style="box-shadow: 0px 4px 4px 0px #00000026;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-[19.82px] h-[18px] m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>


                    <img class="absolute top-0 left-0 w-full h-full rounded-lg z-30" src="{{ asset($image->path) }}" alt="{{ $image->alt }}">

                    <div class="absolute flex flex-row gap-x-[12.88px] justify-center items-stretch bottom-0 left-0 h-[68px] w-full bg-custom-600/50 rounded-b-lg z-40">
                        <button class="w-[122.9px] h-[30px] rounded-[15px] self-center tracking-[0.03em] font-medium leading-[14px] text-[12px] text-black bg-white hover:bg-indigo-400 hover:text-white">Manage</button>
                        <button class="w-[122.9px] h-[30px] rounded-[15px] self-center tracking-[0.03em] font-medium leading-[14px] text-[12px] text-white bg-[#FF7777] hover:bg-[#ddaeae] hover:text-black">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="fixed flex flex-row gap-x-4 inset-x-0 mx-auto w-[1248px] bottom-10 h-12 z-20">

            <input class="block file:hidden cursor-pointer w-[312px] h-10 rounded-lg bg-white/20 p-1 text-white text-base leading-[19px] tracking-[0.03em] focus:outline-none" placeholder="select image" type="file" name="image">

            <button class="w-44 h-[43px] rounded-[25px] self-center text-white font-medium leading-[19px] text-[16px] tracking-[0.03em] bg-[#3F54D1] mb-3 hover:bg-[#2e3a8a] hover:shadow-xl]"
                    style="box-shadow: 0px 4px 4px 0px #0000001A;">UPLOAD
            </button>

            <span class="text-[#FF9F9F] text-xs tracking-[0.03em] font-medium leading-[14px] mt-2">In case of Error. Message Here</span>
        </div>
    </div>

</x-layouts.app>
