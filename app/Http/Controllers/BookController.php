<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['books' => Book::with('Author', 'Category')->get()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            DB::beginTransaction();
            $Book = new Book($request->all());
            $Book->save();
            DB::commit();
            return back()->with(session('success', 'Libro creado'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(session('error', "{$th}, a ocurrido"));
        }
    }

    /**
      @param Class $Book Book object for upload image
      @param Class $request Request with image file
     */
    private function loadImage($Book, $request):object
    {
        if (!isset($request->image)) return $Book;
        $image_name = "{Str::random(30)}.{$request->image->clientExtension()}";
        $request->image->move(storage_path('app/public/images', $image_name));
        $Book->image = $image_name;
        return $Book;
    }


    /**
     * Display the specified resource.
     */


    public function show(User $User)
    {
        $BooksByUser = $this->getAllBooksByUser($User);
        return view('layouts.books.indexBook', compact('BooksByUser'));
    }

    public function showBooks()
    {
        $Books = Book::with('Lends.CustomUser')->get();
        return view('layouts.books.indexBook', compact('Books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $Book)
    {
        try {
            DB::beginTransaction();
            $Book->update($request->all());
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $Book)
    {
        try {
            DB::beginTransaction();
            $Book->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    private function getAllBooksByUser(User $User)
    {
        return response()->json([Book::with('Lends.UserCustom', 'Lends.UserOwner')], 200);
    }
}
