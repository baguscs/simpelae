<?php

namespace App\Tables;

use App\Models\Submission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Auth;

class Submissions extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Submission::query()->where('villager_id', Auth::user()->villager_id);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch('Cari nama Pengaju...', ['name'])
            ->defaultSort('type')
            ->column(key: 'type', searchable: true, sortable: true, canBeHidden: false, label: 'Jenis Keperluan')
            ->column(key: 'name', searchable: true, sortable: true, label: 'Kepada')
            ->column(key: 'status', searchable: true, sortable: true, label: 'Status Pengajuan')
            ->column(label: 'Aksi')
            ->paginate(15);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
