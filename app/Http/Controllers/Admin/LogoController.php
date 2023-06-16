<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Logo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LogoController extends Controller
{

    public function index(Request $request)
    {
        $logos          = Logo::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('logos')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('file_link', function ($data) {
                    return '<img src="'.asset('storage/'.$data->file_link).'"  width="200" class="img-rounded" align="center" />';

                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('logo-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.logos.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'logos']));
    }

    public function create()
    {
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.logos.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function store(Request $request)
    {

        try{

            $logos = new Logo();
            $logos->title       = $request->input('title');
            $logos->user_id     = Auth::user()->id;

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/logos";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $logos->file_link = 'logos/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            $result = $logos->save();

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

    public function deletelogo(Request $request)
    {
        try {

            $logo = Logo::findOrfail($request->input('id'));
            $result1 = $logo->delete();
            if ($result1 == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';

            }else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات منو ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
