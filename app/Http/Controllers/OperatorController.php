<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Villager;
use App\Models\User;
use App\Tables\Operators;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\Operator\StoreRequest;
use App\Http\Requests\Operator\UpdateRequest;

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

        return redirect()->back();
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
    public function update(UpdateRequest $request, Operator $operator, $id_operator)
    {
        $request->validated();

        $updateOperator = Operator::byHashOrFail($id_operator);
        $updateOperator->update([
            'region_rt' => $request->region_rt,
            'position' => $request->position
        ]);

        $updateUser = User::where('villager_id', $updateOperator->villager_id)->firstOrFail();
        $updateUser->update([
            'position' => $request->position,
            'operator_id' => $updateOperator->id,
        ]);

        $updateVillager = Villager::find($updateOperator->villager_id);
        $updateVillager->update([
            'is_operator' => '1'
        ]);

        Toast::title('Berhasil mengubah data pengurus')->autoDismiss(5);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator, $id_operator)
    {
        $operator = Operator::byHashOrFail($id_operator);

        $user = User::where('villager_id', $operator->villager_id)->firstOrFail();
        $user->update([
            'position' => Operator::POSITION_WARGA,
            'operator_id' => null,
        ]);

        $villager = Villager::find($operator->villager_id);
        $villager->update([
            'is_operator' => '0'
        ]);

        $operator->delete();
        Toast::title('Berhasil menghapus data pengurus')->autoDismiss(5);

        return redirect()->back();
    }
}
