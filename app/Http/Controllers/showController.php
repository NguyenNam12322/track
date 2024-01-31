<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\background;

use App\Models\popup;

use DB;

class showController extends Controller
{

    protected function addPopup(Request $request)
    {

        $input['link']       = $request->link;
        $input['option']    = $request->popup_display;
        $input['active']     = !empty($request->popup_activate)??0;
        $input['image'] = '';
    

        if ($request->hasFile('file_image')) {

            $file_upload = $request->file('file_image');

            $name = time() . '_' . $file_upload->getClientOriginalName();

            $filePath = $file_upload->storeAs('images/banner-popup', $name, 'public');

            $input['image'] = $filePath;
        }

        $popup = popup::findOrFail(4);

        $popup = $popup->update($input);

        return back()->with('status','sửa thành công');

        
    }

    public function deleteLinkAdd(Request $request)
    {
        $id = $request->id;
        $delete = DB::table('muchsearch')->delete($id);
        return response('thanh cong');

    }


    public function addBackgroundSite(Request $request)
    {
        if ($request->hasFile('background_image')) {

            $file_upload = $request->file('background_image');

            $name = time() . '_' . $file_upload->getClientOriginalName();

            $filePath = $file_upload->storeAs('images/background-image', $name, 'public');

            $input['background_image'] = $filePath;

            $input['background_color'] = '';

        }
        else{

            $input['background_color'] = $request->background_color;

            $input['background_image'] = '';

        }

        $background = background::find(1);

        $background->update($input);

         return back()->with('status-background','sửa thành công');

    }
}
