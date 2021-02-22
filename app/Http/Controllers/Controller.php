<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // title properti
    protected $titleDefault = "Semua Buku";
    protected $titleLatest = "Buku Terbaru";
    protected $titleAsc = "Buku dari (A - Z)";
    protected $titleDesc = "Buku dari (Z - A)";
}
