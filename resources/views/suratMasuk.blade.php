@extends('layout')

@section('content')
    <h1 class="font-semibold text-2xl ml-6 mt-5">Surat Masuk</h1>
    @if (session('success'))
            <div class="flex justify-center items-center w-[81%]">
                <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-black text-sm font-normal">{{session('success')}}</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </div>
    @endif
    @if (session('error'))
            <div class="flex justify-center items-center">
                <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-black text-sm font-normal">{{session('error')}}</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </div>
    @endif
    <div class="flex justify-between items-end w-[81%]">
        <div id="search" class="mt-5 ml-60 w-[50%]">
            @csrf
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Perihal <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg></button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" onclick="toggleSearch('Perihal')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perihal</button>
                        </li>
                        <li>
                            <button type="button" onclick="toggleSearch('NoSurat')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No Surat</button>
                        </li>
                        <li>
                            <button type="button" onclick="toggleSearch('TanggalSurat')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanggal Surat</button>
                        </li>
                        <li>
                            <button type="button" onclick="toggleSearch('JenisSurat')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jenis Surat</button>
                        </li>
                        <li>
                            <button type="button" onclick="toggleSearch('Dari')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dari</button>
                        </li>
                        <li>
                            <button type="button" onclick="toggleSearch('Kepada')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kepada</button>
                        </li>
                    </ul>
                </div>
                <div id="search-container" class="relative w-full">
                    <form action="{{route('searchIncoming')}}" method="POST">
                        @csrf
                        <input type="search" name="search-perihal" id="pencarian" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Messages..." required>
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                <div id="datepicker-container" class="hidden relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <form action="{{route('searchIncoming')}}" method="POST">
                        @csrf
                        <input name="search-tanggal_surat" datepicker datepicker-format="dd-mm-yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{route('viewSuratMasuk')}}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg mr-40 text-sm px-5 py-2.5 border dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Lihat Semua</a>
        <a href="{{route('viewAddIncomingMessage')}}" class="focus:outline-none text-white w-26 h-13 border bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg height="17px" width="17px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 309.059 309.059" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#ffffff;" d="M280.71,126.181h-97.822V28.338C182.889,12.711,170.172,0,154.529,0S126.17,12.711,126.17,28.338 v97.843H28.359C12.722,126.181,0,138.903,0,154.529c0,15.621,12.717,28.338,28.359,28.338h97.811v97.843 c0,15.632,12.711,28.348,28.359,28.348c15.643,0,28.359-12.717,28.359-28.348v-97.843h97.822 c15.632,0,28.348-12.717,28.348-28.338C309.059,138.903,296.342,126.181,280.71,126.181z"></path> </g> </g> </g></svg></a>
    </div>

    <div class="block w-[80%] mt-5 ml-5 p-6 bg-gray-100 border border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 overflow-y-auto">
        @if ($suratMasukCount->total() > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                    <thead class="text-sm border-b border-black text-black uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tanggal Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Perihal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dari
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kepada
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                File
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratMasukCount as $item)
                            <tr class="bg-transparent border-b border-black dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{$item->no_surat}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->tanggal_surat}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->perihal}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->dari}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->kepada}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->jenis_surat}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('viewIncomingMessage', ['id' => $item->id])}}" class="focus:outline-none text-white border border-black bg-cyan-800 hover:bg-cyan-900 font-medium rounded-lg text-sm px-4 py-2 me-2 dark:focus:ring-yellow-900">Lihat</a>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-row gap-1">
                                        <form action="{{route('viewEditIncomingMessage', ['id' => $item->id])}}" method="GET">
                                            <button type="submit" class="focus:outline-none text-white border border-black bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-4 py-2 me-2 dark:focus:ring-yellow-900">Edit</button>   
                                        </form>
                                        <button type="button" data-modal-target="popup-modal-sec-{{$item->id}}" data-modal-toggle="popup-modal-sec-{{$item->id}}" class="focus:outline-none text-white border border-black bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        @else
            <div class="flex justify-center items-center gap-2">
                <h1 class="text-2xl font-semibold">Tidak ada data yang ditemukan</h1>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        @endif
        <div class="flex flex-row justify-between items-center mt-5">
            <!-- Help text -->
            <span class="text-sm text-gray-700 dark:text-gray-400">
                @if ($suratMasukCount->total() > 0)
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ ($suratMasukCount->currentPage() - 1) * $suratMasukCount->perPage() + 1 }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $suratMasukCount->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $suratMasukCount->total() }}</span> Entries
                @else
                    Showing <span class="font-semibold text-gray-900 dark:text-white">0</span> to <span class="font-semibold text-gray-900 dark:text-white">0</span> of <span class="font-semibold text-gray-900 dark:text-white">0</span> Entries
                @endif
            </span>
            <!-- Buttons -->
            <div class="inline-flex gap-2 mt-2 xs:mt-0">
                @if ($suratMasukCount->currentPage() > 1)
                    <a href="{{ $suratMasukCount->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 text-base border font-medium text-white bg-gray-800 rounded hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        Sebelumnya
                    </a>
                @endif
            
                @if ($suratMasukCount->hasMorePages())
                    <a href="{{ $suratMasukCount->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 text-base font-medium border text-white bg-gray-800 rounded hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Berikutnya
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                @endif
            </div>     
        </div>
    </div>
    <script>
        function toggleSearch(showSearch) {
            const searchContainer = document.getElementById('search-container');
            const datepickerContainer = document.getElementById('datepicker-container');
            const formSearch = document.getElementById('search');
            const dropdownButton = document.getElementById('dropdown-button');
            const buttonSearch = document.getElementById('pencarian');
    
            if (showSearch == "Perihal") {
                searchContainer.classList.remove('hidden');
                datepickerContainer.classList.add('hidden');
                dropdownButton.textContent = 'Perihal';
                buttonSearch.name = 'search-perihal'

                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            } else if (showSearch == "NoSurat") {
                searchContainer.classList.remove('hidden');
                datepickerContainer.classList.add('hidden');
                dropdownButton.textContent = 'No Surat'
                buttonSearch.name = 'search-no_surat';
                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            } else if (showSearch == "JenisSurat") {
                searchContainer.classList.remove('hidden');
                datepickerContainer.classList.add('hidden');
                dropdownButton.textContent = 'Jenis Surat';
                buttonSearch.name = 'search-jenis_surat';

                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            } else if (showSearch == "Dari") {
                searchContainer.classList.remove('hidden');
                datepickerContainer.classList.add('hidden');
                dropdownButton.textContent = 'Dari'
                buttonSearch.name = 'search-dari'

                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            } else if (showSearch == "Kepada") {
                datepickerContainer.classList.add('hidden');
                dropdownButton.textContent = 'Kepada'
                buttonSearch.name = 'search-kepada';

                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            } else {
                searchContainer.classList.add('hidden');
                datepickerContainer.classList.remove('hidden');
                dropdownButton.textContent = 'Tanggal Surat'

                // Create SVG element
                var svgElement = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgElement.setAttribute("class", "w-2.5 h-2.5 ms-2.5");
                svgElement.setAttribute("aria-hidden", "true");
                svgElement.setAttribute("fill", "none");
                svgElement.setAttribute("viewBox", "0 0 10 6");

                // Create path element
                var pathElement = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathElement.setAttribute("stroke", "currentColor");
                pathElement.setAttribute("stroke-linecap", "round");
                pathElement.setAttribute("stroke-linejoin", "round");
                pathElement.setAttribute("stroke-width", "2");
                pathElement.setAttribute("d", "m1 1 4 4 4-4");

                // Append path to SVG
                svgElement.appendChild(pathElement);

                // Append SVG to dropdownButton
                dropdownButton.appendChild(svgElement);
            }
        }
    </script>
@endsection

@section('modal')
    @foreach ($suratMasukCount as $item)
        <div id="popup-modal-sec-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-sec-{{$item->id}}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-black w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-black dark:text-gray-400">Apakah yakin ingin menghapus surat ini?</h3>
                        <form action="{{route('deleteIncomingMessage', ['id' => $item->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button data-modal-hide="popup-modal-sec" type="submit" class="text-white bg-red-600 hover:bg-red-800 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Ya, Tentu
                            </button>
                            <button data-modal-hide="popup-modal-sec-{{$item->id}}" type="button" class="text-black bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('container')
<div class="flex-grow @if (($suratMasukCount->lastItem()) - (($suratMasukCount->currentPage() - 1) * $suratMasukCount->perPage() + 1) > 2)
    pb-44
@else
   pb-0 
@endif">
    @yield('content')
</div>
@endsection