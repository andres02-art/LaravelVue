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
        $Book = new Book($request->all());
        $this->loadImage($request, $Book);
        $Book->save();
        if ($request->ajax()) response()->json(['Book' => $Book]);
        return back()->with('succes', 'Libro creado');
    }

    public function update(Book $Book, UpdateBookRequest $request)
    {
        $requestArray = $request->all();
        $this->loadImage($request, $Book);
        $requestArray['image'] = $Book->image;
        $Book->update($requestArray);
        if ($request->ajax()) response()->json(['Book' => $Book]);
        return back()->with('succes', 'Libro actualizado');
    }

    /**
      @param Class $Book Book object for upload image
      @param Class $request Request with image file
     */

    private function loadImage($request, &$Book)
    {
        if (!isset($request->image)) return;
        $random = Str::random(20);
        $image_name = "{$random}.{$request->image->clientExtension()}";
        $request->image->move(storage_path('app/public/images'), $image_name);
        $Book->image = $image_name;
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
