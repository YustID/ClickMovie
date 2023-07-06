<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <title>Click Movie</title>

    <style>
        .swiper {
          width: 100%;
          padding-top: 37px;
          padding-bottom: 50px;
        }
    
        .swiper-slide {
          background-position: center;
          width: 300px;
        }
    
        .swiper-slide img {
          display: block;
          width: 100%;
          height: 250px;
        }
    </style>
</head>
<body>
    <div class="flex justify-between lg:justify-around py-5 px-5 bg-[#2B2A2F] fixed top-0 z-[999] right-0 left-0">
        {{-- Start Hamburger --}}
        <div class="lg:hidden">
          <a onclick="myFunction()"><i class="hamburger-menu bx bx-menu text-white"></i></a>
        </div>
        <div class="hidden bg-[#2B2A2F] fixed z-0 right-0 left-0 mt-5" id="myLinks">
          <ul>
            <a href="#about"><li class="ml-2 py-2 text-white hover:bg-orange-500">Genre</li></a>
            <a href="#home"><li class="ml-2 py-2 text-white hover:bg-orange-500">Year</li></a>
          </ul>
        </div>
        {{-- End Hamburger --}}
        
        {{-- Start Logo --}}
        <div>
          <h1 class="text-white">
            <a href="#home"><h1 class="text-sm"><span class="text-red-600">CLICK</span> Movie</h1></a>
          </h1>
        </div>
        {{-- End Logo --}}
        {{-- Start Topbar --}}
        <nav class="lg:flex hidden">
          <ul class="flex">
            <li class="ml-2 text-white hover:text-orange-500"><a href="#home">Genre</a></li>
            <li class="ml-2 text-white hover:text-orange-500"><a href="#about">Year</a></li>
          </ul>
        </nav>
        {{-- End Topbar --}}
        {{-- Start Search --}}
        <form>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="md:block hidden w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
            </div>
            <input type="text" id="search-navbar" class="md:block hidden md:w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
          </div>
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative">
            <div class=" md:order-2">
              <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden rounded-lg text-sm  mr-1" >
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="items-center justify-between hidden md:flex md:w-auto md:order-1" id="navbar-search">
        <div class="relative mt-3 md:hidden">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="text" id="search-navbar" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 fixed z-[999] mt-14" placeholder="Search...">
        </div>
      </div>
      {{-- End Search --}}

      <div class=" flex items-center justify-center mt-32">
        <hr class="w-[1200px] border-gray-300 border-4 rounded-lg">
        <p class="absolute bg-white px-4 text-gray-500 text-xl"><span class="text-red-600 font-mono">Click</span> Movie</p>
      </div>


          {{--Start Script Humberger --}}
    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        
        var slidePosition = 1;
        SlideShow(slidePosition);
        
        // forward/Back controls
        function plusSlides(n) {
            SlideShow((slidePosition += n));
        }
        
        //  images controls
        function currentSlide(n) {
            SlideShow((slidePosition = n));
        }
        
        function SlideShow(n) {
            var i;
            var slides = document.getElementsByClassName("Containers");
            var circles = document.getElementsByClassName("dots");
            if (n > slides.length) {
                slidePosition = 1;
            }
            if (n < 1) {
                slidePosition = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < circles.length; i++) {
                circles[i].className = circles[i].className.replace(" enable", "");
            }
            slides[slidePosition - 1].style.display = "block";
            circles[slidePosition - 1].className += " enable";
        }
        </script>
        {{-- End Script  Humberger --}}
    
     {{-- Script Flowbite --}}
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    
     {{-- Script Flowbite --}}
    
     
    
</body>
</html>