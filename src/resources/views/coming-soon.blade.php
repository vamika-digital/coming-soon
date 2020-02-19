<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>We are comming soon</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Font Awesome if you need it
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">
  <!--Replace with your tailwind.css once created-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
  <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
  <style>
    .gradient {
      background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
    }

    .modal {
      transition: opacity 0.25s ease;
    }

    html,
    body {
      min-height: 100%;
      height: 100%;
    }
  </style>

</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
  <div class="h-full min-h-full relative" id="app">
    <!--Hero-->
    <div class="pt-10">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <a class="w-full mb-6 toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <svg style="max-height: 2rem;" class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
              <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
              <path class="plane-take-off" d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z " />
            </svg>
          </a>
          <p class="uppercase tracking-loose w-full">STAY TUNED</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">We are launching soon!</h1>
          <p class="leading-normal text-2xl mb-8">Subscribe to get notification as assson as we launch!</p>
          @if ($isSubscribeNeeded)
          <button @click="subscribeDialog = true" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg">Subscribe</button>
          @endif
        </div>
        <div class="w-full md:w-3/5 py-6 text-center">
          <img class="w-full md:w-4/5 z-50" src="{{ asset('vendor/vamikadigital/comingsoon/hero.png') }}" />
        </div>
      </div>
    </div>
    @if ($hasTokens)
    <button @click="loginDialog = true" class="text-xs absolute bottom-0 right-0 bg-white text-gray-800 font-bold rounded-full mb-6 mr-6 py-2 px-8 shadow-lg">FIRE-TOKEN</button>
    @endif
    @if ($isSubscribeNeeded)
    <div class="modal text-black fixed w-full h-full top-0 left-0 flex items-center justify-center" v-if="subscribeDialog">
      <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
      <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50" @click="subscribeDialog = false">
          <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
          <span class="text-sm">(Esc)</span>
        </div>
        <div class="modal-content py-4 text-left px-6 relative">
          <div class="flex justify-between items-center pb-3 absolute right-0 top-0">
            <div class="modal-close cursor-pointer z-50 p-3" @click="subscribeDialog = false">
              <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>
          </div>
          <form method="POST" class="bg-white px-6 pt-3 pb-3" action="{{ $subscribeUrl }}">
            @csrf
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="user-name">
                Your Name
              </label>
              <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user-name" type="text" placeholder="Enter your name" name="name">
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="user-email">
                Your E-Mail Address
              </label>
              <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user-email" type="email" placeholder="Enter your e-mail address" />
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Subscribe Me!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif

    @if ($hasTokens)
    <div class="modal text-black fixed w-full h-full top-0 left-0 flex items-center justify-center" v-if="loginDialog">
      <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
      <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50" @click="loginDialog = false">
          <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
          <span class="text-sm">(Esc)</span>
        </div>
        <div class="modal-content py-4 text-left px-6 relative">
          <div class="flex justify-between items-center pb-3 absolute right-0 top-0">
            <div class="modal-close cursor-pointer z-50 p-3" @click="loginDialog = false">
              <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>
          </div>
          <form method="POST" class="bg-white px-6 pt-3 pb-3" action="{{ route('comingsoon.token') }}">
            @csrf
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="user-token">
                Your Token
              </label>
              <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user-token" type="text" placeholder="Enter your token" name="token">
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        loginDialog: false,
        subscribeDialog: false,
        name: null,
        email: null,
        token: null
      },
      methods: {
        onEscapeKeyUp: function(event) {
          if (event.which === 27) {
            this.subscribeDialog = false
            this.loginDialog = false
          }
        }
      },
      created: function() {
        window.addEventListener('keyup', this.onEscapeKeyUp);
      }
    })
  </script>
</body>

</html>