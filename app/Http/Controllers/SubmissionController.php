<?php

namespace App\Http\Controllers;

use App\Tables\Submissions;
use App\Models\Submission;
use App\Models\Verification;
use App\Models\Operator;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use App\Http\Requests\Submission\UpdateRequest;
use App\Http\Requests\Submission\StoreRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationVerification;
use Carbon\Carbon;
use Auth;
use Alert;

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
        return view('app.submission.create', [
            'pageTitle' => 'Tambah Pengajuan'
        ]);
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
            $fileName = $file->hashName();
            $pathFile = 'submission/'.$fileName;
            Storage::disk('public')->put('submission/', $file);
            $post->attachment = $fileName;
        }

        $post->region_rt = Auth::user()->villager->region_rt;
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

        // $data_uri = $request->signature;
        // $encoded_image = explode(",", $data_uri)[1];
        // $decoded_image = base64_decode($encoded_image);
        // $fileName = uniqid().'.png';
        // Storage::disk('public')->put('signature/'. $fileName, $decoded_image);

        $post->save();

        $operator = Operator::where('region_rt', Auth::user()->villager->region_rt)->first();
        $messages = [
            'name' => $operator->villager->name,
            'applicant' => Auth::user()->villager->name,
            'for' => $request->name,
            'type' => $request->type,
            'created_at' => $post->created_at,
            'status' => $post->status
        ];

        Mail::to($operator->villager->user->email)->send(new NotificationVerification($messages));

        $operator = Operator::where('region_rt', Auth::user()->villager->region_rt)->first();
        $destinationNumber = $operator->villager->phone_number;
        $notificationMessage = "Pemberitahuan pengajuan atas nama ".Auth::user()->villager->name."  menunggu untuk diverifikasi. Mohon segera di tindak lanjuti, terima kasih";
        $sendNotifWA = "https://wa.me/+62". $destinationNumber ."?text=". urlencode($notificationMessage);

        // Toast::title('Berhasil menambah data pengajuan')->autoDismiss(5);
        return redirect()->route('submission.index')->with('success', 'Berhasil menambah data pengajuan')->with('announcement', $sendNotifWA);
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        $veriication = Verification::query()->where('submission_id', $submission->id)->get();
        return view('app.submission.detail', [
            'pageTitle' => "Detail Pengajuan",
            'verification' => $veriication,
            'submission' => $submission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        $veriication = Verification::query()->where('submission_id', $submission->id)->get();
        return view('app.submission.edit', [
            'pageTitle' => "Revisi Pengajuan",
            'verification' => $veriication,
            'submission' => $submission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Submission $submission)
    {
        $request->validated();
         if ($request->hasFile('attachments')) {
            // delete file
            Storage::disk('public')->delete('submission/'.$submission->attachemnt);

            $file = $request->file('attachments');
            $fileName = $file->hashName();
            $pathFile = 'submission/'.$fileName;
            Storage::disk('public')->put('submission/', $file);
            $submission->attachment = $fileName;
        }

        $submission->region_rt = Auth::user()->villager->region_rt;
        $submission->name = $request->name;
        $submission->nik = $request->nik;
        $submission->place_of_birth = $request->place_of_birth;
        $submission->date_of_birth = $request->date_of_birth;
        $submission->gender = $request->gender;
        $submission->religion = $request->religion;
        $submission->address = $request->address;
        $submission->nationaly = $request->nationaly;
        $submission->job = $request->job;
        $submission->type = $request->type;
        $submission->description = $request->description;
        $submission->marital_status = $request->marital_status;
        $submission->villager_id = Auth::user()->villager_id;
        $submission->status = Submission::STATUS_NEED_VERIF;

        $submission->save();

        Toast::title('Berhasil mengubah data pengajuan')->autoDismiss(5);
        return redirect()->route('submission.index');
    }

    public function download($id_submission){
        $submission = Submission::byHashOrFail($id_submission);

        $qrcode = QrCode::size(100)->format('png')->generate(route('submission.check', $submission->hash));
        // $content = $qrcode->getContent();

        // $encoded_image  = base64_encode($qrcode);
        // $decoded_image = base64_decode($encoded_image);

        // $fileName = uniqid().'.png';
        // Storage::disk('public')->put('qrcode/'. $fileName, $decoded_image);
        // dd($base64);
        // dd($qrcode);
        // $export = Pdf::loadView('app.submission.export', [
        //     'submission' => $submission,
        //     'qrcode' => $qrcode
        // ]);
        // return $export->download('Surat Keterangan Desa - '.$submission->name.'.pdf');
        return view('app.submission.export', [
            'submission' => $submission,
            'qrcode' => $qrcode
        ]);
    }

    public function check($id_submission){
        $submission = Submission::byHashOrFail($id_submission);
        $rt = Operator::where('region_rt', $submission->region_rt)->get();
        $rw = Operator::where('position', "Ketua RW")->get();
        // dd($nameRT);
        return view('app.submission.check', [
            'submission' => $submission,
            'rt' => $rt,
            'rw' => $rw
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
