<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookResource;
use DB;

class BookController extends BaseController
{
    public function index()
    {
        $books = Book::all();

        return $this->sendResponse(BookResource::collection($books), 'Books retrieved successfully');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'detail'=>'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }

        $book = Book::create($input);
        return $this->sendResponse(new BookResource($book), ' Book created successfully');

    }

    public function show($id)
    {
        $book = Book::find($id);
        if(is_null($book)){
            return $this->sendError('Book not found.');
        }
        return $this->sendResponse(new BookResource($book), ' Book retrievd successfully');

    }

    public function update(Request $request, Book $book)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'detail'=>'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }


        $book->name = $input['name'];
        $book->detail = $input['detail'];
        $book->save();

        return $this->sendResponse(new BookResource($book), ' Book updated successfully');

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse([], ' Book deleted successfully');

    }


}

