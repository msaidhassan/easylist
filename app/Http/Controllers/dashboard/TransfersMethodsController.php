<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TransferMethod; // Assuming you have a TransferMethod model

class TransfersMethodsController extends Controller
{
    /**
     * Display the form to add a new transfer method.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_method()
    {
        $title = "Add Methods";
        $description = "Add Methods";

        return view('transfers_methods.add',compact('title','description'));
    }

    /**
     * Display a list of all transfer methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_methods()
    {
        $title = "Methods";
        $description = "Methods";
        $transferMethods = TransferMethod::all();
        return view('transfers_methods.all', compact('title','description','transferMethods'));
    }

    /**
     * Store a new transfer method in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_method(Request $request)
    {
        $title = "Methods";
        $description = "Methods";
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:transfer_methods',
        ]);

        // Create a new transfer method
        TransferMethod::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'تمت الأضافة بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('TransfersMethods.all', app()->getLocale() )->with($notification);
    }

    /**
     * Display the form to edit an existing transfer method.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_method($language ,$id)
    {
        $title = "Edit Methods";
        $description = "Edit Methods";
        $transferMethods = TransferMethod::findOrFail($id);
        return view('transfers_methods.edit', compact('title','description','transferMethods'));
    }

    /**
     * Update an existing transfer method in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_method(Request $request, $language ,$id)
    {
        $title = "Methods";
        $description = "Methods";
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:transfer_methods,name,' . $id,
        ]);

        // Find the transfer method and update it
        $method = TransferMethod::findOrFail($id);
        $method->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('TransfersMethods.all', app()->getLocale() )->with($notification);
    }

    /**
     * Delete a transfer method from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_method($language ,$id)
    {
        $method = TransferMethod::findOrFail($id);
        $method->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('TransfersMethods.all', app()->getLocale() )->with($notification);
    }
}
