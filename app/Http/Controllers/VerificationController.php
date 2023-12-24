<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\Submission;
use App\Tables\Verifications;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.verification.index', [
            'verification' => Verifications::class,
            'pageTitle' => 'Lihat Verifikasi Pengajuan'
        ]);
    }

    public function comment($id_submission) {
        $data = Submission::byHashOrFail($id_submission);
        return view('app.verification.comment', [
            'pageTitle' => 'Verifikasi Pengajuan '. $data->villager->name,
            'submission' => $data
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Verification $verification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Verification $verification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Verification $verification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Verification $verification)
    {
        //
    }
}
