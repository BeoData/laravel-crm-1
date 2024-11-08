<?php

namespace Webkul\Matters\DataGrids;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class MattersDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        $queryBuilder = DB::table('matters')
            ->select(
                'matters.id',
                'matters.number',
                'matters.title',
                'matters.description'
            );

        // Možete dodati JOIN ako je potrebno, kao u primeru za proizvode
        // $queryBuilder->leftJoin('related_table', 'matters.id', '=', 'related_table.matter_id');

        $this->addFilter('id', 'matters.id');
        $this->addFilter('number', 'matters.number');
        $this->addFilter('title', 'matters.title');
        $this->addFilter('description', 'matters.description');

        return $queryBuilder;
    }

    /**
     * Add columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index' => 'id',
            'label' => __('ID'),
            'type' => 'integer',
            'sortable' => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'number',
            'label' => trans('Number'),
            'type' => 'string',
            'sortable' => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'title',
            // 'label'      => trans('admin::app.matters.index.datagrid.title'),
            'label' => trans('Title'),
            'type' => 'string',
            'sortable' => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'description',
            'label' => trans('Description'),
            'type' => 'string',
            'sortable' => true,
            'searchable' => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (bouncer()->hasPermission('matters.view')) {
            $this->addAction([
                'index' => 'view',
                'icon' => 'icon-eye',
                'title' => trans('matters::admin.app.matters.index.datagrid.view'),
                'method' => 'GET',
                'url' => fn($row) => route('admin.matters.view', $row->id),
            ]);
        }

        if (bouncer()->hasPermission('matters.edit')) {
            $this->addAction([
                'index' => 'edit',
                'icon' => 'icon-edit',
                'title' => trans('admin::app.matters.index.datagrid.edit'),
                'method' => 'GET',
                'url' => fn($row) => route('admin.matters.edit', $row->id),
            ]);
        }

        if (bouncer()->hasPermission('matters.delete')) {
            $this->addAction([
                'index' => 'delete',
                'icon' => 'icon-delete',
                'title' => trans('admin::app.matters.index.datagrid.delete'),

                'method' => 'DELETE',
                'url' => fn($row) => route('admin.matters.destroy', $row->id),
            ]);
        }
    }

    /**
     * Prepare mass actions.
     */
    public function prepareMassActions(): void
    {
        $this->addMassAction([
            'icon' => 'icon-delete',
            'title' => trans('admin::app.matters.index.datagrid.delete'),
            'method' => 'POST',
            'url' => route('admin.matters.mass_delete'),
        ]);
    }
}
