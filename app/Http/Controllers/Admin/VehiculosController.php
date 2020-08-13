<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vehiculo\BulkDestroyVehiculo;
use App\Http\Requests\Admin\Vehiculo\DestroyVehiculo;
use App\Http\Requests\Admin\Vehiculo\IndexVehiculo;
use App\Http\Requests\Admin\Vehiculo\StoreVehiculo;
use App\Http\Requests\Admin\Vehiculo\UpdateVehiculo;
use App\Models\Vehiculo;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VehiculosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVehiculo $request
     * @return array|Factory|View
     */
    public function index(IndexVehiculo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Vehiculo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'Nombre'],

            // set columns to searchIn
            ['id', 'Nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.vehiculo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.vehiculo.create');

        return view('admin.vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVehiculo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVehiculo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Vehiculo
        $vehiculo = Vehiculo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/vehiculos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/vehiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param Vehiculo $vehiculo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Vehiculo $vehiculo)
    {
        $this->authorize('admin.vehiculo.show', $vehiculo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vehiculo $vehiculo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Vehiculo $vehiculo)
    {
        $this->authorize('admin.vehiculo.edit', $vehiculo);


        return view('admin.vehiculo.edit', [
            'vehiculo' => $vehiculo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVehiculo $request
     * @param Vehiculo $vehiculo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVehiculo $request, Vehiculo $vehiculo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Vehiculo
        $vehiculo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/vehiculos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVehiculo $request
     * @param Vehiculo $vehiculo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVehiculo $request, Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVehiculo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVehiculo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Vehiculo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
