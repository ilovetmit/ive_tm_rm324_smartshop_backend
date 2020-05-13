<!DOCTYPE html>
<html>

<head>
    <title>{{config("constants.WORDINGS.HTML_TITLE")}}</title>
    <link rel="shortcut icon" href="{{asset('images/S-Shop_logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @media (min-width: 1300px) {
            .container {
                max-width: 95%;
            }
        }

        .modal-body > .text-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .total {
            font-weight: 900;
        }
    </style>
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
            <h1 class="mt-5">Product Checkout</h1>
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
                    <p class="card-text" id="time"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-7">
            <div class="table-responsive-xl">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="align-middle">#</th>
                        <th class="align-middle">Product Image</th>
                        <th class="align-middle">Product Name</th>
                        <th class="align-middle">Product Price</th>
                        <th class="text-center">Qty.</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody id="product_data">
                    <!-- load product data -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="5" class="text-right">Total Amount:</th>
                        <th class="text-center" id="totalamount">HKD 0.00</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <button id="confirm_button" type="button" class="btn btn-secondary text-light m-auto w-25">Confirm</button>
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
                {{-- todo change to one_time_password--}}
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
<script>
    var product_rfid_list = [];
    var product_list = [];
    var totalamount = 0;
    const qrcode_img = "https://chart.apis.google.com/chart?cht=qr&chs=400x400&chld=L|0&chl=";

    var CCOUNT = 120;
    var t, count;

    $('#confirm_button').click(function () {
        if (product_rfid_list.length > 0) {
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
                    } else {
                        console.log(xhr.status);
                        $('#fail_modal').modal('show');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                    $('#fail_modal').modal('show');
                }
            });

        }
    });


    window.Echo.channel('smartshop_database_rfid_scan')
        .listen('RFID', (e) => {
            // console.log(e.data);
            // console.log(e.data.has_shop_product.has_product);
            if (!product_rfid_list.includes(e.data.rfid_code)) {
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
            $("#confirm_button").addClass("btn-secondary");
            $("#confirm_button").removeClass("btn-success");
        }
    });

    function append_product(no, product_data) {
        $('#product_data').append('<tr id="tr_' + no + '">\n' +
            '        <th>' + no + '</th>\n' +
            '        <th><img height="100" src="' + product_data.image + '"></th>\n' +
            '        <td>' + product_data.name + '</td>\n' +
            '        <td>HKD ' + product_data.price.toFixed(2) + '</td>\n' +
            '        <td class="align-middle text-center">1</td>\n' +
            '        <td class="text-center"><button name="delete_button" onclick="" class="btn btn-danger text-light" data-row="' + no + '">Delete</button></td>\n' +
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
            $('#confirm_modal').modal('toggle');
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

</script>

</body>
</html>
