<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MangResto - FRIENDLY JIHAD TAQWANA</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Raleway:wght@500&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <style type="text/tailwindcss">
    <link type="text/tailwindcss" href="tailwindcss.css">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
<header class="sticky top-0 z-28">
    <nav class="container mx-auto">
        <div class="bg-white shadow-lg justify-between flex pt-1/2 h-20   shadow-indigo-100 px-2 ">
            <div class="flex items-center">
                    <img src="./assets/Logo.png" alt="">
                    <h2 class="pl-2 font-bold text-base ">MangResto</h2>        
                    <div  id="menu" class=" lg:items-center font-bold flex lg:w-full  justify-between w-full gap-5 flex-col lg:flex-row h-full max-sm:fixed z- max-sm:right-0 lg:top-0 top-16 max-sm:hidden max-sm:bg-white max-sm:pb-14 max-sm:pt-10 relative">     
                        <ul class=" gap-5 flex flex-col  gap-6 text-primary inline-block menu1 pl-10 lg:flex-row">
                          <li class="hover:text-[#74A512]"><a href="#">Home</a></li>
                            <li class="hover:text-[#74A512]"><a href="#">About</a></li>
                             <li class="haschild hover:text-[#74A512]">
                                <div class="mobilecaret flex">
                                    <a href="#">Shop</a>
                                    <button onclick="dropdownshop() " class="max-sm:absolute w-5 max-sm:right-4  pl-2 ">
                                        <img src="./caret.png" alt="">
                                    </button>
                                </div>
                                <ul id="shop" class="bg-white absolute hidden  max-sm:w-full max-sm:relative  text-primary">
                                    <li><a  class="block" href="#">Fast Food</a></li>
                                    <li><a  class="block" href="#">Vegetable Menu</a></li>
                                    <li><a  class="block" href="#">Healthy Food</a></li>
                                </ul>
                              </li>   
                              <li class="mr-4 hover:text-[#74A512]"><a href="#">Contact</a></li>
                            <li class="hover:text-[#74A512]"><a href="#">Blog</a></li>
                                @if (Route::has('login'))
                                    @auth
                                     <li class=" lg:hidden block hover:text-[#74A512]"><a class="text-green-600" href="{{ url('/dashboard') }}">{{ Auth::user()->name }}</a></li>
                                @else
                                    <li class=" lg:hidden block hover:text-[#74A512]"><a class="text-green-600" href="{{ url('/login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="lg:hidden block"><a class="text-green-600" href="{{ url('/register') }}">Register</a></li>
                                @endif
                                @endauth
                                @endif
                            <div class="flex justify-center">                  
                            </div>
                        </ul>    
                    </div>
                </div>
            <section class=" max-sm:gap-2 gap-7 items-center flex  ">
                <button onclick="fav()">
                    <img class="max-sm:w-5" src="./assets/cart.png" alt="">
                </button>
                <button onclick="belanja()">
                    <img class="max-sm:w-5" src="./assets/shop.png" alt="">
                </button>
                <button>
                  <img class="max-sm:w-5" src="./assets/language.png" alt="">
              </button>
                <form id="cart" class="top-[90%] right-[10%] cart absolute hidden rounded-lg lg:w-[17rem] bg-[#E2FFEF] w-[15rem] h-[23rem] lg:h-[8rem]">
                    <div class="cart flex gap-[1rem] relative pt-5 items-center">
                        <img class="pl-3 lg:pr-3 lg:w-20 w-16 lg:pl-5 pr-0" src="./assets/ikanBakar.png" alt="">
                        <div class="">
                            <h2 class="lg:text-lg text-sm font-bold">IKAN BAKAR</h2>
                            <div>
                                <span class="lg:text-base text-xs">Rp.85.000</span>
                                <span class="lg:text-base text-xs">Jumlah : 1</span>
                            </div>
                        </div>
                        <script src="./belanja.js" type="application/javascript"></script>
                    </div>     
                </form>
                <form id="fav" class="lg:w-[17rem] cart absolute hidden rounded-lg right-[33%] lg:h-[8rem] bg-[#E2FFEF] top-[90%] w-[15rem] h-[23rem]">
                    <div class="gap-[1rem] fav flex items-center relative pt-5">
                        <img class="pl-5 lg:w-20 w-16 pr-3" src="./assets/ikanBakar.png" alt="">
                        <div class="">
                            <h2 class="text-base font-bold lg:text-lg">IKAN BAKAR</h2>
                            <div>
                                <span class="lg:text-base text-sm" >Rp.85.000</span>
                            </div>
                        </div>
                        <script src="./fav.js" type="application/javascript"></script>
                        <script src="./belanja.js" type="application/javascript"></script>
                    </div> 
                </form>
                <div class="relative items-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" ><button class="w-[90px] h-[36px] text-white text-sm max-sm:hidden bg-[#74A512]  hover:bg-[#32CD32]">{{ Auth::user()->name }}</button></a>
                    @else
                        <a href="{{ url('/login') }}" ><button href="{{ route('login') }}" class="text-white text-sm max-sm:hidden bg-[#74A512] w-[90px] h-[36px] hover:bg-[#32CD32]">Log in</button></a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button class="text-white max-sm:hidden bg-[#74A512] text-sm w-[90px] h-[36px] hover:bg-[#32CD32]">Register</button></a>
                    @endif
                    @endauth
                @endif
                    <button onclick="menunav()" class="float-right w-5 max-sm:block hamburger hidden top-0 "> <img src="./assets/menu.png" alt=""></button>
                </div>
                <script src="./hamburger.js" type="application/javascript"></script>
                <script src="./bahasa.js" type="application/javascript"></script>
                <script src="./dropdown.js" type="application/javascript"></script>
            </section>
        </div>
  </nav>
</header>
        <section class="gap-0 flex container mx-auto lg:gap-20">
          <div class="lg:pt-[145px] pt-0">
            <p class="lg:text-sm text-[#74A512]text-sm">Sall Top 20% Off</p>
            <div class="flex lg:text-7xl gap-2 text-4xl font-bold">
                <h2 class="text-[#74A512]">Will</h2>
                <h2>Give You</h2>
            </div>
            <div class="flex text-4xl lg:text-7xl gap-1 lg:gap-2 font-bold w-[]">
                <h2 class="text-[#74A512]">Satisfaction</h2>
                <h2>in Food</h2>
            </div>
            <p class="w-[300px] pt-[24px] text-xs lg:text-base lg:w-[570px] ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget gravida leo, nec iaculis diam. </p>
            <div class="flex gap-5 pt-[40px] max-sm:justify-center">
                <button id="btnpr" class="w-[100px] h-[39px] lg:w-[133px] lg:h-[49px] bg-[#74A512] text-white">Shop Now</button>
                <button class="text-[#74A512] flex text-sm items-center ">Explore Our Blog <img class="pl-2" src="./panah.svg" alt=""></button>
            </div>
            </div>
            <div class="bg-[#EAF9CE] w-[400px] ">
                <img class="pt-[80px] pb-[56]" src="./assets/pngwing 1.png" alt="">
            </div>
        </div>
        </section>
    <div class="flex lg:justify-center container mx-auto pt-20 justify-center">
      <div>
          <h2 class="text-center pb-5 lg:text-base text-sm text-b">Company Partner</h2>
          <img class="" src="./assets/partner.png" alt="">
      </div>
  </div>
  <div class="container mx-auto pt-[140px]">
  <div class="lg:grid-cols-2 lg:grid-rows-1 grid-cols-1 grid-rows-2 grid ">
      <div class="h-[200px] lg:h-[230px] items-center flex lg:w-[620px] bg-[#EAF9CE] w-[375px]">
          <img class="w-[137px] h-[100px] lg:w-[252px] lg:h-[215px]" src="./assets/buger.png" alt="">
          <div class="pl-2 text-left">
              <h2 class="lg:text-xl text-sm font-bold ">Fast Food</h2>
              <p class="lg:text-base text-xs">Lörem ipsum nyn fahasm. Jyr epiception tavis. Berade pubel. Nysm anasilår dera jerat. </p>
              <button class="lg:h-[49px] h-[39px]  bg-[#74A512] w-[120px] lg:w-[133px]  text-white mt-[45px]">Shop Now</button>
          </div>
      </div>
      <div class="w-[375px] flex bg-[#FFF7E2] h-[200px] lg:w-[620px] lg:h-[230px] items-center">
          <img class="h-[100px] w-[200px] lg:w-[252px] lg:h-[215px]" src="./assets/sayur.png" alt="">
          <div class="pl-2 text-left">
              <h2 class="lg:text-xl text-sm font-bold">Organic Food</h2>
              <p class="text-xl text-xs">Lörem ipsum nyn fahasm. Jyr epiception tavis. Berade pubel. Nysm anasilår dera jerat. </p>
              <button class="text-white mt-[45px] lg:h-[49px] bg-[#74A512] lg:w-[133px] w-[120px] h-[39px]">Shop Now</button>
          </div>
      </div>
  </div>
</div>
<div class="pt-28 container mx-auto ">
  <div class="flex justify-between">
      <div>
        <p class="text-sm text-[#FF9900] lg:text-lg ">About Us</p>
        <h2 class="font-bold  text-2xl pt-5 lg:text-4xl">MangResto</h2>
        <p class="lg:w-[590px] text-xs w-[150px] lg:text-base pt-7 ">we are a fast food company and we make everyone enjoy any food we serve them because we serve the best for them all.</p>
        <button class="lg:h-[49px] w-[120px] text-white mt-[45px] h-[39px] lg:w-[133px] bg-[#74A512] ">Shop Now</button>
      </div>
      <img class="max-sm:w-[205px]" src="./assets/hambuger.png" alt="">
  </div>
</div>
    <div class="mx-24 pt-8">
      <div class="flex justify-between">
          <div>
              <h2 class="text-3xl font-bold">Food MangResto</h2>
              <p class="text-[#74A512] pt-[16px]">Best Food</p>
          </div>
          <div class="text-[#969696] items-center w-[395px]">
              <p>This is the most popular food that is often bought by some people, cheap and very healthy for you</p>
          </div>
      </div>
      <div>
          <div class="text-base text-[#969696] justify-center gap-5 pt-10 flex font-semibold ">
              <button class="text-[#74A512] underline">All Product</button>
              <button>Fast Food</button>
              <button>Healthy Food</button>
          </div>
          <div class="pt-16 gap-5 grid grid-cols-4 grid-row-2 ">
              <div class="makan">
                  <a href="#"><img class="w-full" src="./assets/Frame 2162.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                          <a href="#" class="font-bold text-xl">Cucumber</a>
                      </div>
                      <div class="flex">
                          <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="pt-7 justify-between flex">
                          <div class="flex">
                              <img class="p-1.5" src="./assets/plus.png" alt="">
                              <p class="font-semibold text-[#74A512]">Add</p>                               
                          </div>
                          <p class="font-bold">$ 25</p>
                      </div>
              </div>
              <div class="makan" >
                <a href="#"><img class="w-full" src="./assets/Frame 2163.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Swede</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="justify-between pt-7 flex ">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>

              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2164.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Chinese cinnamon</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="flex justify-between pt-7">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>
              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2165.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Pepper (C. annuum)</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="flex justify-between pt-7">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>
              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2162.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Cucumber</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="flex justify-between pt-7">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>

              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2163.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Swede</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="flex justify-between pt-7">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>     
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>

              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2164.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Pepper (C. annuum)</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="pt-7 flex justify-between ">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>
              </div>
              <div  class="makan">
                <a href="#"><img class="w-full" src="./assets/Frame 2165.png" alt=""></a>
                  <div class="flex justify-between">
                      <div>
                        <a href="#" class="font-bold text-xl">Cucumber</a>
                      </div>
                      <div class="flex">
                        <img class="p-2" src="./assets/Star 1.png" alt="">
                          <p>(2.1)</p>
                      </div>
                  </div>
                      <p>Lörem ipsum nyn fahasm. Jyr epiception tavis.</p>
                      <div class="flex justify-between pt-7">
                          <div class="flex">
                            <img class="p-1.5" src="./assets/plus.png" alt="">
                            <p class="text-[#74A512] font-semibold">Add</p>          
                          </div>
                          <p class="font-bold">$ 32</p>
                      </div>   
              </div>
          </div>
          <div class="flex justify-center pt-10">
              <button class="w-[133px] h-[49px] bg-[#74A512] text-white">View More</button>
          </div>
      </div>
  </div>
  
  <section class="py-6">
    <div class="font-base mx-24 mt-8 flex flex-wrap item-center justify-between">
      <div class="pb-8">
        <p class="text-sm text-[#74A512] pt-24 pb-6">Healty Food</p>
        <h2 class="font-bold text-[35px] gap-2  w-[400px]">Healthy And you Can Enjoy in The Morning</h2>
        <p class="w-[550px] text-[15px] text-[#969696] py-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget gravida leo, nec iaculis diam. </p>
        <button class="w-[133px] h-[49px] bg-[#74A512] text-white font-semibold ">Shop Now</button>
      </div>
      <div class="flex">
        <img class="pt-[60px] pb-[30] w-[550px]" src="./assets/pngwing 4.png" alt="">
      </div>
  </section> 
</header>

  <footer class="mt-10 bg-[#1F2F00]">
    <div class="flex flex-wrap">
      <div class="mx-10 w-[300px]">
        <div class="flex flex-wrap py-10">
          <img src="assets/Logo.png" alt="logo">
           <h3 class=" font-sans font-bold ml-2 text-[#FFFFFF]">MangResto</h3>
        </div>
        <p class="text-[#DDDDDD]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget gravida leo, nec iaculis diam. </p>
        <div class="flex flex-wrap py-4" >
          <img src="assets/facebok.png" alt="" class="mr-4">
          <img src="assets/twiter.png" alt="" class="mr-4">
          <img src="assets/in.png" alt="" class="mr-4">
          <img src="assets/ig.png" alt="" class="mr-4">
        </div>
      </div>
      <div class="mt-10 ">
        <h2 class="font-bold text-lg text-[#FFFFFF]">Navigation</h2>
        <ul class="py-6 text-[#DDDDDD]">
          <li class="pb-6"><a href="#">Home</a></li>
          <li class="pb-6"><a href="#">About Us</a></li>
          <li class="pb-6"><a href="#">Shop</a></li>
          <li class="pb-6"><a href="#">Contact</a></li>
          <li class="pb-6"><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="mt-10 ml-8">
        <h2 class="font-bold text-lg text-[#FFFFFF]">Our Product</h2>
        <ul class="py-6 text-[#DDDDDD]">
          <li class="pb-6"><a href="#">Healty Food</a></li>
          <li class="pb-6"><a href="#">Fast Food</a></li>
        </ul>
      </div>
      <div class="mt-10 ml-8">
        <h2 class="font-bold text-lg text-[#FFFFFF]">Form Member</h2>
        <ul class="py-6 text-[#DDDDDD]">
          <li class="pb-6"><a href="#">Healty Food</a></li>
          <li class="pb-6"><a href="#">Fast Food</a></li>
        </ul>
      </div>
      <div class="mt-10 ml-8">
        <h2 class="font-bold text-lg text-[#FFFFFF]">Address</h2>
        <div class="w-[450px] py-4 text-[#DDDDDD] flex flex-wrap">               
          <img src="assets/cil_location-pin.png" alt=""><p class="pl-4" href="#">4517 Washington Ave. Manchester, Kentucky 39495</p><p>
        </div>
        <div class="w-[500px] py-4 text-[#DDDDDD] flex flex-wrap">               
          <img src="assets/dashicons_email.png" alt=""> <p class="pl-4" href="#">hallo@mangresto123@gmail.com</p> 
        </div>
      </div>
    </div>
    <div class="flex ml-10 pb-4">
      <div>
        <p class="text-[#FFFFFF] font-semibold">Mancoding. All Rights Reserved</p>
      </div>
      <div class="ml-auto mr-10">
        <div class="flex text-[#FFFFFF] font-semibold ">
          <a href="#" class="mr-10">(021) 678-9102</a>
          <a href="#" class="mr-10">Privacy Policy</a>
          <a href="#">Merchan Agreement</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="./app.js"></script>

<script src={{ asset('js/web.js') }} type="application/javascript"></script>


</body>

</html>