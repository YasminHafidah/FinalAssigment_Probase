<x-Layout>
    @section('title', 'Dashboard - ProBase')
    <div class="text-center leading-[120%] py-24">
        <h1 class="text-6xl font-extrabold tracking-normal leading-normal text-balance text-primary ">
            Selamat Datang di ProBase!</h1>
        <p class="mt-8 text-2xl font-medium text-pretty text-gray-500 sm:text-2xl">E-Learning untuk Pembelajaran
            Perancangan Basis Data</p>
        <div class="mt-20 flex items-center justify-center gap-x-6">
            <a href="/materi"
                class="rounded-md bg-[#0B132B] px-12 py-5 text-2xl font-extrabold text-white shadow-xs hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                E-Modul</a>
            <a href="/project"
                class="rounded-md bg-[#E49273] border-2 border-[#0B132B] px-12 py-5 text-2xl font-extrabold text-[#0B132B] shadow-xs hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Project</a>
        </div>
    </div>
</x-Layout>
