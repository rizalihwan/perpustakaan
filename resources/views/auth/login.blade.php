@extends('layouts.app', ['title' => 'Perpus | Login'])

@section('loginContent')
<div class="flex items-center min-h-screen p-6 bg-light-50 dark:bg-light-900" style="background: linear-gradient(#2193b0, #6dd5ed);">
    <div
      class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-white-800"
    ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L10,133.3C20,139,40,149,60,154.7C80,160,100,160,120,149.3C140,139,160,117,180,122.7C200,128,220,160,240,192C260,224,280,256,300,245.3C320,235,340,181,360,160C380,139,400,149,420,165.3C440,181,460,203,480,192C500,181,520,139,540,133.3C560,128,580,160,600,160C620,160,640,128,660,117.3C680,107,700,117,720,128C740,139,760,149,780,138.7C800,128,820,96,840,112C860,128,880,192,900,234.7C920,277,940,299,960,272C980,245,1000,171,1020,165.3C1040,160,1060,224,1080,224C1100,224,1120,160,1140,128C1160,96,1180,96,1200,122.7C1220,149,1240,203,1260,218.7C1280,235,1300,213,1320,181.3C1340,149,1360,107,1380,85.3C1400,64,1420,64,1430,64L1440,64L1440,0L1430,0C1420,0,1400,0,1380,0C1360,0,1340,0,1320,0C1300,0,1280,0,1260,0C1240,0,1220,0,1200,0C1180,0,1160,0,1140,0C1120,0,1100,0,1080,0C1060,0,1040,0,1020,0C1000,0,980,0,960,0C940,0,920,0,900,0C880,0,860,0,840,0C820,0,800,0,780,0C760,0,740,0,720,0C700,0,680,0,660,0C640,0,620,0,600,0C580,0,560,0,540,0C520,0,500,0,480,0C460,0,440,0,420,0C400,0,380,0,360,0C340,0,320,0,300,0C280,0,260,0,240,0C220,0,200,0,180,0C160,0,140,0,120,0C100,0,80,0,60,0C40,0,20,0,10,0L0,0Z"></path></svg>
      <div class="flex flex-col overflow-y-auto md:flex-row" style="margin-top: -100px;">
        <div class="h-32 md:h-auto md:w-1/2">
          <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="{{ asset('assets/img/reading.png') }}"
            alt=""
          />
          <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="{{ asset('assets/img/reading.png') }}"
            alt=""
          />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <img src="{{ asset('logo/logoweb.png') }}" alt="" width="100px" style="margin: auto;">
            <h1
              class="mb-8 text-xl font-semibold text-center" style="color: #5a5a5a;"
            >
              <u style="font-family: 'Font Welcome';">Ayo Membaca!</u>
            </h1>
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <label class="block text-sm mb-2">
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div
                      class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                    >
                      <input
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        placeholder="Username..."
                        type="text" name="username" required value="{{ old('username') }}" style="font-family: 'SourceCodePro-Black';" autofocus
                      />
                      <div
                        class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                      >
                        <i class="fa fa-user"></i>
                      </div>
                    </div>
                    @error('username')
                      <b style="color: red;">{{ $message }}</b>
                    @enderror
                </label>
                <label class="block text-sm">
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div
                      class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                    >
                      <input
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        placeholder="Password..."
                        type="password" name="password" style="font-family: 'SourceCodePro-Black';" required
                      />
                      <div
                        class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                      >
                        <i class="fa fa-lock"></i>
                      </div>
                    </div>
                    @error('password')
                        <b style="color: red;">{{ $message }}</b>
                    @enderror
                </label>
                <button
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white"
                    type="submit" style="background: linear-gradient(#2193b0, #6dd5ed); border-radius: 50px; padding: 10px;"
                    >
                    Log in
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
