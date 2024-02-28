<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\Submission;
use App\Models\User;
use App\Models\Operator;
use App\Mail\NotificationSubmission;
use App\Mail\NotificationVerification;
use App\Tables\Verifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Verification\PostRequest;
use ProtoneMedia\Splade\Facades\Toast;
use Auth;

class VerificationController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next){
            if (Auth::user()->position == "Warga") {
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
            return $next($request);
        });
    }

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
            'pageTitle' => 'Verifikasi Pengajuan',
            'submission' => $data
        ]);
    }

    public function post(PostRequest $request, $id_submission) {

        $request->validated();
        $submission = Submission::byHashOrFail($id_submission);
        $user = User::query()->where('villager_id', $submission->villager_id)->first();

        $newVerif = new Verification;
        $newVerif->submission_id = $submission->id;
        $newVerif->operator_id = Auth::user()->operator_id;
        $newVerif->status = $request->status;
        $newVerif->description = $request->description;
        $newVerif->save();

        $email = $user->email;

        $content = [
            'name' => $submission->villager->name,
            'for' => $submission->name,
            'type' => $submission->type,
            'created_at' => $submission->created_at,
            'status' => $request->status
        ];

        if ($request->status == "Disetujui") {
            if (Auth::user()->position == "Ketua RW") {
                $submission->is_rw_approve = '1';
                $submission->status = "Disetujui";
                $uniqNumber = "SMPL-".$submission->id.date('-d/m/Y');
                $submission->letter_number = $uniqNumber;
                $submission->save();
                Mail::to($email)->send(new NotificationSubmission($content));

            } else {
                $submission->is_rt_approve = '1';
                $submission->save();

                $operator = Operator::where('position', 'Ketua RW')->first();
                $messages = [
                    'name' => $operator->villager->name,
                    'applicant' => $submission->villager->name,
                    'for' => $submission->name,
                    'type' => $submission->type,
                    'created_at' => $submission->created_at,
                    'status' => $submission->status
                ];
                Mail::to($operator->villager->user->email)->send(new NotificationVerification($messages));
            }
        } else if($request->status == "Perlu di revisi"){
            $submission->status = "Perlu di revisi";
            $submission->save();
            Mail::to($email)->send(new NotificationSubmission($content));
        } else {
            $submission->status = "Ditolak";
            $submission->save();
            Mail::to($email)->send(new NotificationSubmission($content));
        }

        Toast::title('Berhasil memverifikasi pengajuan')->autoDismiss(5);

        return redirect()->route('verification.index');
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
    public function store(Request $request, $id_submission)
    {
        dd($id_submission);
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
