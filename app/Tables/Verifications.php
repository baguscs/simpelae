<?php

namespace App\Tables;

use App\Models\Verification;
use App\Models\Submission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Auth;

class Verifications extends AbstractTable
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
        if (Auth::user()->position != "Warga") {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        if (Auth::user()->position == "Ketua RW") {
            return Submission::query()->where('status', 'Perlu di verifikasi')->where('is_rw_approve');
        } else {
            return Submission::query()->where('status', 'Perlu di verifikasi')->where('is_rt_approve');
        }

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
            ->withGlobalSearch('Cari nama Pengaju...', ['villager.name'])
            ->defaultSort('type')
            ->column(key: 'villager.name', searchable: true, sortable: true, canBeHidden: false, label: 'Pengaju')
            ->column(key: 'type', searchable: true, sortable: true, label: 'Jenis Keperluan')
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
