<?php if (isset($details) && isset($service) && !empty($details) && !empty($service)) {
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

    function getCallbackUrl()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        // return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
        return base_url('ControlUnit/payuMoneyResponse');
    }
?>
    <section class="container pos-unset">
        <div class="row pos-unset">
            <div class="card col-sm-9 mt-3 card-custom pos-unset p-0">
                <div class="card-body">
                    <div class="main">
                        <div>
                            <img style="height:58px;" src="<?php echo base_url() ?>assets/image/payumoney.png" />
                        </div>
                        <form action="#" id="payment_form" class="row m-0">
                            <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                            <!-- Response Url -->
                            <input type="hidden" id="surl" name="surl" value="<?php echo base_url('ControlUnit/sendMessage'); ?>" />
                            <!-- Merchant Key -->
                            <input type="text" hidden id="key" name="key" placeholder="Merchant Key" value="LEdYnPa6" />
                            <!-- Merchant Salt -->
                            <input type="text" hidden id="salt" name="salt" placeholder="Merchant Salt" value="OkEIcHWWhQ" />
                            <!-- Hash -->
                            <input type="text" hidden id="hash" name="hash" placeholder="Hash" value="" />

                            <div class="form-group row col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">Transaction/Order ID:</label>
                                <div class="col-sm-8 pos-unset">
                                    <input type="text" readonly class="form-control-plaintext" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "TXN" . rand(10000, 99999999) ?>" />
                                </div>

                            </div>

                            <div class="form-group row col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">Amount:</label>
                                <div class="col-sm-8 pos-unset"><input type="text" readonly class="form-control-plaintext" id="amount" name="amount" placeholder="Amount" value="<?php echo $details[0]['amount'] ?>" /></div>
                            </div>

                            <div class="form-group row pos-unset col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">Service:</label>
                                <div class="col-sm-8 pos-unset"><input type="text" readonly class="form-control-plaintext" id="pinfo" name="pinfo" placeholder="Product Info" value="<?php echo $service[0]['service_name'] ?>" /></div>
                            </div>

                            <div class="form-group row col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">User Name:</label>
                                <div class="col-sm-8 pos-unset"><input type="text" readonly class="form-control-plaintext" id="fname" name="fname" placeholder="First Name" value="<?php echo $details[0]['name'] ?>" /></div>
                            </div>

                            <div class="form-group row col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">Email ID:</label>
                                <div class="col-sm-8 pos-unset"><input type="text" readonly class="form-control-plaintext" id="email" name="email" placeholder="Email ID" value="<?php echo $details[0]['email'] ?>" /></div>
                            </div>

                            <div class="form-group row col-sm-12 pos-unset mb-0">
                                <label class="col-sm-4 pos-unset col-form-label">Mobile/Cell Number:</label>
                                <div class="col-sm-8"><input type="text" readonly class="form-control-plaintext" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<?php echo $details[0]['number'] ?>" /></div>
                            </div>

                            <div class="form-group row pos-unset col-sm-12">
                                <input class="btn btn-info float-right ml-auto" type="submit" value="Pay" onclick="launchBOLT(); return false;" /></div>
                        </form>
                    </div>                    

                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script type="text/javascript">
  
    $(document).ready(function() {
        $.ajax({
            url: 'payuMoney',
            type: 'post',
            data: JSON.stringify({
                key: $('#key').val(),
                salt: $('#salt').val(),
                txnid: $('#txnid').val(),
                amount: $('#amount').val(),
                pinfo: $('#pinfo').val(),
                fname: $('#fname').val(),
                email: $('#email').val(),
                mobile: $('#mobile').val(),
                udf5: $('#udf5').val()
            }),
            contentType: "application/json",
            dataType: 'json',
            success: function(json) {
                if (json['error']) {
                    $('#alertinfo').html('<i class="fa fa-info-circle"></i>' + json['error']);
                } else if (json['success']) {
                    $('#hash').val(json['success']);
                }
            }
        });
    });
    
</script>
<script type="text/javascript">
   
    function launchBOLT() {
        bolt.launch({
            key: $('#key').val(),
            txnid: $('#txnid').val(),
            hash: $('#hash').val(),
            amount: $('#amount').val(),
            firstname: $('#fname').val(),
            email: $('#email').val(),
            phone: $('#mobile').val(),
            productinfo: $('#pinfo').val(),
            udf5: $('#udf5').val(),
            surl: $('#surl').val(),
            furl: $('#surl').val(),
            mode: 'dropout'
        }, {
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