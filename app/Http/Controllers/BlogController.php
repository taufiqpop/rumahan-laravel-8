<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.blog.list', [
            'title' => 'Blog'
        ]);
    }

    public function data(Request $request)
    {
        $list = Blog::select('id', 'title', 'body', 'created_at');

        return DataTables::of($list)
            ->addIndexColumn()
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        try {
            $blog = Blog::create([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);

        try {
            $blog = Blog::find($request->id);

            $blog->title = $request->title;
            $blog->body = $request->body;

            if ($blog->isDirty()) {
                $blog->save();
            }

            if ($blog->wasChanged()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $blog = Blog::find($request->id);

            if ($blog->delete()) {
                return response()->json(['status' => true], 200);
            };

            // if ($blog->trashed()) {
            //     return response()->json(['status' => true], 200);
            // }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
