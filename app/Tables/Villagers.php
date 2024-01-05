<?php

namespace App\Tables;

use App\Models\Villager;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Auth;

class Villagers extends AbstractTable
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
        if (Auth::user()->position == "Ketua RW") {
            return Villager::query();
        } else {
            return Villager::query()->where('region_rt', Auth::user()->operator->region_rt);
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
            ->withGlobalSearch('Cari nama warga...', ['name'])
            ->defaultSort('name')
            ->column(key: 'name', searchable: true, sortable: true, canBeHidden: false, label: 'Nama')
            ->column(key: 'nik', searchable: true, sortable: true, label: 'NIK')
            ->column(key: 'region_rt', searchable: true, sortable: true, label: 'Wilayah RT')
            ->column(key: 'status_account', searchable: true, sortable: true, label: 'Status Akun')
            ->column(label: 'Aksi')
            ->paginate(15);

        // $table
        //     ->withGlobalSearch(columns: ['id'])
        //     ->column('id', sortable: true)

        //     ->searchInput('name')
        //     ->searchInput(
        //         key: 'framework',
        //         label: 'Find your framework',
        //     );
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
