<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(8);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required|integer',
        ]);
        Book::create($request->all());
        session()->flash('success', 'Thêm mới thành công!');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        request()->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required|integer',
        ]);
        $book->update($request->all());
        session()->flash('success','Cập nhật thành công');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        try{
//            $borrows = Borrow::where('book_id', $id)->get();
//            foreach ($borrows as $borrow) {
//                if($borrow->status === 0){
//                    $borrow->delete();
//                    Book::destroy($id);
//                    session()->flash('success', 'Xóa thành công!');
//                }
//                else if($borrow->status === 1){
//                   break;
//                }
//            }
//        }
//        catch(QueryException $e){
//            session()->flash('success', 'Sách vẫn đang mượn không được xóa');
//        }
        $borrows = Borrow::where('book_id', $id)->get();
        foreach ($borrows as $borrow) {
            if ($borrow->status === 0) {
                $borrow->delete();
                Book::destroy($id);
                session()->flash('success', 'Xóa thành công!');
            }
            else if ($borrow->status === 1){
                session()->flash('success', 'Sách vẫn đang mượn không được xóa');
                break;
            }
        }
        return redirect()->route('books.index');
    }
}
