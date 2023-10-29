<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
        <div class="post-grid">
            @foreach($posts as $item)
                <a href="{{ route('post.show', ['post' => $item->id]) }}" class="border shadow">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-[400px] object-cover">
                    <div class="p-4">
                        <p class="font-semibold text-[22px]">{{ $item->title }}</p>
                        <p>{{ $item->content }}</p>
                        <p class="font-semibold mt-4 flex justify-between">{{ $item->user->name }} <span>{{ $item->user->created_at }}</span></p>
                    </div>
                </a>

            @endforeach

        </div>
        {{ $posts->links() }}
    </div>
</x-app-layout>
