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
            ->select('menus.service_name' , 'portfolios.file_link' , 'portfolios.id' , 'portfolios.title')
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

    public function mag($slug){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(7)->whereStatus(4)->first();
        $allblugs           = Blug::whereStatus(4)->orderBy('id' , 'DESC')->get();
        $blugs              = Blug::whereSlug($slug)->first();

        return view('Site.subblug')
            ->with(compact('menus'))
            ->with(compact('blugs'))
            ->with(compact('allblugs'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'));
    }

    public function picture(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $pics               = Gallerypic::whereStatus(4)->get();
        $count              = $pics->count();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.pictures')->with(compact(['menus' ,'logos' ,'slides' ,'pics' ,'submenus' , 'count']));
    }

    public function picturedetail($slug){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $pics               = Gallerypic::whereSlug($slug)->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.picturedetail')
            ->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('pics'))
            ->with(compact('submenus'));
    }

    public function clip(){

        $menus              = Menu::select('id','title','slug','submenu','priority')->whereStatus(4)->orderBy('priority')->get();
        $page_menu          = Menu::select('tab_title','page_title','page_description','slug')->whereClass('clip')->first();
        $medias             = Media::join('submenus' , 'media.submenu_id' , '=' , 'submenus.id')->select('media.id' , 'media.slug' , 'media.cover' , 'media.title' , 'media.created_at' , 'submenus.title' , 'media.title as media_title')->where('media.menu_id' , 4)->where('media.status' , 4)->orderBy('media.id' , 'DESC')->get();
        $count              = Media::whereMenu_id(4)->whereStatus(4)->count();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.media')->with(compact(['menus' , 'logos' , 'medias' , 'submenus' , 'page_menu','count']));
    }

    public function subclip($slug){

        $menus              = Menu::select('id','title','slug','submenu','priority')->whereStatus(4)->orderBy('priority')->get();
        $page_menu          = Menu::select('tab_title','page_title','page_description','slug')->whereClass('clip')->first();
        $submenu_id         = Submenu::select('id')->whereSlug($slug)->first();
        $medias             = Media::whereMenu_id(4)->whereSubmenu_id($submenu_id->id)->whereStatus(4)->orderBy('id' , 'DESC')->get();
        $count              = Media::whereMenu_id(4)->whereSubmenu_id($submenu_id->id)->whereStatus(4)->count();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $slug_submenu       = $slug;

        return view('Site.clip')->with(compact(['menus' , 'logos' , 'medias' , 'submenus' , 'page_menu','count','slug_submenu']));
    }

    public function clipdetail($slug){

        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $page_menu          = Menu::select('tab_title','page_title','page_description','slug')->whereClass('clip')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        $media              = Media::whereSlug($slug)->first();
        $allmedias          = Media::whereMenu_id(4)->whereStatus(4)->get();
        $subtitles          = Subtitle::where('media_id' , $media->id)->whereStatus(4)->get();

        $count_view = Media::whereSlug($slug)->first();
        $count_view->view = $media->view + 1;
        $count_view->save();

        return view('Site.clipdetail')->with(compact(['menus' ,'logos' ,'media' ,'allmedias' ,'submenus' ,'subtitles','page_menu' ]));
    }

    public function musicdetail($slug){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $music              = Gallerymusic::whereSlug($slug)->first();
        $allmusics          = Gallerymusic::whereStatus(4)->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.musicdetail')->with(compact(['menus' ,'logos' ,'music' ,'allmusics' ,'submenus' ]));
    }

    public function speech(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $videos             = Galleryclip::whereStatus(4)->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.videos')->with(compact(['menus' ,'logos' ,'slides' ,'videos' ,'submenus' , 'count']));
    }

    public function book(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $books              = Book::whereStatus(4)->get();
        $count              = $books->count();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.books')->with(compact(['menus' ,'logos' ,'slides' ,'books' ,'submenus' , 'count']));
    }

    public function bookdetail($slug){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $books              = Book::whereSlug($slug)->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.books')
            ->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('books'))
            ->with(compact('submenus'));
    }

    public function terms(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title' , 'file_link')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.terms')
            ->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'));
    }

    public function bio(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();

        return view('Site.bio')
            ->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('submenus'));
    }

    public function faq(){
        return view('Site.faq');
    }

    public function lessondetails(){
        return view('Site.lessondetails');
    }

    public function about(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        return view('Site.about')->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('submenus'));
    }

    public function learn(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->whereStatus(4)->orderBy('priority')->get();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $logos              = Logo::select('title' , 'file_link')->first();
        return view('Site.about')->with(compact('menus'))
            ->with(compact('logos'))
            ->with(compact('submenus'));
    }

    public function contact(){
        return view('Site.contact');
    }

    public function privacypolicy(){
        return view('Site.privacypolicy');
    }

    public function careers(){
        return view('Site.careers');
    }
}
