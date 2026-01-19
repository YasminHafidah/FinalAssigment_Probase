<x-layout>
    @section('title', 'Profile - ProBase')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-extrabold tracking-normal leading-normal text-balance text-[#0B132B]">
            Profile
        </h1>

        <a href="{{ route('profile.edit') }}"
            class="px-4 py-2 bg-[#8093F1] text-[#0B132B] rounded-2xl hover:bg-[#E49373] font-bold flex items-center cursor-pointer">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" viewBox="0 0 34 34" fill="none">
                    <path
                        d="M15.584 5.66667H5.66732C4.91587 5.66667 4.1952 5.96518 3.66385 6.49654C3.1325 7.02789 2.83398 7.74856 2.83398 8.50001V28.3333C2.83398 29.0848 3.1325 29.8055 3.66385 30.3368C4.1952 30.8682 4.91587 31.1667 5.66732 31.1667H25.5007C26.2521 31.1667 26.9728 30.8682 27.5041 30.3368C28.0355 29.8055 28.334 29.0848 28.334 28.3333V18.4167M26.209 3.54167C26.7726 2.97809 27.537 2.66147 28.334 2.66147C29.131 2.66147 29.8954 2.97809 30.459 3.54167C31.0226 4.10526 31.3392 4.86964 31.3392 5.66667C31.3392 6.4637 31.0226 7.22809 30.459 7.79167L17.0007 21.25L11.334 22.6667L12.7507 17L26.209 3.54167Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span>Edit Profile</span>
        </a>
    </div>
    <h2 class="text-sm font-bold tracking-normal leading-normal text-balance text-red-900">
        Hanya bisa edit nama dan kelas saja
    </h2>

    <div class="mt-5 grid grid-cols-[auto_1fr] gap-y-6 items-center">
        <span
            class="justify-center bg-[#E49273] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-md md:text-lg border-[#0B132B] border-2 shadow-lg">
            Username
        </span>
        <div
            class="w-full p-3 text-md md:text-lg text-[#0B132B] placeholder-gray-500 border-[#0B132B] border-2 focus:ring-0 rounded-3xl bg-[#E8F1F2] shadow-lg flex items-center justify-between">
            <span>{{ $user->username }}</span>
        </div>
        <span
            class="justify-center bg-[#E49273] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-md md:text-lg border-[#0B132B] border-2 shadow-lg">
            Nama Lengkap
        </span>
        <div
            class="w-full p-3 text-md md:text-lg text-[#0B132B] placeholder-gray-500 border-[#0B132B] border-2 focus:ring-0 rounded-3xl bg-[#E8F1F2] shadow-lg flex items-center justify-between">
            <span>{{ $user->nama }}</span>
        </div>
        <span
            class="justify-center bg-[#E49273] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-md md:text-lg border-[#0B132B] border-2 shadow-lg">
            Kelas
        </span>
        <div
            class="w-full p-3 text-md md:text-lg text-[#0B132B] placeholder-gray-500 border-[#0B132B] border-2 focus:ring-0 rounded-3xl bg-[#E8F1F2] shadow-lg flex items-center justify-between">
            <span>{{ $user->kelas }}</span>
        </div>
        <span
            class="justify-center bg-[#E49273] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-md md:text-lg border-[#0B132B] border-2 shadow-lg">
            Email
        </span>
        <div
            class="w-full p-3 text-md md:text-lg text-[#0B132B] placeholder-gray-500 border-[#0B132B] border-2 focus:ring-0  rounded-3xl bg-[#E8F1F2] shadow-lg">
            {{ $user->email }}
        </div>
    </div>
    <div class="text-center items-center mt-3">
        <form method="POST" action="{{ route('logout') }}" class="items-center justify-center cursor-pointer">
            @csrf
            <button type="submit"
                class="bg-red-800 hover:bg-red-900 border-2 border-[#0B132B] text-center px-20 py-3 rounded-2xl text-white font-bold">
                Log Out
            </button>
        </form>
    </div>
</x-layout>
