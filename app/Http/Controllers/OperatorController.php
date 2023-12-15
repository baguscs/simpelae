<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Villager;
use App\Models\User;
use App\Tables\Operators;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\Operator\StoreRequest;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villager = Villager::query()->where('is_operator', '0')->where('status_account', '1')->get();
        return view('app.operator.index', [
            'pageTitle' => 'Lihat Pengurus',
            'operators' => Operators::class,
            'villagers' => $villager,
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

        $newOperator = Operator::create($request->all());

        $updateUser = User::where('villager_id', $request->villager_id)->firstOrFail();
        $updateUser->update([
            'position' => $request->position,
            'operator_id' => $newOperator->id,
        ]);

        $updateVillager = Villager::find($request->villager_id);
        $updateVillager->update([
            'is_operator' => '1'
        ]);

        Toast::title('Berhasil menambah data pengurus')->autoDismiss(5);

        return redirect()->route('operator.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        //
    }
}
