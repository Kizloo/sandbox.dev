<?php

namespace App\Http\Controllers;

use App\Http\Models\Car;
use Illuminate\Http\Request;

use App\Http\Requests;

class CarController extends Controller
{

    public function index() {
        $cars = Car::orderBy('created_at', 'desc')->get();


        return view('car.index', compact($cars));
    }

    public function componentsample() {


        return view('car.componentsample');
    }

}
