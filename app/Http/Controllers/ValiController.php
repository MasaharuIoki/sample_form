<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SampleValiRequest;

class ValiController extends Controller
{
  public function index()
  {
    return view('sample_vali');
  }

  public function receiveData(SampleValiRequest $request)
  {
    return view('sample_vali', ['status' => true]);
  }
}