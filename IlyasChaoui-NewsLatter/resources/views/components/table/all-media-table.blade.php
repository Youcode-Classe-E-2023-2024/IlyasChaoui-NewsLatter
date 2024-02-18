<div class="flex w-1/2 flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">All Medias</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table
                        class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Name
                            </th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                type
                            </th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                size
                            </th>
                            <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                create at
                            </th>
                            <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                        </tr>
                        </thead>
                        <tbody class="border-t">
                        @foreach($medias as $media)
                            @foreach($media->getMedia() as $mediaItem)
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ Str::limit($mediaItem->name, 20) }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $mediaItem->type }}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ number_format($mediaItem->size / 1024 / 1024, 2) }} MB</span>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <span
                                                class="mr-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $mediaItem->created_at->toFormattedDateString() }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete.media', ['id' => $mediaItem->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                                   href="javascript:;"><i
                                                        class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i></a>
                                            </button>
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                        {{ $medias->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
