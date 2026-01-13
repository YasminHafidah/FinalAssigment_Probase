<x-layoutMasuk>
    @section('title', 'Login - ProBase')
    <div class="grid min-h-screen grid-cols-1 grid-rows-[auto_1fr] md:grid-cols-2 md:grid-rows-none">

        <div class="items-center justify-center bg-[#0B132B] p-5 md:flex md:p-12 md:order-last">
            <div class="text-center">
                <h1 class="font-erica text-8xl font-bold text-[#E8F1F2]">ProBase</h1>
                <p class="mx-auto mt-4 max-w-md text-lg font-semibold text-[#E49273]">
                    “E-Learning berbasis fase Database Design untuk pembelajaran Perancangan Basis Data”
                </p>
            </div>
        </div>


        <div class="flex flex-col items-center justify-center p-8 md:p-12 bg-[#E8F1F2] md:order-first">
            <div class="w-full max-w-md">
                <h1 class="text-6xl font-extrabold text-[#0B132B] text-center">Halo!</h1>
                <h2 class="text-2xl font-semibold text-[#0B132B] text-center">Masuk ke akunmu</h2>
                <div class="mt-5 items-center space-y-6">
                    <form class="space-y-6" action="{{ route('user.login') }}" method="POST">
                        @csrf
                        <div class="flex items-center space-x-3 rounded-3xl bg-[#E49273] px-5 py-2 shadow-lg">
                            <span class="flex items-center justify-center bg-[#8093F1] rounded-full shrink-0 p-3">
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                    fill="none">
                                    <path
                                        d="M40 42V38C40 35.8783 39.1571 33.8434 37.6569 32.3431C36.1566 30.8429 34.1217 30 32 30H16C13.8783 30 11.8434 30.8429 10.3431 32.3431C8.84285 33.8434 8 35.8783 8 38V42M32 14C32 18.4183 28.4183 22 24 22C19.5817 22 16 18.4183 16 14C16 9.58172 19.5817 6 24 6C28.4183 6 32 9.58172 32 14Z"
                                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input type="text" name="username" id="username" placeholder="Username" required
                                class="w-full bg-transparent text-lg text-[#0B132B] placeholder-gray-700 border-none focus:ring-0">
                        </div>
                        {{-- password --}}
                        <div class="flex items-center space-x-3 rounded-3xl bg-[#E49273] px-5 py-2 shadow-lg">
                            <span class="flex items-center justify-center bg-[#8093F1] rounded-full shrink-0 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 48 48"
                                    fill="none">
                                    <path
                                        d="M42.0005 4L38.0005 8M38.0005 8L44.0005 14L37.0005 21L31.0005 15M38.0005 8L31.0005 15M22.7806 23.22C23.8132 24.2389 24.6342 25.4521 25.1961 26.7896C25.758 28.1271 26.0497 29.5625 26.0546 31.0133C26.0595 32.464 25.7773 33.9014 25.2244 35.2426C24.6714 36.5838 23.8587 37.8025 22.8328 38.8283C21.807 39.8541 20.5884 40.6669 19.2472 41.2198C17.9059 41.7728 16.4685 42.0549 15.0178 42.0501C13.5671 42.0452 12.1316 41.7534 10.7941 41.1915C9.45663 40.6296 8.24348 39.8087 7.22455 38.776C5.22081 36.7014 4.11207 33.9228 4.13713 31.0386C4.1622 28.1544 5.31906 25.3955 7.35854 23.356C9.39803 21.3165 12.157 20.1596 15.0411 20.1346C17.9253 20.1095 20.7039 21.2183 22.7785 23.222L22.7806 23.22ZM22.7806 23.22L31.0005 15"
                                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input type="password" name="password" id="password" autocomplete="current-password"
                                placeholder="Password" required
                                class="w-full bg-transparent text-lg text-[#0B132B] placeholder-gray-700 border-none focus:ring-0">
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-2xl bg-[#0B132B] px-3 py-1.5 text-2xl font-bold text-white shadow-lg hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk
                            </button>
                        </div>
                    </form>

                    <a href="{{ route('google.redirect') }}"
                        class="flex w-full items-center justify-center space-x-3 rounded-3xl border-2 border-[#0B132B] bg-transparent px-3 py-3 text-lg font-bold text-[#0B132B] shadow-lg hover:bg-[#8093F1]">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z" />
                            <path fill="#FF3D00"
                                d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z" />
                            <path fill="#4CAF50"
                                d="m24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238C29.211 35.091 26.715 36 24 36c-5.202 0-9.619-3.108-11.28-7.481l-6.522 5.025C9.505 39.556 16.227 44 24 44z" />
                            <path fill="#1976D2"
                                d="M43.611 20.083H42V20H24v8h11.303c-.792 2.237-2.231 4.166-4.087 5.571l6.19 5.238C41.002 34.61 44 28.718 44 24c0-1.341-.138-2.65-.389-3.917z" />
                        </svg>
                        <span>Masuk/Daftar dengan akun Google</span>
                    </a>
                    <div>
                        <p class="mt-10 text-center text-sm text-[#0B132B]">
                            Belum punya akun?
                            <a href="/register" class="font-semibold text-[#8093F1] hover:text-indigo-500">Daftar
                                Akun</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>


</x-layoutMasuk>
