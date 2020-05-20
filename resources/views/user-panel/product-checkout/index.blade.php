<!DOCTYPE html>
<html>

<head>
    <title>{{config("constants.WORDINGS.HTML_TITLE")}}</title>
    <link rel="shortcut icon" href="{{asset('images/S-Shop_logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Smart Shop</a>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-4 mb-4">Product Checkout</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-xl-5 mb-3">
            <div class="card border-success">
                <div class="card-header">
                    Product Scanner
                </div>
                <div class="card-body text-center">
                    {{-- todo change to object detection path--}}
                    <img class="img-fluid" src="http://127.0.0.1:8080/video_feed">
                    <p class="card-text mt-3" id="time"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-7">
            <div class="table-responsive">
                <table class="table table-hover table-fixed">
                    <thead>
                    <tr>
                        <th scope="col" class="col-1 align-middle text-center">#</th>
                        <th scope="col" class="col-2 align-middle text-center">Product Image</th>
                        <th scope="col" class="col-3 align-middle text-center">Product Name</th>
                        <th scope="col" class="col-2 align-middle text-center">Product Price</th>
                        <th scope="col" class="col-2 align-middle text-center">Check</th>
                        <th scope="col" class="col-2 align-middle text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody id="product_data">
                    <!-- load product data -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col" class="col-12 text-center">Total Amount<h3 id="totalamount" style="font-weight: 900">HKD 0.00</h3></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <button id="confirm_button" type="button" class="btn btn-secondary btn-lg text-light m-auto w-25" disabled>Confirm</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalCenterTitle">Product Confirm</h5>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Product Total Amount</h3>
                <h1 class="text-center text-danger total" id="totalamount_modal">HKD 100</h1>


                <span class="text-center mt-3">Please use your mobile phone to scan the QR code to pay.</span>

                {{-- todo app api--}}
                <img width="400" height="400" class="text-center" id="qrcode_img"
                     src="">
                <div class="text-center text-danger h4 mt-2" id="timespan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>

<!-- Network Error Modal -->
<div class="modal fade" id="fail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalCenterTitle">Network Error</h5>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Network connection failed. Please try again later.</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    var product_rfid_list = [];
    var product_list = [];
    var totalamount = 0;
    const qrcode_img = "https://chart.apis.google.com/chart?cht=qr&chs=400x400&chld=L|0&chl=";

    var CCOUNT = 120;
    var t, count;

    $(document).ready(function () {
        ShowTime()
    });

    $('#confirm_button').click(function () {
        if (product_rfid_list.length > 0) {

            $('#confirm_button').prop('disabled', true);
            $('#confirm_button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

            $('#totalamount_modal').text('HKD ' + totalamount.toFixed(2));
            var productJSONText = JSON.stringify(product_list);
            $.ajax({
                type: "POST",
                url: "{{route('ProductCheckout.checkout_temp')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_list: productJSONText
                }
                ,
                success: function (data, textStatus, xhr) {
                    // console.log(data);
                    if (xhr.status === 200) {
                        cdreset();
                        countdown();
                        $("#qrcode_img").attr("src", qrcode_img+data.data);
                        $('#confirm_modal').modal('show');

                        $('#confirm_button').prop('disabled', false);
                        $('#confirm_button').html('Confirm');

                    } else {
                        // console.log(xhr.status);
                        $('#fail_modal').modal('show');

                        $('#confirm_button').prop('disabled', false);
                        $('#confirm_button').html('Confirm');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    // console.log(textStatus);
                    $('#fail_modal').modal('show');

                    $('#confirm_button').prop('disabled', false);
                    $('#confirm_button').html('Confirm');
                }
            });

        }
    });


    window.Echo.channel('smartshop_database_rfid_scan')
        .listen('RFID', (e) => {
            // console.log(e.data);
            // console.log(e.data.has_shop_product.has_product);
            if (!product_rfid_list.includes(e.data.rfid_code)) {
                $('#confirm_button').prop('disabled', false);
                $("#confirm_button").removeClass("btn-secondary");
                $("#confirm_button").addClass("btn-success");

                product_rfid_list.push(e.data.rfid_code);
                product_list.push(e.data);
                var product_data = e.data.has_shop_product.has_product;
                var no = product_rfid_list.length;
                append_product(no, product_data);

                totalamount += product_data.price;
                $('#totalamount').text('HKD ' + totalamount.toFixed(2))
            } else {
                console.log('rfid exists: ' + e.data.rfid_code);
            }

        });


    window.Echo.channel('smartshop_database_object')
        .listen('ObjectDetection', (e) => {
            // console.log(e.data);
            const idList = Object.keys(e.data);
            idList.forEach(function (elem,i) {
                var data = e.data[elem];
                if(isInteger(data['amount']) && data['amount']>0){
                    for(var i = 0;i<data['amount'];i++){
                        if(i<=$('td[name="product_'+data['id']+'"]').length){
                            $('td[name="product_'+data['id']+'"]').eq(i)[0].innerHTML='<i class="fas fa-check-circle text-success" style="font-size:30px"></i>'
                        }
                    }
                }
            })
        });


    $(document).on('click', 'button[name="delete_button"]', function () {
        var row = $(this).data('row');
        $('#product_data tr').each(function (i, elem) {
            if (elem.id === 'tr_' + row) {
                totalamount -= product_list[i].has_shop_product.has_product.price;
                product_rfid_list.splice(i, 1);
                product_list.splice(i, 1);
                elem.remove();
                return false;
            }
        });

        $('#product_data').html('');
        product_list.forEach(function (item, index) {
            var product_data = item.has_shop_product.has_product;
            var no = index + 1;
            append_product(no, product_data);
        });
        $('#totalamount').text('HKD ' + totalamount.toFixed(2));
        if (product_list.length === 0) {
            $('#confirm_button').prop('disabled', true);
            $("#confirm_button").addClass("btn-secondary");
            $("#confirm_button").removeClass("btn-success");
        }
    });

    function append_product(no, product_data) {
        $('#product_data').append('<tr id="tr_' + no + '">\n' +
            '        <th scope="row" class="col-1 align-middle text-center">' + no + '</th>\n' +
            '        <td class="col-2 align-middle text-center"><img height="100" src="{{ asset('storage/products/image/') }}/' + product_data.image + '"></th>\n' +
            '        <td class="col-3 align-middle text-center">' + product_data.name + '</td>\n' +
            '        <td class="col-2 align-middle text-center">HKD ' + product_data.price.toFixed(2) + '</td>\n' +
            '        <td class="col-2 align-middle text-center" name="product_'+product_data.id+'"><i class="fas fa-exclamation-circle text-warning" style="font-size:30px"></i></td>\n' +
            '        <td class="col-2 align-middle text-center"><button name="delete_button" onclick="" class="btn btn-danger text-light" data-row="' + no + '">Delete</button></td>\n' +
            '    </tr>');
    }

    function cddisplay() {
        document.getElementById('timespan').innerHTML = count+'s';
    }

    function countdown() {
        // starts countdown
        cddisplay();
        if (count === 0) {
            // time is up
            $('#confirm_modal').modal('hide');
        } else {
            count--;
            t = setTimeout(countdown, 1000);
        }
    }

    function cdpause() {
        // pauses countdown
        clearTimeout(t);
    }

    function cdreset() {
        // resets countdown
        cdpause();
        count = CCOUNT;
        cddisplay();
    }

    function ShowTime(){
        document.getElementById('time').innerText = new Date();
        setTimeout('ShowTime()',1000);
    }

    function isInteger(obj) {
        return obj%1 === 0
    }

</script>

</body>
</html>
