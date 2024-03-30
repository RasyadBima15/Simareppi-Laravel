@extends('layout')

@section('content')
  <h1 class="font-semibold text-2xl ml-6 mt-5">Dashboard</h1>

  <div class="flex flex-wrap justify-start w-[80%]">
    <div class="max-w-sm p-6 ml-5 mt-5 w-1/4 bg-red-600 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <h5 class="mb-2 text-4xl font-semibold tracking-tight text-white dark:text-white">{{$suratMasukCount}}</h5>
      <p class="mb-3 font-medium text-xl text-white dark:text-gray-400">Surat Masuk</p>
      <a href="{{route('viewSuratMasuk')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-800 rounded-lg hover:bg-red-900 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lihat Selengkapnya
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
      </a>
    </div>
    <div class="max-w-sm p-6 ml-5 mt-5 w-1/4 bg-green-600 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <h5 class="mb-2 text-4xl font-semibold tracking-tight text-white dark:text-white">{{$suratKeluarCount}}</h5>
      <p class="mb-3 font-medium text-xl text-white dark:text-gray-400">Surat Keluar</p>
      <a href="{{route('viewSuratKeluar')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-900 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lihat Selengkapnya
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
      </a>
    </div>
  </div>
@endsection

@section('container')
    <div class="flex-grow pb-44">
        @yield('content')
    </div>
@endsection