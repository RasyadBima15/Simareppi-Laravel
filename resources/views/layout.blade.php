<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/storage/css/app.css')}}">
    <script src="{{asset('public/storage/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>E-Archive</title>
</head>
<body>
<nav class="fixed top-0 z-40 w-full h-[132px] border-b border-gray-700 dark:bg-gray-800 dark:border-gray-700 bg-cyan-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <p class="ms-2">
            <img src="{{asset('public/storage/logo/logo_sdm_polri.png')}}" class="h-28 me-3" alt="SDM Logo" />
          </p>
          <div class="flex flex-col gap-1">
            <span class="self-start text-xl font-bahnschrift text-white font-semibold ml-4 sm:text-4xl whitespace-nowrap dark:text-white" style="letter-spacing: 12px">SIMAREPPI</span>
            <span class="self-start text-xl font-bahnschrift text-white font-semibold ml-5 sm:text-xl whitespace-nowrap dark:text-white">simpan ki arsipta dengan rapi</span>
          </div>
        </div>
        <div class="flex items-center gap-4 w-1/6 text-sm">
            @foreach ($user as $item)
              <img class="w-1/4 h-1/4 rounded-full" src="{{asset('public/storage/photos/'. $item->photo)}}" alt="user photo">
              <p class="text-2xl w-full font-bahnschrift mx-auto text-white font-semibold">{{$item->username}}</p>
            @endforeach
        </div>
      </div>
    </div>
</nav>
  
<aside id="logo-sidebar" class="fixed top-[52px] left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-cyan-500 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
          <li class="mt-2 sidebar-menu-item">
              <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                 <svg class="w-5 h-5 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                 </svg>
                 <span class="ms-3">Dashboard</span>
              </a>
           </li>
          <li class="sidebar-menu-item">
                <button type="button" id="surat" class="flex items-center w-full p-2 pb-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fa-solid fa-inbox"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Arsip</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden pt-1 space-y-2">
                    <li>
                        <a href="{{route('viewSuratMasuk')}}" class="flex items-center w-full text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><svg width="40px" viewBox="0 0 50 50" id="Message_And_Communication_Icons" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <rect height="3.9" style="fill:#ffffff;" width="9.5" x="31.9" y="31.3"></rect> </g> </g> <g> <g> <polygon points="37.2,19.3 41.4,16.5 41.4,35.1 37.2,35.1 " style="fill:#ffffff;"></polygon> </g> </g> <g> <g> <path d="M40.5,34.1H10V14.3h30.5V34.1z M11.2,32.9h28.1V15.5H11.2V32.9z" style="fill:#000000;"></path> </g> </g> <g> <g> <rect height="9.2" style="fill:#000000;" transform="matrix(0.5369 0.8436 -0.8436 0.5369 31.3013 -22.358)" width="1.2" x="35.4" y="12.7"></rect> </g> </g> <g> <g> <rect height="1.2" style="fill:#000000;" transform="matrix(0.8439 0.5365 -0.5365 0.8439 11.5246 -5.0365)" width="9" x="9.9" y="16.7"></rect> </g> </g> <g> <g> <rect height="4.6" style="fill:#ffffff;" width="1.5" x="12.8" y="27.1"></rect> </g> </g> <g> <g> <rect height="1.5" style="fill:#ffffff;" width="1.5" x="12.8" y="24.2"></rect> </g> </g> <g> <g> <path d="M26.2,18.8c-0.1,0-0.2,0-0.3,0c1.4,1.2,2.3,2.9,2.3,4.9c0,3.4-2.7,6.2-6.1,6.4 c1.1,0.9,2.6,1.5,4.1,1.5c3.5,0,6.4-2.9,6.4-6.4S29.7,18.8,26.2,18.8z" style="fill:#ffffff;"></path> </g> </g> <g> <g> <path d="M25.2,31.3c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7s7,3.1,7,7C32.2,28.1,29.1,31.3,25.2,31.3z M25.2,18.4c-3.2,0-5.8,2.6-5.8,5.8s2.6,5.8,5.8,5.8s5.8-2.6,5.8-5.8S28.4,18.4,25.2,18.4z" style="fill:#000000;"></path> </g> </g> <g> <g> <g> <polygon points="25.3,27.9 22.1,24.7 23,23.8 25.3,26.2 27.7,23.8 28.5,24.7 " style="fill:#000000;"></polygon> </g> </g> <g> <g> <rect height="5.8" style="fill:#000000;" width="1.2" x="24.7" y="21.3"></rect> </g> </g> </g> </g> </g></svg> Surat Masuk</a>
                    </li>
                    <li>
                        <a href="{{route('viewSuratKeluar')}}" class="flex items-center w-full text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><svg width="40px" viewBox="0 0 50 50" id="Message_And_Communication_Icons" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <rect height="3.9" style="fill:#ffffff;" width="9.5" x="31.9" y="31.3"></rect> </g> </g> <g> <g> <polygon points="37.2,19.3 41.4,16.5 41.4,35.1 37.2,35.1 " style="fill:#ffffff;"></polygon> </g> </g> <g> <g> <path d="M40.5,34.1H10V14.3h30.5V34.1z M11.2,32.9h28.1V15.5H11.2V32.9z" style="fill:#000000;"></path> </g> </g> <g> <g> <rect height="9.2" style="fill:#000000;" transform="matrix(0.5369 0.8436 -0.8436 0.5369 31.3013 -22.358)" width="1.2" x="35.4" y="12.7"></rect> </g> </g> <g> <g> <rect height="1.2" style="fill:#000000;" transform="matrix(0.8439 0.5365 -0.5365 0.8439 11.5246 -5.0365)" width="9" x="9.9" y="16.7"></rect> </g> </g> <g> <g> <rect height="4.6" style="fill:#ffffff;" width="1.5" x="12.8" y="27.1"></rect> </g> </g> <g> <g> <rect height="1.5" style="fill:#ffffff;" width="1.5" x="12.8" y="24.2"></rect> </g> </g> <g> <g> <path d="M26.2,18.8c-0.1,0-0.2,0-0.3,0c1.4,1.2,2.3,2.9,2.3,4.9c0,3.4-2.7,6.2-6.1,6.4 c1.1,0.9,2.6,1.5,4.1,1.5c3.5,0,6.4-2.9,6.4-6.4S29.7,18.8,26.2,18.8z" style="fill:#ffffff;"></path> </g> </g> <g> <g> <path d="M25.2,31.3c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7s7,3.1,7,7C32.2,28.1,29.1,31.3,25.2,31.3z M25.2,18.4c-3.2,0-5.8,2.6-5.8,5.8s2.6,5.8,5.8,5.8s5.8-2.6,5.8-5.8S28.4,18.4,25.2,18.4z" style="fill:#000000;"></path> </g> </g> <g> <g> <g> <polygon points="23,24.4 22.1,23.6 25.3,20.4 28.5,23.6 27.7,24.4 25.3,22.1 " style="fill:#000000;"></polygon> </g> </g> <g> <g> <rect height="5.8" style="fill:#000000;" width="1.2" x="24.7" y="21.3"></rect> </g> </g> </g> </g> </g></svg> Surat Keluar</a>
                    </li>
                </ul>
            </li>
          <li class="sidebar-menu-item">
              <a href="{{route('viewProfile')}}" class="flex items-center p-2 mt-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg width="18px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_round [#1342]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598" id="profile_round-[#1342]"> </path> </g> </g> </g> </g></svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
              </a>
           </li>
          <li class="sidebar-menu-item">
              <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                 <svg class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                 </svg>
                 <span class="flex justify-self-start ms-3 whitespace-nowrap">Logout</span>
              </button>
          </li>
        </ul>
     </div>
</aside>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-black w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-black dark:text-gray-400">Apakah kamu yakin ingin logout?</h3>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                  Ya, Tentu
                </button>
                <button data-modal-hide="popup-modal" type="button" class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
              </form>
          </div>
      </div>
  </div>
</div>

@yield('modal')
  
<div class="sm:ml-64 w-full h-full bg-gradient-to-r from-cyan-500 to-blue-800 fixed pt-20 top-[52px] overflow-y-auto">
  <div class="flex flex-col">
    @yield('container')
    <footer class=" -mb-1 -ml-1 bg-gradient-to-r from-cyan-500 to-blue-800 bottom-0 fixed w-[84%] border border-gray-200 rounded-lg font-bahnschrift shadow dark:bg-gray-800">
      <div class="flex flex-col justify-center items-center w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-md text-black sm:text-center font-semibold dark:text-gray-400">Copyright© 2024 Bagwatpers Biro SDM Polda Sulsel</span>
        <span class="text-md text-black sm:text-center font-semibold dark:text-gray-400">Powered by Rohjashor Team</span>
      </div>
    </footer>
  </div>
</div>

<script>
  const activePage = window.location.pathname;
  const navLinks = document.querySelectorAll('li a');
  const dropdown = document.getElementById("dropdown-example");
  const surat = document.getElementById("surat");

  navLinks.forEach(link => {
    if(link.href.includes(`${activePage}`)){
      link.classList.add('bg-gray-100');
      console.log(activePage);
      if(activePage == '/E-Archive/incomingMessage' || activePage == '/E-Archive/outgoingMessage'){
        dropdown.classList.remove("hidden");
      }
    }
  });
</script>

</body>
</html>

{{-- <div class="flex-grow {{ count($data) > 3 ? 'pb-48' : 'pb-0' }}">
  @yield('content')
</div> --}} 
{{-- this is padding for table --}}
