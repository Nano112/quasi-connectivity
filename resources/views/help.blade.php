@php
$segments = [
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => 'Quasi-Connectivity (QC for short) is behavior related to how blocks are powered.While most blocks, like lamps, note blocks, fence gates, etc. can only be powered “normally”, certain components can be “quasi-powered” or “qc-powered”. This means that they consider themselves powered if the block above them is powered.',
    ],
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => 'Quasi-Connectivity (QC for short) is behavior related to how blocks are powered.While most blocks, like lamps, note blocks, fence gates, etc. can only be powered “normally”, certain components can be “quasi-powered” or “qc-powered”. This means that they consider themselves powered if the block above them is powered.',
    ],
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => 'Quasi-Connectivity (QC for short) is behavior related to how blocks are powered.While most blocks, like lamps, note blocks, fence gates, etc. can only be powered “normally”, certain components can be “quasi-powered” or “qc-powered”. This means that they consider themselves powered if the block above them is powered.',
    ],
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => 'Quasi-Connectivity (QC for short) is behavior related to how blocks are powered.While most blocks, like lamps, note blocks, fence gates, etc. can only be powered “normally”, certain components can be “quasi-powered” or “qc-powered”. This means that they consider themselves powered if the block above them is powered.',
    ],
];
@endphp


<div class="text-white snap-y snap-mandatory">
    @foreach ($segments as $segment)
        <div class="flex items-center justify-center h-screen snap-start">
            <div class="flex flex-wrap -mx-4 overflow-hidden">
                <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown= false">
                    <div x-show="shown" x-transition.delay.50ms>
                        <div class="fixed top-1/2 left-1/2" style="transform: translate(-50%, -50%);">
                            <div class="bg-red-300">
                                <h1 class="text-2xl font-bold">{{ $segment['title'] }}</h1>
                                <div class="flex justify-around">
                                    <div class="p-2 {{ $loop->iteration % 2 ? 'order-last' : '' }}">
                                        <img src="{{ $segment['img_url'] }}" alt="" class="max-w-none">
                                    </div>
                                    <div class="p-2">

                                        <p class="text-sm">{{ $segment['content'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
