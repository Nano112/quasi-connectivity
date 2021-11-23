<x-app-layout>
    <div class="flex items-center justify-center h-screen w-full">
        <div x-data="{ shown: false }" x-intersect:enter.full="shown = true" x-intersect:leave.full="shown = false">

            <div x-show="shown" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">


                <div x-data="{ finished: false}">
                    <div class="flex justify-center my-4">
                        <div class="mx-auto text-center max-w-7xl" x-data="{
                           text: '',
                           textArray : [' Time since last quasi connectivity discovery'],
                           textIndex: 0,
                           charIndex: 0,
                           typeSpeed: 50,
                        }" x-init="setInterval(function(){
                           let current = $data.textArray[ $data.textIndex ];
                           $data.text = current.substring(0, $data.charIndex);
                           $data.charIndex += 1;
                        }, $data.typeSpeed);
                    ">
                            <h1 class="font-mono text-4xl font-black text-white uppercase md:text-8xl" x-text="text">
                            </h1>
                        </div>
                    </div>

                    <div>
                        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            @livewire('post.counter')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ shown: false }" x-intersect:enter.full="shown = true">
        <div class="flex items-center justify-center min-h-full w-full">
            <div class="w-full" x-show="shown" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                @auth
                    <div class="py-12">
                        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            @livewire('post.form')
                        </div>
                    </div>
                @endauth


                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        @livewire('post.show')
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
