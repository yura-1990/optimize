<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::query()->with('user')->whereNot('created_at', null)->get()
        // $posts = Post::query()->with('user')->paginate(56);
        // $posts = collect(); // Create an empty collection to hold the posts

        // DB::table('posts')->orderBy('id')->chunk(1000, function ($chunk) use ($posts) {
        //     $posts->push($chunk); // Append the chunk of posts to the collection
        // });

        // $posts = []; // Initialize an array to hold the posts data

        // DB::table('posts')
        //     ->orderBy('id')
        //     ->whereNotNull('created_at')
        //     ->chunk(1000, function ($records) use (&$posts) {
        //         foreach ($records as $record) {
        //             // Format the data as needed
        //             $formattedRecord = [
        //                 'id' => $record->id,
        //                 'title' => $record->title,
        //                 'content' => $record->content,
        //                 'image' => $record->image,
        //                 // Add more fields as needed
        //             ];

        //             // Append the formatted record to the posts array
        //             $posts[] = $formattedRecord;
        //         }
        //     });

        $posts = Cache::rememberForever('post-page-' . request('page', 1), function(){
            return Post::query()->with('user')->orderBy('id', 'DESC')->paginate(56);
        });

        return view('dashboard', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create(Request $request)
    {
        Post::create([
            'title' => 'Privet',
            'content' => 'Privet privet',
            'image' => 'img/1.webp',
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
