@section('title')
    Templates
@endsection


<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="absolute right-4 top-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Create Template
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div>

<div class="relative md:scale-70 min-h-85-screen">
    <div class="container">
        <div class="flex flex-wrap -my-12">
            <div class="max-w-full px-3 md:w-11/12 md:flex-none lg:ml-12 lg:w-8/12">
                <div class="flex flex-wrap mt-6 -mx-3">
                    <div class="w-full max-w-full px-3 mt-6 mb-6 md:mb-0 md:mt-0 md:w-4/12 md:flex-none">
                        <div
                            class="relative flex flex-col items-start min-w-0 break-words transition-all duration-200 ease-out bg-white border-0 border-transparent shadow-xl dark:bg-slate-850 dark:shadow-dark-xl after:bg-gradient-to-tl after:from-blue-500 after:to-violet-500 after:opacity-85 transform3d hover:transform3d-hover rounded-2xl bg-clip-border after:absolute after:top-0 after:bottom-0 after:left-0 after:z-10 after:block after:h-full after:w-full after:rounded-2xl">
                            <div class="cursor-pointer">
                                <div class="absolute w-full h-full mb-8 bg-center bg-cover rounded-2xl">
                                    <img class="rounded-2xl" src="https://images.unsplash.com/photo-1518609878373-06d740f60d8b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2370&q=80"> alt="">
                                </div>
                                <div class="relative z-20 flex-auto p-6 text-white">
                                    <h5 class="mb-0 text-white">Some Kind Of Blues</h5>
                                    <p class="leading-normal text-white text-sm">Deftones</p>
                                    <div class="flex mt-12">
                                        <button
                                            class="inline-block p-2 mb-0 font-bold tracking-tight text-center text-white uppercase align-middle transition-all ease-in border border-solid rounded-full shadow-none leading-pro text-xs border-white/75 bg-white/10"
                                            type="button" data-target="tooltip_trigger" data-placement="top">
                                            <i class="p-2 fas fa-backward"></i>
                                        </button>
                                        <div data-target="tooltip"
                                             class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                                            Prev
                                            <div
                                                class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                                data-popper-arrow></div>
                                        </div>
                                        <button
                                            class="inline-block p-2 mx-2 mb-0 font-bold tracking-tight text-center text-white uppercase align-middle transition-all ease-in border border-solid rounded-full shadow-none leading-pro text-xs border-white/75 bg-white/10"
                                            type="button" data-target="tooltip_trigger" data-placement="top">
                                            <i class="p-2 fas fa-play"></i>
                                        </button>
                                        <div data-target="tooltip"
                                             class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                                            Pause
                                            <div
                                                class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                                data-popper-arrow></div>
                                        </div>
                                        <button
                                            class="inline-block p-2 mb-0 font-bold tracking-tight text-center text-white uppercase align-middle transition-all ease-in border border-solid rounded-full shadow-none leading-pro text-xs border-white/75 bg-white/10"
                                            type="button" data-target="tooltip_trigger" data-placement="top">
                                            <i class="p-2 fas fa-forward"></i>
                                        </button>
                                        <div data-target="tooltip"
                                             class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                                            Next
                                            <div
                                                class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                                data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


