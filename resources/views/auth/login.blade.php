<x-guest-layout>
    <div >
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg m-auto">
            <div class="">
                <h1 class="text-2xl font-bold text-gray-800" style="font-size: 30px; font-weight: bold; font-family:helvetica;;">Sign In</h1>
                <p class="text-gray-600 mt-1">Sign in and get started on your projects</p>
                <br>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div >
                    <input id="email" type="email" name="email" required class="mt-1 block w-full px-4 py-2 border border-cyan-300 rounded-lg text-gray-700 focus:outline-none focus:border-indigo-200" style="font-size: 14px; padding" placeholder="Example@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div style="margin-top: 15px;">
                    <input id="password" type="password" name="password" required class="mt-1 block w-full px-4 py-2 border border-cyan-300 rounded-lg text-gray-700 focus:outline-none focus:border-indigo-500" style="font-size: 14px;" placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <!-- Forgot Password -->
                <div class="text" style="margin-top: 10px; text-align: right;">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-700 hover:underline">Forgot Password?</a>
                </div>

                <!-- Sign In Button -->
                <div style="margin-top: 20px;">
                    <button type="submit" class="w-full py-2 px-4 text-white text-sm font-semibold  rounded-lg focus:outline-none border-2" style="background-color: #077C0D;"onmouseover="this.style.backgroundColor='#26902B'; this.style.color='white';" 
                    onmouseout="this.style.backgroundColor='#077C0D'; this.style.color='white';">
                    Sign in
                    </button>

                </div>

                <!-- Divider -->
                <div class="flex items-center justify-center space-x-2 mt-4">
                    <hr class="w-1/3 border-gray-300">
                    <span class="text-gray-500">Or</span>
                    <hr class="w-1/3 border-gray-300">
                </div>
                
                <!-- Social Login Buttons -->
                <div style="margin-top: 15px;">
                    <a  class="flex items-center justify-center px-2 py-2 border border-gray-200 bg-gray-300 rounded-lg hover:bg-gray-100">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/IOS_Google_icon.png" alt="Google" class=""style="height: 35px;">
                    </a>
                </div>
            </form>

            <!-- Sign Up Link -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Don’t you have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Sign up</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>

