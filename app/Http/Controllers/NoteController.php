<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::with('category:name')->get();
        return view('Note.index', compact('notes'));
    }

    public function create(){
        $note = new Note();
        $categories = Category::all();
        return view('Note.create', compact('note', 'categories'));
    }

    public function show(string $id){
        $note = Note::with('category')->findOrFail($id);
        return view('Note.show', compact('note'));

    }

    public function edit(string $id){
        $note = Note::findOrFail($id);
        $categories = Category::all();
        return view('Note.edit', compact('note', 'categories'));
    }

    public function update(NoteRequest $request, string $id){
        $note = Note::findOrFail();
    }
}
