   <header x-data={open:false}
       class="flex items-center justify-between z-20 flex-wrap px-5 py-3 font-medium text-lg border-b min-h-[100px]">
       <div class="logo-holder bg-red-600">
           <img src="./images/Kids-school-logo.jpg" alt="school logo" class="w-[60px]  md:w-[120px] h-[80px] ">
       </div>
       <div class="max-lg:hidden">
           <ul class="flex ps-8">
               <li class="me-4 md:me-6 text-xl md:text-2xl">Home </li>
               <li class="me-4 md:me-6 text-xl md:text-2xl">Courses</li>
               <li class="me-4 md:me-6 text-xl md:text-2xl">Programs</li>
               <li class="me-4 md:me-6 text-xl md:text-2xl">About Us</li>
           </ul>
       </div>
       <div class=" min-w-[200px] flex text-xs sm:text-base md:text-xl">
           @if (Route::has('login'))
               <livewire:welcome.navigation />
           @endif
           <div class="-me-2 flex items-center lg:hidden">
               <button @click="open = ! open"
                   class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                   <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                       <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                           stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16" />
                       <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                   </svg>
               </button>
           </div>
       </div>

       <div x-show="open" class="absolute left-0 right-0 top-[100px] z-20 bg-[#f2f2f2] py-6">

           <ul class="flex flex-col ps-8 items-center">
               <li
                   class=" text-xl mt-4 font-semibold py-2  hover:text-black text-gray-700 hover:border-b-2 my-1 border-black  md:text-2xl">
                   Home
               </li>
               <li
                   class=" text-xl mt-4 font-semibold py-2  hover:text-black text-gray-700 hover:border-b-2 my-1 border-black  md:text-2xl">
                   Courses
               </li>
               <li
                   class=" text-xl mt-4 font-semibold py-2  hover:text-black text-gray-700 hover:border-b-2 my-1 border-black  md:text-2xl">
                   Programs </li>
               <li
                   class=" text-xl mt-4 font-semibold py-2  hover:text-black text-gray-700 hover:border-b-2 my-1 border-black  md:text-2xl">
                   About
                   Us
               </li>
           </ul>
       </div>
   </header>
