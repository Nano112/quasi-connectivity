@php

$segments = [
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => '<b>Quasi-Connectivity</b> (<b>QC</b> for short) is a <b>JAVA</b> behavior related to how blocks are powered.
<br><br>
Some components (<b>pistons</b> and <b>droppers</b> for example) can be activated in a special way.
If there is a source of power either <b>diagonally or two blocks above</b> them, they would be considered “quasi-powered”.
<br><br>
The effectiveness of this powering only takes place <b>once the component gets updated</b>.',
    ],
    [
        'title' => 'What are BUDs?',
        'img_url' => 'https://cdn.discordapp.com/attachments/645775167489966081/988885649434214440/export.png',
        'content' => 'BUD is short for <b>Block Update Detector</b>. It is a technical term for a contraption that reacts to block updates such as blocks being placed or broken for example. BUDs come in many forms, but they all work on the same basic premise: get a block in an <b>invalid state</b>. The BUD is then “primed” and will trigger when the block receives a block update.
<br><br>
For example, placing a block (usually) only causes block updates to the six blocks around. This means you can turn a piston into a BUD by placing a redstone block two blocks above it. It will not update the piston, but the redstone block will QC-power the piston. When the piston gets a block update from elsewhere, it will start extending.
',
    ],
    [
        'title' => 'BUD and QC examples',
        'img_url' => 'https://cdn.discordapp.com/attachments/645775167489966081/988924176633057280/export.png',
        'content' => 'Bottom image: BUD without QC (piston was powered when unable to push)
        <br><br>
        Top image: BUD with QC (diagonal). Note: the block on the left is necessary here.'
    ],
        ];
@endphp


<div x-cloak class="text-white ">
    @foreach ($segments as $segment)
        <div class="flex items-center justify-center min-h-screen">
            <div class="flex flex-wrap overflow-hidden">
                <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave=" shown=false ">
                    <div x-show="shown"
                        x-transition:enter="opacity-0 duration-1000"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="opacity-0 duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                        <div class="fixed w-full h-full top-1/2 left-1/2" style="transform: translate(-50%, -50%);">
                            <h2 class="my-4 text-4xl font-bold text-center">{{ $segment['title'] }}</h2>
                            <div class="absolute w-full top-1/2" style="transform: translateY(-50%);">
                                <div class="justify-around sm:flex">
                                    <img src="{{ $segment['img_url'] }}" alt=" {{ $segment['title'] }}"
                                        class="p-4 sm:max-w-xl sm:max-h-xl object-contain m-auto md:m-0 md:w-1/2 md:h-1/2 {{ $loop->iteration % 2 ? 'order-last' : '' }}" style="max-height: 50vh;">
                                    <div class="self-center max-w-xl p-4 m-auto text-sm sm:text-lg md:m-0 xs:max-w-full">
                                        {!! $segment['content'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <button @click="isPost = true; window.scrollTo(0, 0)" class=" m-2 bg-primary text-white font-bold py-2 px-4 rounded-full w-[fit-content] self-center fixed z-10 bottom-0">
        <span class="inline-block font-bold text-white rounded-full bg-primary">
            <i class="fas fa-arrow-left"></i>
        </span>
    </button>
</div>
