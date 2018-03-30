<?php namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use Lang;
use Redirect;
use Sentinel;
use View;

class GroupsController extends JoshController
{
    /**
     * Show a list of all the groups.
     *
     * @return View
     */
    public function index()
    {
        // Grab all the groups
        $roles = Sentinel::getRoleRepository()->all();

        // Show the page
        return view('admin.groups.index', compact('roles'));
    }

    /**
     * Group create.
     *
     * @return View
     */
    public function create()
    {
        // Show the page
        return view ('admin.groups.create');
    }

    /**
     * Group create form processing.
     *
     * @return Redirect
     */
    public function store(GroupRequest $request)
    {
        if ($role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name'))
        ])
        ) {
            // Redirect to the new group page
            return Redirect::route('admin.groups.index')->with('success', Lang::get('groups/message.success.create'));
        }

        // Redirect to the group create page
        return Redirect::route('admin.groups.create')->withInput()->with('error', Lang::get('groups/message.error.create'));

    }


    /**
     * Group update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id = null)
    {
        try {
            // Get the group information
            $role = Sentinel::findRoleById($id);

        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Redirect::route('admin.groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Show the page
        return view('admin.groups.edit', compact('role'));
    }

    /**
     * Group update form processing page.
     *
     * @param  int $id
     * @return Redirect
     */
    public function update($group, GroupRequest $request)
    {
        try {
            // Get the group information
            $group = Sentinel::findRoleById($group);
        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Rediret::route('admin.groups.index')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Update the group data
        $group->name = $request->get('name');

        // Was the group updated?
        if ($group->save()) {
            // Redirect to the group page
            return Redirect::route('admin.groups.index')->with('success', Lang::get('groups/message.success.update'));
        } else {
            // Redirect to the group page
            return Redirect::route('admin.groups.edit', $group)->with('error', Lang::get('groups/message.error.update'));
        }

    }

    /**
     * Delete confirmation for the given group.
     *
     * @param  int $id
     * @return View
     */
    public function getModalDelete($id = null)
    {
        $model = 'groups';
        $confirm_route = $error = null;
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);


            $confirm_route = route('admin.groups.delete', ['id' => $role->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = Lang::get('admin/groups/message.group_not_found', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Delete the given group.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);

            // Delete the group
            $role->delete();

            // Redirect to the group management page
            return Redirect::route('admin.groups.index')->with('success', Lang::get('groups/message.success.delete'));
        } catch (GroupNotFoundException $e) {
            // Redirect to the group management page
            return Redirect::route('admin.groups.index')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }
    }

}
