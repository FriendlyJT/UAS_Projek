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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
<header class="sticky top-0 z-28 ">
    <nav class="container mx-auto">
        <div class="bg-white justify-between flex pt-1/2 h-20  shadow-lg shadow-indigo-100 px-2">
            <div class="flex items-center">
                    <img src="./assets/Logo.png" alt="">
                    <h2 class="pl-2 font-bold text-base ">MangResto</h2>        
                    <div  id="menu" class=" font-bold flex lg:w-full lg:items-center w-full gap-5 flex-col lg:flex-row justify-between  h-full max-sm:fixed z- max-sm:right-0 lg:top-0 top-16 max-sm:hidden max-sm:bg-white max-sm:pb-14 max-sm:pt-10 relative ">     
                        <ul class="inline-block menu1 pl-10 lg:flex-row gap-6 text-primary gap-5 flex flex-col ">
                          <li class="hover:text-[#74A512]"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                          @if (auth()->user()->is_admin)
                          <li class="hover:text-[#74A512]"><a class="hover:text-[#74A512]"
                           href="{{ url('/products') }}">Products Manage</a></li>
                            @endif
                            @if (Route::has('login'))
                                @auth
                                <x-dropdown-link class="hover:text-[#74A512] lg:hidden block text-green-600" href="route('logout')" :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link class="hover:text-[#74A512] lg:hidden block text-green-600" href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                @else
                                    <li class="hover:text-[#74A512] lg:hidden block"><a class="text-green-600" href="{{ url('/login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="hover:text-[#74A512] lg:hidden block"><a class="text-green-600" href="{{ url('/register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif   
                        <div class="flex justify-center"></ul>    
                    </div>
                </div>
            <section class="items-center flex gap-7 max-sm:gap-2 ">

                <div>Halo, {{ Auth::user()->name }}
                            @if (auth()->user()->is_admin)
                                <p class="font-bold text-rose-600">[Admin]</p>
                            @else
                                <p class="font-bold text-teal-500">[Member]</p>
                            @endif    
                </div>

                <div class="max-sm:hidden">
                    <x-dropdown-link :href="route('profile.edit')">
                        <button class="text-white text-sm max-sm:hidden bg-[#74A512] w-[60px] h-[30px] hover:bg-[#32CD32]">{{ __('Profile') }}</button>
                    </x-dropdown-link>
                </div>
                <div class="max-sm:hidden -ml-12">
                <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" >
                                <button class="text-white text-sm max-sm:hidden bg-[#74A512] w-[60px] h-[30px] hover:bg-[#32CD32]">{{ __('Log Out') }}</button>
                            </x-dropdown-link>     
                </form>
                </div>
               
                <button onclick="menunav()" class="float-right w-5 max-sm:block hamburger hidden top-0 "> <img src="./assets/menu.png" alt=""></button>
                </div>
                <script src="./hamburger.js" type="application/javascript"></script>
                <script src="./bahasa.js" type="application/javascript"></script>
                <script src="./dropdown.js" type="application/javascript"></script>
            </section>
        </div>
  </nav>
  
  <div class="pt-28 container mx-auto ">
  <a href="products/create" class="btn btn-primary btn-sm mb-2 px-4">Create</a>
  <div class="flex justify-between">
  
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif
        
        <table class="table">
          <thead>
              <tr class="table-warning">
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Stock</td>
                <td>Telepon</td>
                <td class="text-center">Action</td>
              </tr>
          </thead>
          <tbody>
              @foreach($product as $products)
              <tr>
                  <td>{{$products->id}}</td>
                  <td>{{$products->name}}</td>
                  <td>{{$products->description}}</td>
                  <td>{{$products->price}}</td>
                  <td>{{$products->stock}}</td>
                  <td>{{$products->telepon}}</td>
                  <td class="text-center">
                     
                      <a href="{{ route('products.edit', $products->id)}}" class="btn btn-primary btn-sm">Edit</a>
                      <form action="{{ route('products.destroy', $products->id)}}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">Delete</button>
                        </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
</header>

