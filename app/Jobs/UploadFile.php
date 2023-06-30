<?php

namespace App\Jobs;

use App\Models\Dashboard\Portfolio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UploadFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $data;
    protected $file_link;
    protected $videos;

    public function __construct($data , $file_link , $videos)
    {
        $this->data         = $data;
        $this->file_link    = $file_link;
        $this->videos       = $videos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $portfolios = new Portfolio();
            $portfolios->title       = $this->data['title'];
            $portfolios->tags        = $this->data['title'];
            $portfolios->customer_id = $this->data['customer_id'];
            $portfolios->menu_id     = $this->data['menu_id'];
            $portfolios->submenu_id  = $this->data['submenu_id'];
            $portfolios->description = $this->data['text'];
            $portfolios->status      = $this->data['status'];
            $portfolios->file_link   = $this->file_link;
            $portfolios->videos      = $this->videos;
            $portfolios->user_id     = Auth::user()->id;

            $portfolios->save();

    }
}
