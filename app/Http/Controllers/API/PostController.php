<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Post[]|Collection|Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Collection|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' ,
            'image' => 'required' ,
            'description' => 'required' ,
        ]);

        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Collection|Response
     */
    public function show(int $id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Collection|Response
     */
    public function update(Request $request, int $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return Post::destroy($id);
    }
}
