<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sliderequest;
use App\Models\Logo;
use App\Models\Menu_panel;
use App\Models\Status;
use App\Models\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class LogoController extends Controller
{

    public function index(Request $request)
    {
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('logos')
                ->select('logos.id', 'logos.file_link' , 'logos.title')
                ->get();

            return Datatables::of($data)

                ->editColumn('id', function ($data) {
                    return ($data->id);
                })
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('file_link', function ($row) {
                    return '<img src="'.asset($row->file_link).'"  width="200" class="img-rounded" align="center" />';

                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('logos.edit', $row->id) . '" class="btn ripple btn-outline-info btn-sm">Edit</a>
                                <form action="' . route('logos.destroy' ,$row->id) .'" method="post"  style="display: inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                         <button type="submit" class="btn ripple btn-outline-danger btn-sm">
                                             <i class="fe fe-trash-2 "></i>
                                         </button>
                                </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.logos.all')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function create()
    {
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.logos.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

        public function imgupload(Request $request)
    {

        $logos = new Logo();
        $logos->status     = 1;
        $logos->user_id    = Auth::user()->id;

        if ($request->file('files')) {

            $file = $request->file('files');
            $img = Image::make($file);
            $imagePath ="images/slides/";
            $imageName = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
            $logos->file_link = $file->storeAs($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');

        }

        $result = $logos->save();
        try{

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            }
            else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function edit($id)
    {
        $logos          =   Logo::whereId($id)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();
//        $slide  = Slide::whereId($id)->first();
//        $type_slide = $slide->type;

//        if ($type_slide == 'supplier'){
//            $suppliers = Supplier::whereSlug($slide->type_id)->get();
//
//        }elseif ($type_slide == 'technical_unit'){
//            $technicals = Technical_unit::whereSlug($slide->type_id)->get();
//        }
//        elseif ($type_slide == 'product'){
//            $products = Product::whereSlug($slide->type_id)->get();
//        }
//        elseif ($type_slide == 'offer'){
//            $offers = Offer::whereSlug($slide->type_id)->get();
//        }

        return view('Admin.slides.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'logos']));

    }

    public function update(Request $request , Logo  $logo)
    {
        $logo->title           = $request->input('title');
        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $imagePath ="images/slides/";
            $imageName = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
            $logo->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }

        $logo->update();
        return redirect(route('slides.index'));
    }

    public function destroy($id)
    {
        $logos = Logo::findOrfail($id);
        $logos->delete();
        return redirect(route('slides.index'));
    }

}
