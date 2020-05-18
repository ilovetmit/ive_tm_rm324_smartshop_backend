{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')



@section('page_header')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Transfer</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Transfer</li>
    </ul>
</div>
{{-- Main Section Begins --}}
<section class="no-padding-top">
    {{-- Flash Message --}}
    <div class="pl-3 pr-3">
        @include('_layout.user-panel.components.flash')
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
                <div class="block">
                    <div class="title"><strong>Detail</strong></div>
                    <div class="block-body">
                        <form id="transfer-form" class="form-horizontal" method="post"
                            action="{{URL::action('SmartBankingController@transfer_action')}}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">From</label>
                                <div class="col-sm-9">
                                    <select data-style="btn-primary" class="selectpicker" id="from_account" name="from">
                                        <option value="Saving">Saving Account</option>
                                        <option value="Current">Current Account</option>
                                        <option value="VitCoin">VitCoin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">To</label>
                                <select data-style="btn-primary" class="selectpicker col-sm-6" id="to" name="to"
                                    required>
                                    @foreach ($users as $user)
                                    <option value="{{$user->email}}">{{$user->email}}
                                        {{(Auth::user()->email === $user->email) ? '(Me)' : ''}}</option>
                                    @endforeach
                                </select>


                                <select data-style="btn-primary" class="selectpicker col-sm-3" id="to_account"
                                    name="to_account" required>
                                    <option value="Saving" class="account">Saving Account</option>
                                    <option value="Current" class="account">Current Account</option>
                                    <option value="VitCoin" class="vitcoin">VitCoin</option>
                                </select>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Amount</label>
                                <div class="d-flex flex-row col-sm-9">
                                    <div class="input-group col">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" class="radio-template" name="amount" value="100"
                                                    data-com.bitwarden.browser.user-edited="yes">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" disabled value="100">
                                    </div>
                                    <div class="input-group col">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" class="radio-template" name="amount" value="500"
                                                    data-com.bitwarden.browser.user-edited="yes">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" disabled value="500">
                                    </div>
                                    <div class="input-group col">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" class="radio-template" name="amount" value="1000"
                                                    data-com.bitwarden.browser.user-edited="yes">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" disabled value="1000">
                                    </div>
                                    {{--                                    <div class="input-group col">--}}
                                    {{--                                        <div class="input-group-prepend">--}}
                                    {{--                                            <div class="input-group-text">--}}
                                    {{--                                                <input id="custom" type="radio" class="radio-template" name="amount"--}}
                                    {{--                                                    value="#" data-com.bitwarden.browser.user-edited="yes">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <input type="text" class="form-control" name="text-amount" id="text-amount"--}}
                                    {{--                                            disabled>--}}
                                    {{--                                    </div>--}}

                                </div>
                            </div>

                            {{--                            <div class="form-group row">--}}
                            {{--                                <label class="col-sm-3 form-control-label">Remark</label>--}}
                            {{--                                <div class="col-sm-9">--}}
                            {{--                                    <input type="text" class="form-control" name="remark">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-9 ml-auto">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="submit()">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('body_end')
<div class="modal fade" id="product" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Buy Product
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img width="300"
                        src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chld=L|0&chl=akshdkjajhdksahslkdhdlksdydiudysiusydaiosydaoiuysaoiydasoiusydsaoidyduisadasdasdaadsaadd1ad3sads4d6sadsad45dsadddsa/,sad/sadsad/.,sadd,.y">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </a>
            </div>
        </div>
    </div>
</div>
@stop
@section('body_end_scripts')
<script>
    $('#to_account').find('.vitcoin').hide();
      $('#from_account').change(function() {

        if($('#from_account').val()==='VitCoin'){
          $('#to_account').find('.vitcoin').show();
          $('#to_account').val('VitCoin');
          $('#to_account').find('.account').hide();
        }else{
          $('#to_account').find('.vitcoin').hide();
          $('#to_account').find('.account').show();
          $('#to_account').val($('#from_account').val());
        }

        $('#to_account').selectpicker('refresh');
      });

      $('.radio-template').on('click',function(){
          if ($(this).val() == '#') {
            $('#text-amount').removeAttr('disabled')
          }else{
            $('#text-amount').attr('disabled',true)
          }
      })

     function submit(){
        if(document.querySelector('input[name="amount"]:checked').value === '#'){
            document.querySelector('input[name="amount"]:checked').value = document.getElementsByName('text-amount')[0].value;
        }
        $('#transfer-form').submit();

      }
</script>
@stop
