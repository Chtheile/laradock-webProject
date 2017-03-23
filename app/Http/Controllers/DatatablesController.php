<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\User;
class DatatablesController extends Controller
{
    /**
 * Displays datatables front end view
 *
 * @return \Illuminate\View\View
 */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

        return Datatables::of(User::query())->make(true);
    }

    /**
     * @return mixed
     */
    public function getAddEditRemoveColumnData()
    {
        $users = User::select(['id', 'name','username', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return ' <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>';
            })
            ->removeColumn('password')
            ->make(true);
    }
}
