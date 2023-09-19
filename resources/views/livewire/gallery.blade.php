<div>

    @if($success)
        <div wire:click="hideSuccess()" class="absolute top-0 right-0 w-full z-50 bg-green-700 p-3 shadow-black text-white text-center cursor-pointer">
            {{ $successMessage }}
        </div>
    @endif

    @if($show === true)
        <div wire:click="close()"
             class="absolute top-0 left-0 w-full h-full overflow-y-hidden bg-custom-950/80 backdrop-blur-md"></div>

        <div class="fixed flex flex-row justify-between inset-x-0 mx-auto w-[1248px] top-20 h-12 z-20">
            <p class="text-white text-xl leading-[23.48px] font-medium">Image Gallery
                for {{ $galleryModel->getImageableName() }} <strong>{{ $galleryModel->getName() }}</strong></p>
            <div wire:click="close()" class="flex group cursor-pointer">
            <span
                class="mr-2 w-[25px] h-[25px] bg-[#3F54D1] rounded-full flex justify-between inset-x-0 group-hover:bg-indigo-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="white" class="w-4 h-4 mx-auto my-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                </svg>
            </span>
                <p class="font-medium text-white group-hover:text-indigo-800 text-xs mt-1 mr-1">
                    Back To {{ $galleryModel->getImageableName() }} List
                </p>
            </div>
        </div>

        <div wire:click="close()"
             class="fixed top-0 inset-x-0 mx-auto w-[1440px] h-[1024px] bg-center bg-origin-border bg-cover blur-sm"
             style="background-image: url({{ asset('img/sea.jpg') }})">
            <span class="fixed w-[1440px] h-[1024px] inset-x-0 mx-auto backdrop-blur-lg backdrop bg-black/50"></span>
        </div>

        <div class="fixed inset-x-0 mx-auto inset-y-0 my-auto w-[1248px] h-[720px] z-20 rounded-lg bg-white/20">
            <div
                class="grid grid-cols-3 gap-y-12 px-[40px] py-[60px] w-full h-full overflow-y-auto place-items-center scrollbar-thin scrollbar-thumb-white scrollbar-track-black/20 scrollbar-thumb-rounded-3xl">
                @foreach($galleryModel->images as $img)
                    <div wire:key="{{ $img->id }}" class="relative w-[336px] h-[300px] rounded-lg">
                        <div
                            wire:click="toggleFavorite({{ $img }})"
                            class="absolute flex justify-center items-stretch top-[19px] right-[19.82px] w-[41.63px] h-[43px] rounded-full z-40 cursor-pointer @if($img->is_favorite) bg-[#3F54D1] hover:brightness-200 @else bg-black/[0.15] hover:backdrop-brightness-200 @endif"
                            style="box-shadow: 0px 4px 4px 0px #00000026;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="white" class="w-[19.82px] h-[18px] m-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                            </svg>
                        </div>


                        <img class="absolute top-0 left-0 w-full h-full rounded-lg z-30" src="{{ asset($img->path) }}"
                             alt="{{ $img->alt }}">

                        <div
                            class="absolute flex flex-row gap-x-[12.88px] justify-center items-stretch bottom-0 left-0 h-[68px] w-full bg-custom-600/50 rounded-b-lg z-40">
                            <button
                                wire:click="toggleManagerModal({{ $img }})"
                                class="w-[122.9px] h-[30px] rounded-[15px] self-center tracking-[0.03em] font-medium leading-[14px] text-[12px] text-black bg-white hover:bg-indigo-400 hover:text-white">
                                Manage
                            </button>
                            <button
                                wire:click="deleteImage({{ $img }})"
                                class="w-[122.9px] h-[30px] rounded-[15px] self-center tracking-[0.03em] font-medium leading-[14px] text-[12px] text-white bg-[#FF7777] hover:bg-[#ddaeae] hover:text-black">
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class=>

                <form wire:submit="storeImage()" class="fixed flex flex-row gap-x-4 inset-x-0 mx-auto w-[1248px] bottom-10 h-12 z-20">
                <input
                    wire:model="imageToUpload"
                    class="block file:hidden cursor-pointer w-[312px] h-10 rounded-lg bg-white/20 p-1 text-white text-base leading-[19px] tracking-[0.03em] focus:outline-none"
                    placeholder="select image" type="file" name="imageToUpload" accept="image/*">
                <button
                    type="submit"
                    class="w-44 h-[43px] rounded-[25px] self-center text-white font-medium leading-[19px] text-[16px] tracking-[0.03em] bg-[#3F54D1] mb-3 hover:bg-[#2e3a8a] hover:shadow-xl"
                    style="box-shadow: 0px 4px 4px 0px #0000001A;">UPLOAD
                </button>
                <span class="text-[#FF9F9F] text-xs tracking-[0.03em] font-medium leading-[14px] mt-2">@error('imageToUpload') {{ $message }} @enderror</span>
            </form>
        </div>


        {{--MANAGE MODAL--}}
        @if ($showManagerModal)
            {{-- @if (true)
            @php
                $image = $galleryModel->images->first();
            @endphp --}}
            <div wire:click="toggleManagerModal()"
                 class="fixed backdrop-blur-sm inset-x-0 mx-auto inset-y-0 my-auto w-[1447px] h-[1024px] top-0 bg-black/80 z-40"></div>

            <form wire:submit="saveManagerModal()"
                class="w-[560px] h-[385px] inset-x-0 inset-y-0 bg-white/20 backdrop-brightness-50 backdrop-blur-md fixed m-auto z-40 rounded-[3px] text-white">
                <button wire:click="toggleManagerModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="grid grid-cols-2 grid-rows-4 pl-[66px] pt-[63px]">
                    <h3 class="col-span-2 text-xl font-medium leading-[23px] tracking-[0.03em] text-left">
                        Image {{ $image->id }}</h3>
                    <div class="col-span-2 text-base font-medium leading-[19px] tracking-[0.03em]">
                        <label for="name" class="absolute mt-3 text-left">Name</label>

                        <div class="flex float-right mr-24">
                            <input wire:model.blur="imageName" id="name" type="text"
                                    class="pl-3 w-[250px] h-10 rounded-s-lg bg-white/20 outline-none" autocomplete="off" />

                            <input wire:model.blur="imageExtension" id="extension" type="text"
                                    class="ml-0 pl-3 w-[62px] h-10 rounded-e-lg border-l-2 border-l-stone-500 bg-white/20" disabled />
                        </div>

                    </div>

                    <div class="col-span-2 text-base font-medium leading-[19px] tracking-[0.03em]">
                        <label for="alt" class="absolute mt-3 text-left">Alt</label>
                        <input wire:model="imageAlt" id="alt" type="text"
                               class="float-right mr-24 pl-3 w-[312px] h-10 rounded-lg bg-white/20 outline-none" autocomplete="off">
                    </div>

                    <div class="col-span-2 grid grid-cols-2 mb-8">
                        <button
                            type="submit"
                            class="text-base font-medium leading-[19px] tracking-[0.03em] text-center w-44 h-[43px] rounded-[25px] bg-[#3F54D1] hover:bg-[#2e3a8a] hover:shadow-xl"
                            style=""
                        >
                            SAVE
                        </button>
                        <p class="absolute w-52 text-xs right-20 font-medium leading-[14px] tracking-[0.03em] text-[#FF9F9F] mt-4">
                            @error('imageAlt') {{ $message }} @enderror @error('imageName') {{ $message }} @enderror</p>
                    </div>

                </div>

            </form>
        @endif
    @endif

</div>
