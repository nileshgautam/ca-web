<?php
if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {
    //Request hash
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if (strcasecmp($contentType, 'application/json') == 0) {
        $data = json_decode(file_get_contents('php://input'));
        $hash = hash('sha512', $data->key . '|' . $data->txnid . '|' . $data->amount . '|' . $data->pinfo . '|' . $data->fname . '|' . $data->email . '|||||' . $data->udf5 . '||||||' . $data->salt);
        $json = array();
        $json['success'] = $hash;
        echo json_encode($json);
    }
    exit(0);
}
?>

<div class="pcoded-content">
    <div class="row container m-0">
        <?php
        // echo '<pre>';
        // print_r($services);
        if (count($packages) > 0) {
            $user = $_SESSION['userInfo'];
            for ($i = 0; $i < count($packages); $i++) {
        ?>
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <a href="<?php echo base_url('ControlUnit/service/') . base64_encode($packages[$i]['serviceId']) ?>">
                            <img class="card-img-top" src="<?php echo base_url('assets/image/services/p1.PNG') ?>" alt="Card image cap"></a>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $packages[$i]['service_name'] ?></h6>
                            <?php
                            $package = '';
                            if (isset($packages[$i]['packages'])) {
                                $package = json_decode($packages[$i]['packages'], true);
                            }
                            ?>
                            <label for="packages" class="mt-3">Packages</label>
                            <!-- <form id="payment_form" class="p-form"> -->
                            <?php if (isset($package[0]['price'])) { ?>
                                <form>
                                    <span><input type="radio" class="mr-1" name="packages" value="<?php echo $package[0]['price'] ?>" id="" checked /> ₹ <?php echo $package[0]['price'] ?></span>
                                    <span><input type="radio" class="mr-1" name="packages" value="<?php echo $package[1]['price'] ?>" id="" /> ₹ <?php echo $package[1]['price'] ?></span>
                                    <span><input type="radio" class="mr-1" name="packages" value="<?php echo $package[2]['price'] ?>" id="" /> ₹ <?php echo $package[2]['price'] ?></span>
                            </form>
                            <?php } else { ?>
                                <span>Service Price</span>
                                <span class="d-block float-right"> ₹ <?php echo $packages[$i]['service_price'] ?></span>
                            <?php } ?>
                            <div class="mt-2">
                                <small>Prices Inclusive of all taxes</small>
                                <form id="<?php echo 'payment_form_' . $i ?>" class="row m-0 clientForm">
                                    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                                    <!-- Response Url -->
                                    <input type="hidden" id="surl" name="surl" value="<?php echo base_url('ControlUnit/sendMessage'); ?>" />
                                    <!-- Merchant Key -->
                                    <input type="text" hidden id="key" name="key" placeholder="Merchant Key" value="LEdYnPa6" />
                                    <!-- Merchant Salt -->
                                    <input type="text" hidden id="salt" name="salt" placeholder="Merchant Salt" value="OkEIcHWWhQ" />
                                    <!-- Hash -->
                                    <input type="text" hidden id="hash<?php echo $i ?>" name="hash" placeholder="Hash" value="" />
                                    <!-- Tranzaction Id -->
                                    <input type="text" hidden class="form-control-plaintext" id="txnid<?php echo $i ?>" name="txnid" placeholder="Transaction ID" value="<?php echo  "TXN" . rand(10000, 99999999) ?>" />
                                    <!-- Amount -->
                                    <input type="text" hidden class="form-control-plaintext" id="amount<?php echo $i ?>" name="amount" placeholder="Amount" value="<?php echo isset($package[0]['price']) ? $package[0]['price'] : $packages[$i]['service_price'] ?>" />
                                    <!-- Service Info -->
                                    <input type="text" hidden class="form-control-plaintext" id="pinfo<?php echo $i ?>" name="pinfo" placeholder="Product Info" value="<?php echo $packages[$i]['service_name'] ?>" />
                                    <!-- User Name -->
                                    <input type="text" hidden class="form-control col-sm-6" required id="fname" name="fname" placeholder="First Name" value="<?php echo $user['name'] ?>" />

                                    <!-- Email -->
                                    <input type="text" hidden class="form-control col-sm-6" required id="email" name="email" placeholder="Email Address" value="<?php echo $user['email'] ?>" />

                                    <!-- Mobile No. -->
                                    <input type="text" hidden class="form-control col-sm-6" required id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<?php echo $user['contact_no'] ?>" />
                                    <!-- State -->
                                    <input type="text" hidden name="state" placeholder="State" class="form-control col-sm-6" required value="<?php echo $user['state'] ?>" />
                                    <input hidden value="<?php echo current_url() ?>" name='redirection' required>
                                    <input hidden value="<?php echo $packages[0]['serviceId'] ?>" id="serviceId" name='serviceId' required>
                                    <input hidden value="<?php echo isset($package[0]['price']) ? $package[0]['price'] : $packages[0]['service_price'] ?>" id="price" name='price' required>
                                    <input hidden value="<?php echo isset($package[0]['price']) ? $package[0]['name'] : 'single' ?>" id="package" name='package' required>
                                    <div class="text-center py-2 col-sm-12">
                                        <button type="submit" id="payBtn" class="c-btn paybtn"><span class="ml-20"> Pay Now</span></button>
                                    </div>
                                    <input id="pay" class="btn btn-info float-right ml-auto" type="hidden" value="Pay" onclick="launchBOLT(); return false;" />
                                </form>
                            </div>

                            <!-- <button class="btn-rounded"></button> -->


                        </div>






                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        let amount = $('input[type="radio"]:checked').val();
        if (amount != undefined && amount != '') {
            $('#amount').val(amount);
        }

        $('input[type="radio"]').on('click', function() {
            let amount = $(this).val();
            $('#amount').val(amount);
        })

    });
</script>
<script type="text/javascript">
    $('.card-body').on('submit', '.clientForm', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let unique = id.split('_');
        let formData = new FormData(document.getElementById(id));
        let url = baseUrl + 'ControlUnit/payment';
        let pData = {
            key: $('#key').val(),
            salt: $('#salt').val(),
            txnid: $(`#${id}`).find(`#txnid${unique[2]}`).val(),
            amount: $(`#${id}`).find(`#amount${unique[2]}`).val(),
            pinfo: $(`#${id}`).find(`#pinfo${unique[2]}`).val(),
            fname: $('#fname').val(),
            email: $('#email').val(),
            mobile: $('#mobile').val(),
            udf5: $('#udf5').val()
        };

        $.ajax({
            url: '',
            type: 'post',
            data: JSON.stringify(pData),
            contentType: "application/json",
            dataType: 'json',
            success: function(json) {
                if (json['error']) {
                    $('#alertinfo').html('<i class="fa fa-info-circle"></i>' + json['error']);
                } else if (json['success']) {
                    $(`#hash${unique[2]}`).val(json['success']);
                    let boltData = {
                        key: $('#key').val(),
                        txnid: pData.txnid,
                        hash: json['success'],
                        amount: pData.amount,
                        firstname: $('#fname').val(),
                        email: $('#email').val(),
                        phone: $('#mobile').val(),
                        productinfo: pData.pinfo,
                        udf5: $('#udf5').val(),
                        surl: $('#surl').val(),
                        furl: $('#surl').val(),
                        mode: 'dropout'
                    }
                    AjaxPost(formData, url, successCallBack, AjaxError);

                    function successCallBack(content) {
                        let result = JSON.parse(content);
                        if (result[0] == 'success') {
                            launchBOLT(boltData)
                        }

                    }
                }
            }
        });


    });

    function launchBOLT(data) {
        bolt.launch(data, {
            responseHandler: function(BOLT) {
                console.log(BOLT.response.txnStatus);
                if (BOLT.response.txnStatus != 'CANCEL') {

                    var fr = '<form action=\"' + $('#surl').val() + '\" method=\"post\">' +
                        '<input type=\"hidden\" name=\"key\" value=\"' + BOLT.response.key + '\" />' +
                        '<input type=\"hidden\" name=\"salt\" value=\"' + $('#salt').val() + '\" />' +
                        '<input type=\"hidden\" name=\"txnid\" value=\"' + BOLT.response.txnid + '\" />' +
                        '<input type=\"hidden\" name=\"amount\" value=\"' + BOLT.response.amount + '\" />' +
                        '<input type=\"hidden\" name=\"productinfo\" value=\"' + BOLT.response.productinfo + '\" />' +
                        '<input type=\"hidden\" name=\"firstname\" value=\"' + BOLT.response.firstname + '\" />' +
                        '<input type=\"hidden\" name=\"email\" value=\"' + BOLT.response.email + '\" />' +
                        '<input type=\"hidden\" name=\"udf5\" value=\"' + BOLT.response.udf5 + '\" />' +
                        '<input type=\"hidden\" name=\"mihpayid\" value=\"' + BOLT.response.mihpayid + '\" />' +
                        '<input type=\"hidden\" name=\"status\" value=\"' + BOLT.response.status + '\" />' +
                        '<input type=\"hidden\" name=\"hash\" value=\"' + BOLT.response.hash + '\" />' +
                        '</form>';
                    var form = jQuery(fr);
                    jQuery('body').append(form);
                    form.submit();
                }
            },
            catchException: function(BOLT) {
                alert(BOLT.message);
            }
        });
    }
</script>