@php
$helpMembers = [
    'Nano' => [
        'displayName' => 'Nano',
        'uuid' => '45418653-fadb-4e6d-8dcc-8c79b90ec527',
        'socials' => [
            [
                'socialName' => 'github',
                'logo' => 'fa-github',
                'url' => 'https://github.com/Nano112',
            ],
            [
                'socialName' => 'discord',
                'logo' => 'fa-discord',
                'url' => 'https://discord.com/users/117732348455419911',
            ],
            [
                'socialName' => 'reddit',
                'logo' => 'fa-reddit',
                'url' => 'https://www.reddit.com/user/Nano_R',
            ],
        ],
    ],
    'Cmoa' => [
        'displayName' => 'Cmoa',
        'uuid' => '75253c0b-5c34-4019-aa30-82edda5dcb75',
        'socials' => [
            [
                'socialName' => 'reddit',
                'logo' => 'fa-reddit',
                'url' => 'https://www.reddit.com/user/cmoa58',
            ],
        ],
    ],
    'SpaceWalker' => [
        'displayName' => 'SpaceWalker',
        'uuid' => 'aa988596-1e1a-49e8-ad26-c4255d27a0b4',
        'socials' => [
            [
                'socialName' => 'reddit',
                'logo' => 'fa-reddit',
                'url' => 'https://www.reddit.com/user/SpaceWalkerRS',
            ],
        ],
    ],
    'Feenix' => [
        'displayName' => 'Feenix',
        'uuid' => 'a25e8a24-8657-4238-885f-2641d19d8e57',
        'socials' => [

        ],
    ],
    'Storm_' => [
        'displayName' => 'Storm_',
        'uuid' => '5c154040-3e4e-48db-a581-a5c2d7ef7648',
        'socials' => [
        ],
    ],
];

$helperBladeTemplate = '
<div class="help-members">
    @foreach ($helpMembers as $helpMember)
        <div class="help-member">
            <h3 class = "help-member-name">
                {{ $helpMember[\'displayName\'] }}
            </h3>
            <img class="help-member-image" alt="Membre du help : {{ $helpMember[\'displayName\'] }}"
                src="https://mc-heads.net/avatar/{{ $helpMember[\'uuid\'] }}">
            <div class="help-member-socials">
                @foreach ($helpMember[\'socials\'] as $social)
                    <a target="__blank" class="help-member-social" href={{ $social[\'url\'] }}>
                        <i class="fa-brands {{ $social[\'logo\'] }} ">
                        </i>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>';

$helperSection = \Illuminate\Support\Facades\Blade::render($helperBladeTemplate, ['helpMembers' => $helpMembers]);

$segments = [
    [
        'title' => 'What is Quasi-Connectivity?',
        'img_url' => 'https://cdn.discordapp.com/attachments/666735437188038706/911652533309698068/export.png',
        'content' => '<b>Quasi-Connectivity</b> (<b>QC</b> for short) is a behavior related to how blocks are powered on <b>Java Edition only</b>.
        <br><br>
        Some components (<b>pistons</b> and <b>droppers</b> for example) can be activated in a special way.
        If there is a source of power either <b>diagonally or two blocks above</b> them, they would be considered “quasi-powered”.
        <br><br>
        The effectiveness of this powering only takes place <b>once the component gets updated</b>.'
    ],
    [
        'title' => 'What are BUDs?',
        'img_url' => 'https://cdn.discordapp.com/attachments/645775167489966081/988885649434214440/export.png',
        'content' => 'BUD is short for <b>Block Update Detector</b>. It is a technical term for a contraption that reacts to block updates such as blocks being placed or broken for example. BUDs come in many forms, but they all work on the same basic premise: get a block in an <b>invalid state</b>. The BUD is then “primed” and will trigger when the block receives a block update.
        <br><br>
        For example, placing a block (usually) only causes block updates to the six blocks around. This means you can turn a piston into a BUD by placing a redstone block two blocks above it. It will not update the piston, but the redstone block will QC-power the piston. When the piston gets a block update from elsewhere, it will start extending.'
    ],
    [
        'title' => 'BUD examples',
        'img_url' => 'https://cdn.discordapp.com/attachments/645775167489966081/988924176633057280/export.png',
        'content' => '<b>Top image</b>: BUD without QC<br>
        The piston was powered when unable to push keeping it in an unstable state.
        <br><br>
        <b>Bottom image</b>: BUD with QC<br>
        The piston is BUDded diagonal. Note: the block on the left is necessary here.'
    ],
    [
        'title' => 'QC applications',
        'img_url' => 'https://cdn.discordapp.com/attachments/645775167489966081/988955650648322128/export.png',
        'content' => 'These are the blueprints for a simple door commonly referred to as the “<b>Jeb door</b>”.
        <br><br>
        This is a <b>2x2 flush door</b> that uses 12 sticky pistons to open a passage through a wall.<br>
        It first appeard <a href="https://www.youtube.com/watch?v=uZJr86d2IUo&t=160s">here</a> in August 2011 during the 1.7 release of the Beta edition.'
    ],
    [
        'title' => 'Credits',
        'img_url' => '',
        'content' => $helperSection
    ]
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
                        <h2 class="my-3 text-4xl font-bold text-center">{{ $segment['title'] }}</h2>
                        <div class="justify-around sm:flex">
                            @if($segment['img_url'])
                                <img src="{{ $segment['img_url'] }}" alt=" {{ $segment['title'] }}"
                                class="p-4 sm:max-w-xl sm:max-h-xl object-contain m-auto md:m-0 md:w-1/2 md:h-1/2 {{ $loop->iteration % 2 ? 'order-last' : '' }}"
                                style="max-height: 50vh;">
                            @endif
                            <div class="self-center p-4 m-auto text-sm sm:text-lg md:m-0 xs:max-w-full {{ $segment['img_url'] ? 'max-w-xl' : '' }}">
                                {!! $segment['content'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <button @click="isPost = true; window.scrollTo(0, 0)"
        class=" m-2 bg-primary text-white font-bold py-2 px-4 rounded-full w-[fit-content] self-center fixed z-10 bottom-0">
        <span class="inline-block font-bold text-white rounded-full bg-primary">
            <i class="fas fa-arrow-left"></i>
        </span>
    </button>
</div>
