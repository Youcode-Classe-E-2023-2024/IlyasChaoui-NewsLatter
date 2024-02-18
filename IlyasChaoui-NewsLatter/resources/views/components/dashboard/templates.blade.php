@section('title')
    Templates
@endsection

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/d1rmsxmgs14cda7yeqg3yopl4nb1e818oemn10qd7dlgalp6/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            {value: 'First.Name', title: 'First Name'},
            {value: 'Email', title: 'Email'},
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script>

@hasanyrole('admin|editor')
<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="absolute right-4 top-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
    Create Template
</button>
@endhasanyrole
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('create.template') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="titre" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Type product name" required="">
                    </div>
                    <div class="flex flex-col">
                        <label for="media" class="mb-3 block text-base font-medium ">
                            Media
                        </label>
                        <div class="rounded-md border border-[#e0e0e0] p-1 outline-none flex">
                            <input type="text" id="selectedMedia" name="images" placeholder="Media"
                                   class="rounded w-full pb-2 py-2 px-3 placeholder-gray-500 outline-none"
                                   style="width: 35rem;">
                            <div
                                class="absolute max-h-40 mt-12 z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg  hidden"
                                id="dropdownContent">
                                @foreach ($data['medias'] as $media)
                                    @foreach ($media->getMedia() as $mediaItem)
                                        <div class="title bg-gray-100 border p-2 border-gray-300 w-full outline-none">
                                            <label>
                                                @if ($mediaItem->type == 'image')
                                                    <img src="{{ $mediaItem->getUrl() }}" alt='{{ $mediaItem->name }}'
                                                         class="h-20 w-full object-cover object-center inline-block mr-2"
                                                         onclick="selectMedia('{{ $mediaItem->getUrl() }}')">
                                                @elseif($mediaItem->type == 'video')
                                                    <video controls class="h-24 w-full"
                                                           onclick="selectMedia('{{ $mediaItem->getUrl() }}')">
                                                        <source src="{{ $mediaItem->getUrl() }}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="m-2">
                                <button type="button" onclick="toggleDropdown()">^_^</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                            Description</label>
                        <textarea id="description" name="contenu" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div>

<div class="relative md:scale-70 min-h-85-screen">
    <div class="container">
        <div class="flex -my-12">
            <div class="max-w-full px-3 md:w-11/12 lg:ml-12 lg:w-8/12">
                <!-- Start the flex container for cards here -->
                <div class="grid grid-cols-4 gap-4 mt-6 mx-3">
                    @foreach($data['newsletters'] as $newsletter)
                        <div
                            class="transform transition duration-300 hover:scale-110 rounded-lg shadow-lg h-56 hover:shadow-xl bg-white">
                            <div
                                class="bg-gradient-to-br from-rose-100 via-purple-200 to-purple-200 m-2 h-3/6 rounded-lg">
                                <div x-data="{ isOpen: false }" class="relative inline-block ">
                                    <!-- Dropdown toggle button -->
                                    <button @click="isOpen = !isOpen"
                                            class="relative right-0 z-10 block p-2 text-gray-700 bg-white border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none"
                                            style="    left: 118px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div x-show="isOpen"
                                         @click.away="isOpen = false"
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="opacity-0 scale-90"
                                         x-transition:enter-end="opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100 scale-100"
                                         x-transition:leave-end="opacity-0 scale-90"
                                         class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800"
                                         style="    right: -120px;
"
                                    >
                                        <form action="{{ route('send.mails', ['id' => $newsletter->id]) }}" method="post" class="hover:bg-gray-200">
                                            @csrf
                                            <button class="bg-transparent  flex flex-row cursor-pointer font-medium text-black px-2 py-1 mt-2 rounded-md transition duration-150" type="submit">
                                                <svg class="w-5 h-5 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18a2 2 0 012 2v10a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2zm3.828 4.828a3 3 0 104.243 4.243L12 13l.929-.929a3 3 0 00-4.242-4.243z"></path></svg>
                                                Send
                                            </button>
                                        </form>
                                        <form action="{{ route('delete.mails', ['id' => $newsletter->id]) }}" method="post" class="hover:bg-gray-200">
                                            @csrf
                                            <button class="bg-transparent cursor-pointer flex flex-row font-medium text-red-500 px-2 py-1 mt-2 rounded-md transition duration-150" type="submit">
                                                <svg class="w-5 h-5 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 pt-2 flex flex-col">
                                <div class="flex flex-col">
                                    <h2 class="font-extrabold">{{ $newsletter->titre }}</h2>
                                </div>
                                @hasanyrole('admin|editor')

                                @endhasanyrole
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- End the flex container for cards -->
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
    }

    function selectMedia(url) {
        var selectedMediaInput = document.getElementById("selectedMedia");
        selectedMediaInput.value = url;
        toggleDropdown();
    }

</script>
