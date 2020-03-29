<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\SectionRequest as Request;
use App\Services\SectionService as Section;

class SectionController extends Controller
{
    public $section;

    public $user;

    public function __construct(Section $section, User $user)
    {
        $this->section = $section;

        $this->user = $user;

    }

    public function index()
    {
        $sections = $this->section->all();

        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $users = $this->user->all();

        return view('sections.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->section->create($request);

        return redirect()->route('sections.index');
    }

    public function edit($id)
    {
        $users = $this->user->all();

        $section = $this->section->find($id);

        return view('sections.edit', compact('users', 'section'));
    }

    public function destroy($id)
    {
        $this->section->delete($id);

        return redirect()->route('sections.index');

    }
}
