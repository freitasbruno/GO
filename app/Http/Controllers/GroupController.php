<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show($group_id)
    {
        // get the current groups
        $group_matches = array('parent_id' => $group_id, 'visible' => 1);
		$groups = Group::where($group_matches)->orderBy('name')->get();

        // load the view and pass the groups
        return view('groups.index')
            ->with('groups', $groups);
    }
    
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the groups
        $groups = Group::all();

        // load the view and pass the groups
        return view('groups.index')
            ->with('groups', $groups);
    }
}
