<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index() {
        $incompleteItems = ListItem::where('is_complete', 0)->get();
        $completedItems = ListItem::where('is_complete', 1)->get();

        return view('welcome', [
            'incompleteItems' => $incompleteItems,
            'completedItems' => $completedItems
        ]);
    }

    public function markComplete($id) {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

    public function saveItem(Request $request){
        $request->validate([
            'listItem' => 'required'
        ]);
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('/');
    }
}
