<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus          = Menu::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Menu::select('id', 'title', 'slug', 'status' , 'submenu', 'priority')
                ->orderBy('priority')->get();

            return Datatables::of($data)
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->editColumn('slug', function ($data) {
                    return ($data->slug);
                })
                ->editColumn('priority', function ($data) {
                    return ($data->priority);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->editColumn('submenu', function ($data) {
                    if ($data->submenu == 1) {
                        return "دارد";
                    } else {
                        return "ندارد";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('menu-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.menus.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menus']));
    }

    public function create()
    {
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.menus.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function store(Request $request)
    {

        try{
            $menucount = Menu::orderBy('priority' , 'DESC')->first('priority');

            $menu = new Menu();

            $menu->title        = $request->input('title');
            $menu->keyword      = $request->input('keyword');
            $menu->description  = $request->input('description');
            $menu->submenu      = $request->input('submenu');
            $menu->status       = 4;
            $menu->priority     = $menucount['priority'] + 1;
            $menu->user_id      = Auth::user()->id;

            $result = $menu->save();
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
        $menus              = Menu::whereId($id)->get();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.menus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'menus']));

    }

    public function update(Request $request , $id)
    {
        try{
        $menu = Menu::findOrfail($id);
        $menu->title        = $request->input('title');
        $menu->submenu      = $request->input('submenu');
        $menu->keyword      = $request->input('keyword');
        $menu->description  = $request->input('description');
        $menu->status       = $request->input('status');

        $result = $menu->update();
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

    public function deletemenus(Request $request)
    {
        try {
            $menu = Menu::findOrfail($request->input('id'));
            $result = $menu->delete();
            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات ناموفق';
                $message = 'اطلاعات پاک نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }
        return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

}
