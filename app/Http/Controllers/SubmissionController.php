<?php

namespace App\Http\Controllers;

use App\Tables\Submissions;
use App\Models\Submission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Submission\StoreRequest;
use Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.submission.index', [
            'submission' => Submissions::class,
            'pageTitle' => 'Lihat Pengajuan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->validated();

        $post = new Submission;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = uniqid().$file->getClientOriginalExtension();
            Storage::disk('public')->put('submission/'. $fileName, $file);
        }

        $post->name = $request->name;
        $post->nik = $request->nik;
        $post->place_of_birth = $request->place_of_birth;
        $post->date_of_birth = $request->date_of_birth;
        $post->gender = $request->gender;
        $post->religion = $request->religion;
        $post->address = $request->address;
        $post->nationaly = $request->nationaly;
        $post->job = $request->job;
        $post->type = $request->type;
        $post->description = $request->description;
        $post->marital_status = $request->marital_status;
        $post->villager_id = Auth::user()->villager_id;
        $post->status = Submission::STATUS_NEED_VERIF;

        $post->save();

        Toast::title('Berhasil data pengajuan')->autoDismiss(5);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
