<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Blug;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Portfolio;
use App\Models\Dashboard\Slide;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\Submenu;

class IndexController extends Controller
{
    public function index(){

        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(1)->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'file_link')->whereStatus(4)->whereHome_show(1)->get();
        return view('Site.index')
            ->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('customers'))
            ->with(compact('submenus'));
    }

    public function portfolios(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $services           = Menu::select('id' , 'title' , 'service_name')->whereStatus(4)->whereService(1)->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(9)->whereStatus(4)->first();
        $portfolios         = Portfolio::join('menus' , 'portfolios.menu_id' , '=' , 'menus.id')
            ->select('menus.service_name' , 'portfolios.file_link' , 'portfolios.videos' , 'portfolios.id' , 'portfolios.title' , 'portfolios.description')
            ->where('portfolios.Status' , 4)->get();

        return view('Site.portfolio')
            ->with(compact('menus'))
            ->with(compact('services'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('portfolios'))
            ->with(compact('submenus'));
    }

    public function blugs(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(7)->whereStatus(4)->first();
        $blugs              = Blug::whereStatus(4)->get();

        return view('Site.blug')
            ->with(compact('menus'))
            ->with(compact('blugs'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'));
    }

    public function singleblug($slug){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(7)->whereStatus(4)->first();
        $allblugs           = Blug::whereStatus(4)->orderBy('id' , 'DESC')->get();
        $blugs              = Blug::whereSlug($slug)->first();

        return view('Site.singleblug')
            ->with(compact('menus'))
            ->with(compact('blugs'))
            ->with(compact('allblugs'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'));
    }

    public function customer(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(7)->whereStatus(4)->first();
        $customers          = Customer::whereStatus(4)->orderBy('priority')->get();

        return view('Site.customer')
            ->with(compact('menus'))
            ->with(compact('customers'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'));
    }

}
