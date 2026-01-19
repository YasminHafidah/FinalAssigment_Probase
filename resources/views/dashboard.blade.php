<x-layout>
    @section('title', 'Dashboard - ProBase')

    <div class="flex flex-col space-y-20 pb-20">

        <section class="max-w-7xl mx-auto px-6 pt-12 md:pt-20 w-full">
            {{-- Grid akan menjadi 1 kolom di HP dan 2 kolom di Laptop --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                {{-- KOLOM GAMBAR: Muncul pertama di HP (order-1), Muncul kedua di Laptop (md:order-2) --}}
                <div class="flex justify-center md:justify-end order-1 md:order-2">
                    <img src="/img/dashboard.png" alt="Ilustrasi Belajar"
                        class="w-3/4 md:w-full max-w-md drop-shadow-xl hover:scale-105 transition-transform duration-500">
                </div>

                {{-- KOLOM TEKS: Muncul kedua di HP (order-2), Muncul pertama di Laptop (md:order-1) --}}
                <div class="text-center md:text-left order-2 md:order-1">
                    <h1 class="text-4xl md:text-6xl font-extrabold tracking-normal leading-tight text-primary">
                        Selamat Datang di <span class="text-[#0B132B]">ProBase!</span>
                    </h1>
                    <p class="mt-6 text-lg md:text-xl font-medium text-gray-600 leading-relaxed text-pretty">
                        Platform E-Learning interaktif untuk menguasai Perancangan Basis Data.
                        Belajar lebih mudah dengan modul terstruktur dan proyek nyata.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                        <a href="/materi"
                            class="w-full sm:w-auto text-center rounded-lg bg-[#0B132B] px-8 py-4 text-xl font-bold text-white shadow-lg hover:bg-[#8093F1] hover:text-white transition-all transform hover:-translate-y-1">
                            🚀 E-Modul
                        </a>
                        <a href="/project"
                            class="w-full sm:w-auto text-center rounded-lg bg-[#E49273] border-2 border-[#0B132B] px-8 py-4 text-xl font-bold text-[#0B132B] shadow-lg hover:bg-[#8093F1] hover:text-white hover:border-[#8093F1] transition-all transform hover:-translate-y-1">
                            💻 Project
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <section class="bg-[#F8FAFC] py-24 px-6 relative overflow-hidden">
            {{-- Aksen dekoratif garis tipis agar terlihat seperti blueprint database --}}
            <div class="absolute inset-0 opacity-[0.05] pointer-events-none"
                style="background-image: radial-gradient(#0B132B 0.5px, transparent 0.5px); background-size: 24px 24px;">
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-[#0B132B] tracking-tighter">
                        Eksplorasi <span class="text-[#8093F1]">Pembelajaran</span>
                    </h2>
                    <div class="h-2 w-24 bg-[#E49273] mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-stretch">

                    <div
                        class="md:col-span-7 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(11,19,43,0.05)] border border-gray-100 flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center gap-4 mb-8">
                                <div class="bg-[#0B132B] text-white p-3 rounded-2xl shadow-lg shadow-blue-900/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold text-[#8093F1] uppercase tracking-widest">Target
                                    Kompetensi</span>
                            </div>
                            <h3 class="text-3xl md:text-4xl font-extrabold text-[#0B132B] leading-tight mb-6">
                                Menerapkan Perancangan Basis Data dan Implementasi SQL (DDL)
                            </h3>
                            <p class="text-gray-500 text-lg leading-relaxed mb-10">
                                Kuasai alur pembuatan database mulai dari identifikasi masalah hingga membangun struktur
                                tabel yang efisien.
                            </p>
                        </div>

                        <details
                            class="group/tp border-2 border-dashed border-gray-200 rounded-3xl overflow-hidden transition-all duration-300 open:border-[#8093F1] open:bg-blue-50/30">
                            <summary
                                class="list-none flex items-center justify-between p-6 cursor-pointer font-bold text-[#0B132B]">
                                <span class="flex items-center gap-2 text-lg">Tujuan Pembelajaran (TP)</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 transition-transform group-open/tp:rotate-180" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="px-8 pb-8 text-gray-600 font-medium space-y-4 text-left">
                                <div class="flex gap-3 items-start italic">
                                    <span
                                        class="bg-[#8093F1] text-white text-xs px-2 py-1 rounded-md mt-1 font-bold">1</span>
                                    <p><span class="font-bold text-[#0B132B]">Merancang Struktur Data (ERD):</span>
                                        Memetakan masalah nyata menjadi diagram basis data konseptual yang bebas
                                        redundansi.</p>
                                </div>
                                <div class="flex gap-3 items-start italic">
                                    <span
                                        class="bg-[#8093F1] text-white text-xs px-2 py-1 rounded-md mt-1 font-bold">2</span>
                                    <p><span class="font-bold text-[#0B132B]">Transformasi & Normalisasi:</span>
                                        Mengubah diagram menjadi skema relasi tabel yang efisien dan bebas dari
                                        kesalahan sistem.</p>
                                </div>
                                <div class="flex gap-3 items-start italic">
                                    <span
                                        class="bg-[#8093F1] text-white text-xs px-2 py-1 rounded-md mt-1 font-bold">3</span>
                                    <p><span class="font-bold text-[#0B132B]">Membangun Database (SQL):</span> Menulis
                                        perintah SQL DDL untuk mendefinisikan tabel, tipe data, dan aturan keamanan
                                        (*constraints*).</p>
                                </div>
                            </div>
                        </details>
                    </div>

                    <div class="md:col-span-5 flex flex-col gap-8">

                        {{-- Card Drive --}}
                        <div
                            class="bg-[#0B132B] rounded-[2.5rem] p-10 flex flex-col justify-between relative overflow-hidden group">
                            <div class="relative z-10">
                                <h4 class="text-[#E49273] font-bold uppercase tracking-widest text-xs mb-4">Library</h4>
                                <h3 class="text-white text-3xl font-bold leading-tight mb-4">Buku<br>Referensi</h3>
                                <p class="text-gray-400 text-sm">E-Book & Jurnal pendukung dalam satu folder Drive.</p>
                            </div>
                            <a href="https://drive.google.com/drive/folders/1KFwdn_dxh5PBIlA5z3DgTEP1TPRwGabO?usp=sharing"
                                target="_blank"
                                class="mt-12 bg-white/10 backdrop-blur-md text-white border border-white/20 py-4 rounded-2xl flex items-center justify-center gap-3 font-bold hover:bg-white hover:text-[#0B132B] transition-all">
                                Buka Google Drive
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>

                        {{-- Card Panduan --}}
                        <div
                            class="bg-[#E49273] rounded-[2.5rem] p-10 flex flex-col justify-between shadow-lg shadow-orange-200/50">
                            <div>
                                <h4 class="text-[#0B132B] font-bold uppercase tracking-widest text-xs mb-4">Manual</h4>
                                <h3 class="text-[#0B132B] text-3xl font-bold leading-tight">Panduan<br>Media</h3>
                            </div>
                            <a href="#"
                                class="mt-12 flex items-center justify-between text-[#0B132B] font-black group">
                                <span class="text-xl">Download PDF</span>
                                <div
                                    class="bg-[#0B132B] text-white p-3 rounded-full group-hover:translate-x-2 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-5xl mx-auto px-6 w-full pt-10">
            <div
                class="bg-white rounded-[3rem] p-10 md:p-16 shadow-[0_10px_50px_rgba(0,0,0,0.03)] border border-gray-100 relative overflow-hidden">
                {{-- Decorative Circle --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#8093F1]/5 rounded-full"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
                    {{-- Kolom Kiri: Profil --}}
                    <div class="flex flex-col items-center md:items-start text-center md:text-left">
                        <div class="relative mb-8">
                            <div
                                class="w-40 h-40 rounded-full overflow-hidden border-4 border-[#0B132B] p-1 bg-white shadow-2xl">
                                <img src="https://ui-avatars.com/api/?name=Yasmin+Hafidah&background=0B132B&color=fff&size=160"
                                    alt="Foto Profil" class="w-full h-full rounded-full object-cover">
                            </div>
                            <div
                                class="absolute bottom-2 right-2 bg-[#E49273] text-[#0B132B] text-sm font-black px-4 py-1.5 rounded-full shadow-lg border-2 border-white">
                                UPI
                            </div>
                        </div>

                        <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest mb-2">Developed By</h3>
                        <h4 class="text-3xl font-black text-[#0B132B] mb-2">Yasmin Hafidah Alqanit</h4>
                        <p class="text-[#8093F1] text-lg font-bold mb-6">Mahasiswa Pendidikan Ilmu Komputer</p>
                        <p class="text-gray-500 leading-relaxed max-w-md">
                            Fokus pada pengembangan media pembelajaran inovatif untuk membantu siswa memahami
                            perancangan basis data secara lebih interaktif dan menyenangkan.
                        </p>
                    </div>

                    {{-- Kolom Kanan: Kontak & Komunitas --}}
                    <div class="bg-[#F8FAFC] rounded-[2rem] p-8 border border-gray-100">
                        <h5 class="text-[#0B132B] text-xl font-black mb-6 flex items-center gap-3">
                            Mari Berdiskusi
                            <span class="w-12 h-1 bg-[#E49273] rounded-full"></span>
                        </h5>

                        <div class="space-y-4">
                            {{-- Ganti link di href dengan link undangan grup WhatsApp kamu --}}
                            <a href="https://chat.whatsapp.com/GkPaoPddHd7EnIGl9aj6CG" target="_blank"
                                class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-gray-50 hover:border-[#25D366] hover:shadow-md transition-all group">
                                <div
                                    class="bg-[#25D366]/10 text-[#25D366] p-3 rounded-xl group-hover:bg-[#25D366] group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col text-left">
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Join
                                        our</span>
                                    <span class="text-sm font-black text-[#0B132B]">WhatsApp Community</span>
                                </div>
                            </a>

                            <a href="https://instagram.com/yasmin_hafidah" target="_blank"
                                class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-gray-50 hover:border-[#E4405F] hover:shadow-md transition-all group">
                                <div
                                    class="bg-[#E4405F]/10 text-[#E4405F] p-3 rounded-xl group-hover:bg-[#E4405F] group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col text-left">
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Follow
                                        us</span>
                                    <span class="text-sm font-black text-[#0B132B]">Instagram</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
