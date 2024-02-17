@section('title')
    Medias
@endsection
<div class="absolute right-4">
    <!-- Modal toggle -->
    <button data-modal-target="select-modal" data-modal-toggle="select-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
        Add media
    </button>

    <!-- Main modal -->
    <div id="select-modal" tabindex="-1" aria-hidden="true"
         class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 max-w-md ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="width: 550px;  ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">
                        Upload Media
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="select-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <!-- component -->
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
                <div class="relative flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center" style="height: 600px">
                    <div class="absolute bg-white inset-0 z-0"></div>
                    <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
                        <div class="text-center">
                            <h2 class="mt-5 text-3xl font-bold text-gray-900">
                                File Upload!
                            </h2>
                            <p class="mt-2 text-sm text-gray-400">Lorem ipsum is placeholder text.</p>
                        </div>
                        <form class="mt-8 space-y-3" action="{{ route('media.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 space-y-2">
                                <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                            <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>-->
                                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                                <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                            </div>
                                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <a href="" id="" class="text-blue-600 hover:underline">select a file</a> from your computer</p>
                                        </div>
                                        <input type="file" class="hidden" name="image">
                                    </label>
                                </div>
                            </div>
                            <p class="text-sm text-gray-300">
                                <span>File type: doc,pdf,types of images</span>
                            </p>
                            <div>
                                <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <style>
                    .has-mask {
                        position: absolute;
                        clip: rect(10px, 150px, 130px, 10px);
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<div class="rounded-full py-1 ml-6 px-4 font-medium text-xl border bg-white dark:text-white dark:bg-gray-700 border-gray-300" style="width: fit-content">
    All Images
</div>

<div class="w-full overflow-y-auto px-6 py-6 mx-auto">
    <!-- content -->
    <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
        <div class="flex gap-[30px] -mx-3">
            @foreach ($medias as $media)
                @foreach ($media->getMedia() as $mediaItem)
                    @if ($mediaItem->type == 'image')
                        <div
                            class="w-75 h-80 bg-white dark:bg-blue-dark border border-gray-300 rounded-3xl text-black p-4 flex flex-col items-start justify-center gap-3 hover:shadow-2xl hover:shadow-sky-400 transition-shadow">
                            <div class="w-60 h-40 rounded-2xl">
                                <img src="{{ $mediaItem->getUrl() }}" alt="{{ $mediaItem->name }}"
                                     class="rounded-[10px] h-full w-full" alt="hello">
                            </div>
                            <div class="">
                                <p class="font-extrabold">{{ Str::limit($mediaItem->name, 20) }}</p>
                                <p class="">{{ number_format($mediaItem->size / 1024 / 1024, 2) }} MB</p>
                                <p class="">{{ $mediaItem->created_at->toFormattedDateString() }}</p>
                            </div>
                            <button
                                class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">{{ $mediaItem->type }}
                            </button>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<div class="rounded-full py-1 ml-6 px-4 font-medium text-xl border bg-white border-gray-300" style="width: fit-content">
    All Videos
</div>
<div class="w-full overflow-y-auto px-6 py-6 mx-auto">
    <!-- content -->
    <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">d
        <div class="flex gap-[30px] -mx-3">
            @foreach ($medias as $media)
                @foreach ($media->getMedia() as $mediaItem)
                    @if ($mediaItem->type == 'video')

                        <div
                            class="w-75 h-100 bg-white border border-gray-300 rounded-3xl text-black p-4 flex flex-col items-start justify-center gap-3 hover:shadow-2xl hover:shadow-sky-400 transition-shadow">
                            <div class="w-60 h-full rounded-2xl">
                                <video src="{{ $mediaItem->getUrl() }}" alt="{{ $mediaItem->name }}"
                                       class="rounded-[10px] h-full w-full" controls></video>
                            </div>
                            <div>
                                <p class="font-extrabold">{{ Str::limit($mediaItem->name, 20) }}</p>
                                <p>{{ number_format($mediaItem->size / 1024 / 1024, 2) }} MB</p>
                                <p>{{ $mediaItem->created_at->toFormattedDateString() }}</p>
                            </div>
                            <button
                                class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">{{ $mediaItem->type }}</button>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<div class="rounded-full py-1 ml-6 px-4 font-medium text-xl border bg-white border-gray-300" style="width: fit-content">
    All Documents
</div>
<div class="w-full overflow-y-auto px-6 py-6 mx-auto">
    <!-- content -->
    <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
        <div class="flex gap-[30px] -mx-3">
            @foreach ($medias as $media)
                @foreach ($media->getMedia() as $mediaItem)
                    @if ($mediaItem->type == 'pdf')
                        <div class="card">
                            <img src="/assets/img/pdf.png" class="img" alt="">
                            <div class="textBox">
                                <p class="text head">{{ Str::limit($mediaItem->name, 20) }}</p>
                                <span>{{ number_format($mediaItem->size / 1024 / 1024, 2) }} MB</span>
                                <p class="text price">{{ $mediaItem->created_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
