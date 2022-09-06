@php
    $post = $post ?? true;
@endphp
<x-app-layout>
    <div x-cloak x-data="{isPost : {{ $post ? 'true' : 'false' }}}"
    @popstate.window="isPost = window.location.hash == '';"
    @pushstate.window="isPost = window.location.hash == '';">
        @animate_opacity(isPost)
        @include('post')
        @endanimate
        @animate_opacity(!isPost)
        @include('help')
        @endanimate
    </div>
</x-app-layout>
