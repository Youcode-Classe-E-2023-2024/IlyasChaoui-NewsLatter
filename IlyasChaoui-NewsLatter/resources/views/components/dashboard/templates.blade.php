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
            <form class="p-4 md:p-5" action="{{ route('create.template') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="titre" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Type product name" required="">
                    </div>
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
                            @foreach ($medias as $media)
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
                    @foreach($newsletters as $newsletter)
                        <div
                            class="transform transition duration-300 hover:scale-110 rounded-lg shadow-lg h-56 hover:shadow-xl bg-white"
                        >
                            <div
                                class="bg-gradient-to-br from-rose-100 via-purple-200 to-purple-200 m-2 h-3/6 rounded-lg"
                            ></div>

                            <div class="px-5 pt-2 flex flex-col">
                                <div class="flex flex-col">
                                    <h2 class="font-extrabold">{{ $newsletter->titre }}</h2>
                                </div>
                                @hasanyrole('admin|editor')
                                <form action="{{ route('send.mails', ['id' => $newsletter->id]) }}" method="post">
                                    @csrf
                                    <button
                                        class="bg-blue-500 cursor-pointer text-white px-2 py-1 mt-2 rounded-md transition duration-150 hover:bg-blue-700"
                                        type="submit"
                                    >
                                        Send
                                    </button>
                                </form>
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
