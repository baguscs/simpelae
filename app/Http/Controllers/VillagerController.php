<?php

namespace App\Http\Controllers;

use App\Tables\Villagers;
use App\Models\Villager;
use App\Models\User;
use App\Models\Operator;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Villager\StoreRequest;
use App\Http\Requests\Villager\UpdateRequest;

class VillagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.villagers.index', [
            'villagers' => Villagers::class,
            'pageTitle' => 'Lihat Warga'
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

        $newVillager = Villager::create($request->all(), ['status_account' => '1']);

        User::create([
            'villager_id' => $newVillager->id,
            'position' => Operator::POSITION_WARGA,
            'email' => $request->email,
            'password' => Hash::make("password")
        ]);

        Toast::title('Berhasil menambah data warga')->autoDismiss(5);

        return redirect()->route('villager.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Villager $villager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Villager $villager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Villager $villager, $id_villager)
    {
        $request->validated();

        $villager = Villager::byHashOrFail($id_villager);
        $villager->update($request->all());

        Toast::title('Berhasil mengubah data warga')->autoDismiss(5);

        return redirect()->route('villager.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Villager $villager)
    {
        //
    }
}
