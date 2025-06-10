<!DOCTYPE html>
<html>
<head>
 <title>Admin Login</title>
 @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
 @vite(['resources/css/app.css', 'resources/js/app.js'])
 @else
 @endif</head>
<body class="h-full bg-white">
 <div class="flex min-h-screen flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="background-color: #F3F4F6;">
 <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-md">
  <div class="w-full max-w-md space-y-8">
 <h2 class="mt-2 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Login to your account</h2>

 <form class="space-y-6" action="{{ route('login') }}" method="POST">
 @csrf    
 <div>
 <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
 <div class="mt-2">
 <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
 </div>
 @error('email')
 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
 @enderror
 </div>

 <div>
 <div class="flex items-center justify-between">
 <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
 </div>
 <div class="mt-2">
 <input id="password" type="password" name="password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
 </div>

 @error('password')
 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
 @enderror
 </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm/6 text-gray-900">
                    Remember me 
                </label>
            </div>

            <div class="text-sm">
                <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
        </div>

 <div>
 <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
 <span class="absolute left-0 inset-y-0 flex items-center pl-3">
 <!-- Heroicon name: solid/lock-closed -->
 </span>Login
 </div>
 </form>
  </div>
 </div>
</body>
</html>