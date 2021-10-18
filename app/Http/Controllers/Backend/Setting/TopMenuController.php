<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Model\TopMenu;
use Illuminate\Http\Request;

class TopMenuController extends Controller
{
    public function index()
    {
        $topmenus = TopMenu::all();
        return view('admin.setting.top-menu-view',compact('topmenus'));
    }

    public function store(Request $request)
    {
        $data = TopMenu::create($request->all());
        return response()->json($data,200);
    }

    public function edit(TopMenu $topmenu)
    {
        return response()->json($topmenu,200);
    }

    public function update(Request $request, TopMenu $topmenu)
    {
        $topmenu->name = $request->name;
        $topmenu->url = $request->url;
        $topmenu->save();
        return response()->json($topmenu,200);
    }

    public function statusUpdate(Request $request, TopMenu $topmenu)
    {
        $topmenu->status = $request->status;
        $topmenu->save();
        return response()->json('Status Successfully Updated!!!',200);
    }

    public function delete(TopMenu $topmenu)
    {
        $topmenu->delete();
        return response()->json('Top menu successfully Deleted!!!');
    }
}
