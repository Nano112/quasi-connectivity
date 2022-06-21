<x-app-layout>
    <div x-cloak x-data="{isPost : $persist(true)}">
        @animate_opacity(isPost)
        @include('post')
        {{--  @include('help')  --}}
        @endanimate
        @animate_opacity(!isPost)
        @include('help')
        @endanimate
    </div>
</x-app-layout>
