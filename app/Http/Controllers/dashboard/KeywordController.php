<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keywords;


class KeywordController extends Controller
{
     public function add_keyword()
    {
        $title = "إضافة كلمة مفتاحية";
        $description = "صفحة إضافة كلمة مفتاحية جديدة";
        return view('keywords.add', compact('title', 'description'));
    }

    public function all_keywords()
    {
        $keywords = Keywords::all();
        $title = "جميع الكلمات المفتاحية";
        $description = "قائمة بجميع الكلمات المفتاحية";
        return view('keywords.all', compact('keywords', 'title', 'description'));
    }

    public function store_keyword(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Keywords::create([
            'name' => $request->name,
        ]);
        
                $notification = array(
            'message' => 'تمت الأضافة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all_keywords', app()->getLocale())->with($notification);
    }

    public function edit_keyword($language, $id)
    {
        $keyword = Keywords::findOrFail($id);
        $title = "تعديل كلمة مفتاحية";
        $description = "صفحة تعديل الكلمة المفتاحية";
        return view('keywords.edit', compact('keyword', 'title', 'description'));
    }

    public function update_keyword(Request $request, $language, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $keyword = Keywords::findOrFail($id);
        $keyword->update([
            'name' => $request->name,
        ]);
        
                $notification = array(
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all_keywords', app()->getLocale())->with($notification);
    }

    public function delete_keyword($language, $id)
    {
        $keyword = Keywords::findOrFail($id);
        $keyword->delete();
        
                $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all_keywords', app()->getLocale())->with($notification);
    }
}
