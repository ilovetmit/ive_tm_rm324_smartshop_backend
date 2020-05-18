<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementManagement\Advertisement;
use App\Models\ProductManagement\OnSell\ShopProduct;
use App\Models\ProductManagement\Product;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use App\Events\QRCodeLogin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SShopController extends Controller
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

  /**
   * Advertisement
   */
  public function advertisement()
  {
    $rows = Advertisement::where('status', config('constants.STATUS.ACTIVE'))->get();
    return view('user-panel.s-shop.advertisement.index', compact('rows'));
  }

  /**
   * Maps
   */
  public function maps()
  {
    return view('user-panel.s-shop.maps.index');
  }

  /**
   * Shopping
   */
  public function shopping()
  {
    //todo Shop-product with product
    // Do some sorting for better user experience
    //    if (Auth::check() && count(ProductTransaction::where('user_id', Auth::id())->get()) != 0) {
    //      $asc_list = ProductTransaction::rightJoin('products', 'product_transactions.product_qrcode', 'products.qrcode')
    //        ->selectRaw('category, COUNT(product_transactions.product_qrcode) AS total_quantity')->groupBy('category')->orderBy('total_quantity', 'desc')->get();
    //
    //      foreach ($asc_list as $item) {
    //        $category_array[] = "'$item->category'";
    //      }
    //      $category_string = implode(', ', $category_array);
    //      $rows = Product::orderByRaw("FIELD(category,$category_string)")->get();
    //      $sorted = $category_array[0];
    //    } else {
    $rows = Product::all();
    $sorted = false;
    //    }

    return view('user-panel.s-shop.shopping.index', compact('rows', 'sorted'));
    //    return view('user-panel.s-shop.shopping.index');
  }
  public function shopping_detail($id)
  {
    $row = Product::findOrFail(ShopProduct::find($id)->product_id);
    return view('user-panel.s-shop.shopping.detail', compact('row'));
  }
  public function shopping_receipts()
  {
    return view('user-panel.s-shop.shopping.receipts');
  }

  /**
   * Splash
   */
  public function splash()
  {

    $token = Str::random(64);              // token for generating qr code and the name of event
    Redis::set($token, 'waiting-auth');
    return view('user-panel.s-shop.splash.index', compact('token'));
  }

  public function login_qr_approve(Request $request)
  {

    if (!isset($request->one_time_password)) {
      return redirect()->route('sshop.splash');
    }

    if ($token = Redis::get($request->one_time_password)) {
      Redis::del($request->one_time_password);

      $id = User::where('api_token', $token)->first()->user_id;
      Auth::loginUsingId($id);

      // $user = User::find($id)->get();
      return redirect()->route('sshop.profile');
    } else {
      return redirect()->route('sshop.splash');
    }
  }

  /**
   * Test
   */
  public function test()
  {
    return view('user.views.transaction.index');
  }

  // The Following function Need To Be Login

  /**
   * History
   */
  public function history()
  {
    //    $rows = ProductTransaction::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    $rows = ProductTransaction::with('hasProduct', 'hasTransaction')->whereHas('hasTransaction', function ($query) {
      $query->where('user_id', Auth::id());
    })->orderBy('created_at', 'desc')->get();

    return view('user-panel.s-shop.history.index', compact('rows'));
  }

  /**
   * Profile
   */
  public function profile()
  {
    $user = User::with('hasBankAccount')->where('id', Auth::id())->first();
    return view('user-panel.s-shop.profile.index', compact('user'));
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect('/s-shop/splash');
  }
}
