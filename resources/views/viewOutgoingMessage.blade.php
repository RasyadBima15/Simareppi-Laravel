@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-start w-[81%] ml-2">
        <div class="flex flex-col w-full justify-center items-center mx-auto">
            <div class="flex w-full justify-between items-end">
                <h5 class="text-3xl pt-8 pl-24 font-semibold text-gray-900 dark:text-white">Lihat Surat Keluar</h5>
                <a href="{{route('viewSuratKeluar')}}" class="flex items-center mr-24 border justify-center px-4 h-9 text-base font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Back
                </a>
            </div>
            <div class="flex flex-col justify-center items-center pb-8 w-[85%] bg-gray-100 border border-black mt-8 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 overflow-y-auto">
                @foreach ($suratKeluar as $item)
                <div class="flex pl-6 flex-col w-full pt-0 mb-2 border-b border-black">
                    <h5 class="mb-2 text-xl mt-2 font-semibold text-gray-900 dark:text-white">No Surat</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->no_surat}}</p>
                </div> 
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Tanggal Surat</h5>
                    @php
                        $formattedDate = date('d-m-Y', strtotime($item->tanggal_surat));
                    @endphp
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$formattedDate}}</p>
                </div> 
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Jenis Surat</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->jenis_surat}}</p>
                </div> 
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Dari</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->dari}}</p>
                </div> 
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Kepada</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->kepada}}</p>
                </div>
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Perihal</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->perihal}}</p>
                </div> 
                <div class="flex pl-6 border-b flex-col w-full pt-0 mb-2 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Isi Surat</h5>
                    <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{!! nl2br(e($item->isi_surat)) !!}</p>
                </div>  
                <div class="flex pl-6 flex-col w-full pt-0 border-black">
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">File Surat</h5>
                    @if ($item->file)
                        <embed class="pr-6 pt-2" src="{{ asset('public/storage/files/' . $item->file) }}" type="application/pdf" width="100%" height="500">
                    @else
                        <h6 class="text-xl font-semibold text-gray-900 dark:text-white">File Surat Belum Ditambahkan.</h6>
                    @endif
                </div> 
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="flex-grow pb-44">
        @yield('content')
    </div>
@endsection