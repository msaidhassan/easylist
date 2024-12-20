<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Educational;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EducationalController extends Controller
{
    public function create(){
        $title = "المكتبة التعليمية";
        $description = "المكتبة التعليمية";
        $user = Auth::user();
        $educational = Educational::where('new_franchise_id',$user->new_franchise_id)->first();

        return view('educationals.create' , compact( 'educational',"title" , "description"));
    }

    public function store(Request $request){



        $data = $request->validate([
            "text" => 'required',

            ]);
                                   $currentUser = Auth::user();
        if ($currentUser && $currentUser->new_franchise_id) {
            $data['new_franchise_id'] = $currentUser->new_franchise_id;
        }
        $educational = Educational::where('new_franchise_id',$currentUser->new_franchise_id)->first();
        if($educational){
            $educational->update($data);
        }else{
            Educational::create($data);

        }

                $notification = [
        'message' => 'تمت الأضافة بنجاح',
        'alert-type' => 'success'
    ];

        return redirect()->back()->with($notification);


    }


    public function all(){
        $educationals = Educational::where('new_franchise_id',$user->new_franchise_id)->all();
                $title = "المكتبة التعليمية";
        $description = "المكتبة التعليمية";

    return view('educationals.all' , compact("title" , "description" , "educationals"));


    }



    public function edit($language , $id){
        $educational = Educational::findOrFail($id);


        $title = "المكتبة التعليمية";
        $description = "المكتبة التعليمية";

                return view('educationals.edit' , compact( "title" , "description" , "educational"));


    }


        public function update(Request $request, $language, $id){
            $educational = Educational::findOrFail($id);

        $data = $request->validate([
            "text" => 'required',
            ]);

            $educational->update($data);


                $notification = [
                    'message' => 'تمت التعديل بنجاح',
                    'alert-type' => 'success'
                ];

        return redirect()->route('all.educational' , app()->getLocale())->with($notification);


    }

    public function delete($language , $id){
            $educational = Educational::findOrFail($id);

        $educational->delete();

        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all.educational',app()->getLocale())->with($notification);

    }









}
