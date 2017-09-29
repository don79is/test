<?php namespace App\Http\Controllers;

use App\Models\TestPosts;
use App\Models\TestUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Uuid;


class TestPostsController extends Controller
{
public function allPostsFrontEnd(){
    $conf['lists'] = TestPosts::get()->toArray();

    return view('user.all-posts', $conf);
}
    /**
     * Display a listing of the resource.
     * GET /testposts
     *
     * @return Response
     */
    public function index()
    {

        $conf['lists'] = TestPosts::get()->toArray();
//        $conf['edit'] = 'app.posts.edit';
//        $conf['delete'] = 'app.posts.delete';
//        $conf['show'] = 'app.posts.show';
//        $conf['user_id'] = Auth::user()->name;

//dd($conf);


        return view('user.all-posts', $conf);
    }

    /**
     * Show the form for creating a new resource.
     * GET /testposts/create
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /testposts
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //HTML INPUT name="path"
        if ($request->hasFile('path')) {
            $image = Input::file('path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //image resizer before move
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
        }
        TestPosts::create([
            'id' => Uuid::uuid4(),
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'text' => $request->text,
            'path' => $filename,
            'image' => $image,
        ]);
        return redirect(route('app.posts.index'));
    }

    /**
     * Display the specified resource.
     * GET /testposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $post = TestPosts::find($id);

//        dd($post);
//        $data = ([
//            'id' => $id,
//            'post' => $post
//        ]);
        return view('user.post')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     * GET /testposts/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public
    function edit($id)
    {
        $post = TestPosts::find($id);

        return view('user.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     * PUT /testposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public
    function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /testposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        TestPosts::destroy($id);

        return redirect(route('app.posts.index'));
    }

}