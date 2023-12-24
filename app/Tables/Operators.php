<?php

namespace App\Tables;

use App\Models\Operator;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Auth;

class Operators extends AbstractTable
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
        return Operator::query();
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
            ->withGlobalSearch('Cari pengurus...', ['villager.name', 'region_rt'])
            ->defaultSort('region_rt')
            ->column(key: 'villager.name', searchable: true, sortable: true, canBeHidden: false, label: 'Nama Pengurus')
            ->column(key: 'region_rt', searchable: true, sortable: true, label: 'Wilayah RT')
            ->column(key: 'position', searchable: true, sortable: true, label: 'Jabatan')
            ->column(label: 'Aksi')
            ->paginate(15);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
