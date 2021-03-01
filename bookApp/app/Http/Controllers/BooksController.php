<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class BooksController extends Controller
{
    public function show(){
        $id=auth()->user()->id;
        $user=User::find($id);
        $data=$user->books;
        return view('dashboard')->with('data',$data);
}

    public function add(){
        return view('add');
    }

    public function create(Request $request){
        $this->validate($request, ['name'=>'required','detail'=>'required']);
        $book = new Book();
        $book->name=$request->name;
        $book->detail=$request->detail;
        $book->user_id=auth()->user()->id;
        $book->save();
        return redirect('/dashboard');
    }

    public function edit(Book $book){
        if(auth()->user()->id==$book->user_id){
            return view('edit',compact('book'));
        }else{
            return redirect('/dashboard');
        }
    }

    public function update(Request $request, Book $book){
        if(isset($_POST['delete'])){
            $book->delete();
            return redirect('/dashboard');
        }else{
        $this->validate($request, ['name'=>'required','detail'=>'required']);
        $book->name=$request->name;
        $book->detail=$request->detail;
        $book->save();
        return redirect('/dashboard');
        }
    }
}
