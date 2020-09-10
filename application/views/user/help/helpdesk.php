<style>
    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 520px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content,
    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body,
    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }


    /*Right*/
    .modal.right.fade .modal-dialog {
        right: 0px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }

    p{
        font-size: 16px;
    }
</style>


<div class="pcoded-content">
    <div class="row m-0">
        <span class="col-sm-2 offset-9 mt-2 p-2 bg-info text-center rounded"><a href="#" class="rounded text-white" data-toggle="modal" data-target="#newTicket">Create Ticket</a></span>
    </div>
    <div class="row help-desk">
        <div class="col-xl-9 col-lg-12">
            <div class="ticket-block py-2">
                <div class="row">
                    <div class="col-auto ml-5">
                        <img class="media-object  img-radius" src="<?php echo base_url('usertheme/') ?>assets/images/user.png" alt="Generic placeholder image " height="40">
                    </div>
                    <div class="col-sm-10">
                        <div class="card hd-body border-gray">
                            <div class="row align-items-center">
                                <div class="col-sm-12 border-right pr-0 border-dark">
                                    <div class="card-body inner-center">
                                        <div class="ticket-customer font-weight-bold">[Customer name]</div>
                                        <div class="ticket-type-icon private mt-1 mb-1"><i class="feather ti-lock mr-1 f-14"></i>[Subject]</div>
                                        <div><i class="ti-time"></i>[update date time] [status]</div>
                                        <div class="excerpt border p-2 rounded mt-4" data-toggle="modal" data-target="#reply">
                                            <h6>

                                                <i class="feather ti-headphones"></i> Last comment from <a href="#">Helpdesk</a></h6>
                                            <p>hello John lui, you need to create "toolbar-options" div only once in a page&nbsp;in your code, this div fill found every "td" tag in your page, just remove those things. and
                                                also in option
                                                button add</p>
                                        </div>
                                        <div class="mt-2">
                                            <a href="<?php echo base_url('User/view_ticket') ?>" class="mr-3 text-muted"></i>View Ticket</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>





<!-- Modal View reply -->

<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="replyLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="replyLabel"></h4>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-auto">
                                <img class="media-object  img-radius" src="<?php echo base_url('usertheme/') ?>assets/images/user.png" alt="Generic placeholder image " height="40">
                            </div>
                            <div class="col-sm-10">
                                <div class="card hd-body border-gray">
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 border-right pr-0 border-dark">
                                            <div class="card-body inner-center">
                                                <form action="" method="post">
                                                    <textarea name="" id="" cols="95" rows="2" class="form-control"></textarea>
                                                    <div class="py-2">
                                                        <a href="#" class="float-right btn-sm btn-primary py-2 rounded mb-2">Reply</a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


</div><!-- container -->

<!-- Modal new ticket -->

<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="newTicket" tabindex="-1" role="dialog" aria-labelledby="newTicketLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="container">
                    <div class="col-md-12 text-center">
                        <h5 class="d-inline-block mb-2 mt-5 font-weight-500 ">Create New Ticket</h5>
                    </div>

                    <div class="card">
                        <form action="" class="p-3">

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <label>Description</label>
                            <div class="form-group">
                                <textarea name="" id="" cols="96" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Add Atachment</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="form-group">
                                <a class="form-control btn-sm btn-danger rounded col-sm-4 float-right text-center text-white" data-dismiss="modal" aria-label="Close">Cancel</a>
                                <input type="submit" value="Submit" class="form-control rounded btn-sm btn-primary col-sm-4">
                            </div>


                        </form>
                    </div>


                </div>



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


</div><!-- container -->