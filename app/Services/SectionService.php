<?php

namespace App\Services;

use App\Section;
use Illuminate\Support\Facades\DB;

class SectionService
{
    public $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function uploadLogo($request, $section)
    {
        return $request->file('logo')->store('logo/' . $section->id, 'public');
    }

    public function create($request)
    {
        try {

            DB::beginTransaction();

            $section = $this->section->create($request->all());

            $logo = $this->uploadLogo($request, $section);

            $section->update(['logo' => $logo]);

            $section->users()->attach($request->user_id);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function all()
    {
        return $this->section->with('users')->paginate(4);
    }

    public function find($id)
    {
        return $this->section->with('users')->get()->find($id);
    }

    public function delete($id)
    {
        $section = $this->section->find($id);
        return $section->delete();
    }
}
