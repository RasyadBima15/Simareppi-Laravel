@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center w-[81%] ml-2">
        @if (session('success'))
            <div class="flex justify-center items-center">
                <div id="toast-success" class="flex items-center w-full max-w-xs mt-12 p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
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
                <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mt-12 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
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
        <div class="block w-[70%] mt-12 ml-5 p-6 bg-transparent border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 overflow-y-auto">
            @foreach ($suratKeluar as $item)
                <form class="space-y-6" action="{{route('editOutgoingMessage', ['id'=> $item->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-between">
                        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Surat Keluar</h5>
                        <a href="{{route('viewSuratKeluar')}}" class="flex items-center border justify-center px-4 h-10 text-base font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                            Back
                        </a>
                    </div>
                    <div>
                        <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Surat</label>
                        <input type="text" value="{{$item->no_surat}}" name="no_surat" id="no_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                    </div>
                    <div>
                        <label for="tanggal_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat</label>
                        <input type="date" value="{{date('Y-m-d', strtotime($item->tanggal_surat))}}" name="tanggal_surat" id="tanggal_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                        <input type="text" value="{{$item->perihal}}" name="perihal" id="perihal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="dari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari</label>
                        <input type="text" value="{{$item->dari}}" name="dari" id="dari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="kepada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepada</label>
                        <input type="text" name="kepada" value="{{$item->kepada}}" id="kepada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="jenis_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Surat</label>
                        <select id="jenis_surat" name="jenis_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Surat Biasa" {{$item->jenis_surat === "Surat Biasa" ? 'selected' : ''}}>Surat Biasa</option>
                            <option value="TR" {{$item->jenis_surat === "TR" ? 'selected' : ''}}>TR</option>
                            <option value="Nota Dinas" {{$item->jenis_surat === "Nota Dinas" ? 'selected' : ''}}>Nota Dinas</option>
                        </select>
                    </div>
                    <div>
                        <label for="isi_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi Surat</label>
                        <textarea name="isi_surat" id="isi_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" cols="30" rows="4" required>{{$item->isi_surat}}</textarea>
                    </div>
                    <div>   
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Edit file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file" name="file" type="file">
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-300" id="file_input_help">File yang diunggah harus bertipe file PDF.</p>
                        <div id="filePreview" class="mt-5">
                            @if ($item->file)
                                <embed class="pr-6 pt-2" src="{{ asset('public/storage/files/' . $item->file) }}" type="application/pdf" width="100%" height="500">
                            @else
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-white">File Surat Belum Ditambahkan.</h6>
                            @endif
                        </div>
                    </div> 
                    <button type="submit" class="w-full text-white bg-green-600 border hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Surat Keluar</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection

@section('container')
    <div class="flex-grow pb-44">
        @yield('content')
    </div>
@endsection