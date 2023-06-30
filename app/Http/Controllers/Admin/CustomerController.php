<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers      =   Customer::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('customers')
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')
            ->get();

            return Datatables::of($data)

                ->editColumn('id', function ($data) {
                    return ($data->id);
                })
                ->editColumn('priority', function ($data) {
                    return ($data->priority);
                })
                ->editColumn('name', function ($data) {
                    return ($data->name);
                })
                ->editColumn('description', function ($data) {
                    return ($data->description);
                })

                ->editColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('file_link', function ($data) {
                    return '<img src="'.asset('storage/'.$data->file_link).'"  width="100" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('customer-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.customers.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'customers']));
    }

    public function create()
    {
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customers.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function store(Request $request)
    {
        $priority = Customer::OrderBy('priority' , 'DESC')->first('priority');

        $priority = $priority->priority + 1;

        try{
            $customers = new Customer();
            $customers->name        = $request->input('name');
            $customers->description = $request->input('text');
            $customers->status      = $request->input('status');
            $customers->priority    = $priority;
            $customers->user_id     = Auth::user()->id;

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/customers/images";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $customers->file_link = 'customers/images/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            $result = $customers->save();

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
        $customers      =   Customer::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customers.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'customers']));

    }

    public function update(Request $request)
    {
        try {
            if ($request->input('priority') != $request->input('priority_id'))
            {
                $priority = Customer::wherePriority($request->input('priority'))->get();
            }
            else
            {
                $priority = null;
            }
            if ($priority) {
                Alert::error('مقدار اولویت تکراری می باشد', 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید')->autoclose(3000);
            } else {
                $customer = Customer::whereId($request->input('customer_id'))->first();
                $customer->name                 = $request->input('name');
                $customer->description          = $request->input('text');
                $customer->status               = $request->input('status');
                $customer->priority             = $request->input('priority');
                if ($request->hasfile('file_link')) {
                    $file = $request->file('file_link');
                    $imagePath = "public/customers/images";
                    $imageName = Str::random(30) . "." . $file->clientExtension();
                    $customer->file_link = 'customers/images/' . $imageName;
                    $file->storeAs($imagePath, $imageName);
                }
                $result = $customer->save();
            }
            if ($result == true) {
                Alert::success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد')->autoclose(3000);
            }
            else {
                Alert::error('عملیات نا موفق', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
            }
        } catch (Exception $e) {
            Alert::error('خطا در ارتباط با سرور', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
        }
        return Redirect::back();
    }

    public function deletecustomers(Request $request)
    {
        try {

            $customer = Customer::findOrfail($request->input('id'));
            $result1 = $customer->delete();
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
