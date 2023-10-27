<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
        <div class="grid grid-rows-4 grid-flow-col gap-4">
            @foreach($posts as $post)
                <div class="border shadow">
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-[400px] object-cover">
                    <div class="p-4">
                        <p class="font-semibold text-[22px]">{{ $post->title }}</p>
                        <p>{{ $post->content }}</p>
                        <p class="font-semibold mt-4 flex justify-between">{{ $post->user->name }} <span>{{ $post->user->created_at }}</span></p>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $posts->links() }}
    </div>
</x-app-layout>
