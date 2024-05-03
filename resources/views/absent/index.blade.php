<x-universal-layout>
    <section class="container w-full bg-slate-50 h-[85vh] p-5 rounded-lg">
        <section class="top-box w-full flex flex-col md:flex-row gap-4 h-[60vh] md:h-[30vh]">
            {{-- jumlah laporan izin --}}
            <div class="box1 rounded-lg p-3 w-full h-full bg--300 shadow-lg ">
                <div class="icon w-12">
                    <dotlottie-player src="https://lottie.host/6761cf88-fa33-4927-9fce-10d8f14f5ef0/RIbMwGQsgs.json" background="transparent" speed="0.5" loop autoplay></dotlottie-player>

                </div>
            </div>
            {{-- jumlah laporan tidak diterima --}}
            <div class="box2 rounded-lg p-3 w-full h-full shadow-lg">
                <div class="icon w-12">
                    <dotlottie-player src="https://lottie.host/574aee2c-7a02-420e-94f6-1decd4d1dfdb/fxttvViiuV.json" background="transparent" speed="0.5" loop autoplay></dotlottie-player>

                </div>
            </div>
            {{-- jumlah laporan diterima --}}
            <div class="box3 rounded-lg p-3 w-full h-full shadow-lg">
                <div class="icon w-12">
                    <dotlottie-player src="https://lottie.host/66f50242-6198-48fd-b325-1cc269a4f615/4JGZFiAUoV.json" background="transparent" speed="0.5" loop autoplay></dotlottie-player>

                </div>
            </div>
        </section>
    
        {{-- Grafik --}}
    
        <section class="bot-box">
            
        </section>
    </section>
    
</x-universal-layout>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 