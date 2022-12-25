<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiaryController extends Controller
{
    // Show all diaries
    public function index() {
        return view('diaries.index', [
            'diaries' => Diary::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    //Show single diary
    public function show(Diary $diary) {
        return view('diaries.show', [
            'diary' => $diary
        ]);
    }

    // Show Create Form
    public function create() {
        return view('diaries.create');
    }

    // Store Diary Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Diary::create($formFields);

        return redirect('/')->with('message', 'Diary created successfully!');
    }

    // Show Edit Form
    public function edit(Diary $diary) {
        return view('diaries.edit', ['diary' => $diary]);
    }

    // Update Diary Data
    public function update(Request $request, Diary $diary) {
        // Make sure logged in user is owner
        if($diary->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $diary->update($formFields);

        return back()->with('message', 'Diary updated successfully!');
    }

    // Delete Diary
    public function destroy(Diary $diary) {
        // Make sure logged in user is owner
        if($diary->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $diary->delete();
        return redirect('/')->with('message', 'Diary deleted successfully');
    }

    // Manage Diaries
    public function manage() {
        return view('diaries.manage', ['diaries' => auth()->user()->diaries()->get()]);
    }
}


