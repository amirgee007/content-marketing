<?php

namespace App\Http\Controllers;

use App\Datatable;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;

class DataTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.examples.datatables');
    }

    public function data()
    {
        $tables = Datatable::select(['id', 'firstname', 'lastname', 'email']);

        return Datatables::of($tables)
            ->make(true);
    }
}
