<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Doctor;
use App\User;
use App\Comment;

class ArticleController extends BaseController
{
    
    public function index(Request $request) {
        //AuthUser
        
        $q = $request['q'];
        $users_id = $request['users_id'];
        $doctors= User::where('type','doctor')->where('active',1)->get();
        $posts = Post::whereRaw('true');

        if ($q)
            $posts->whereRaw('(title like ? or summary like ? or users_id in (select id from users where name like ?))', ["%$q%", "%$q%", "%$q%"]);

        if ($users_id)
            $posts->where('users_id', $users_id);

        $posts = $posts->paginate(2)
                ->appends(['q' => $q, '$users_id' => $users_id]);

        return view('admin.post.index')
                        ->with('title', 'List Posts')
                        ->with('posts', $posts)
                        ->with('doctors', $doctors);
    }

    public function create() {
        return view('admin.post.create')
                        ->with('title', 'Create New Post');
    }

    public function store(PostRequest $request) {
        
        $user = \Auth::user();
        //dd($user->id);
        $photo = '';
        if ($request->hasFile('flePhoto')) {
            $photo = basename($request->flePhoto->store('public/images'));
        }
        $request['photo'] = $photo;
        $request['users_id'] = $user->id;
        //dd($request['users_id']);
        $q = Post::create($request->all());
        //dd($q);
        \Session::flash('msg', 's:Post Created Successfully');
        return redirect('/admin/post/create');
    }

    /********************* Comments********************/

    public function comments($id) {
        $post = Post::find($id);
        $comment = Comment::all();

        return view('admin.post.allComments')
                        ->with('title', 'All Posts')
                        ->with('post', $post)
                        ->with('comments', $comment);
    }

    public function addComment($id) {
        $post = Post::find($id);
        return view('admin.post.createComment')
                        ->with('title', 'Create New Comment')
                        ->with('post', $post);
    }

    public function postAddComment(Request $request,$id) {
        $user = \Auth::user();
        
        $request->validate([
            'body' => 'required|max:250'
        ]);
        $request['users_id'] = $user->id;
        $request['posts_id'] = $id;
        Comment::create($request->all());
        \Session::flash('msg', 's:Comment Created Successfully');
        return redirect('/admin/post');
    }

     public function delete($id) {
        $comment = Comment::find($id);
        $comment->delete();
        \Session::flash('msg', 's:Comment Deleted Successfully');
        return redirect('/admin/post');
    }
    
    public function show($id) {
        //
    }

    public function edit($id)
    {
        $item = Post::find($id);
        if(!$item){
            \Session::flash('msg','e:Invalid Item ID');
            return redirect('/admin/article');        
        }
        return view('admin.post.edit')->with('title','Edit Post')
            ->with('item',$item);
    }

    
    public function update($id, PostRequest $request)
    {
        $photo='';
        $item = Post::find($id);
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
            //$item->image = $photo;
        }
         $request['photo'] = $photo;
       // dd($photo);
        $item->update($request->all());
      //dd($item);
        \Session::flash('msg','s:Post Updated Successfully');
        return redirect('/admin/post');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        \Session::flash('msg', 's:Post Deleted Successfully');
        return redirect('/admin/post');
    }

}


