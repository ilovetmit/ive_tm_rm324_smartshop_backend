<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\QRCodeLogin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\MoneyTransaction;
use App\Models\LockerTransaction;
use App\Models\ProductTransaction;

class DocumentsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function privacy_policy()
  {
    return view('documents.privacy_policy');
  }

  public function terms_and_conditions()
  {
    return view('documents.terms_and_conditions');
  }
}
