<?php


namespace App\Http\Controllers\AllControllers;


use App\Http\Controllers\Controller;
use App\Services\Utilizatori\Service;

class BaseController extends Controller
{
    public $service;
    public $itemsPerPage = 10;
    public function __construct(Service $service){
        $this->service = $service;
    }
}
