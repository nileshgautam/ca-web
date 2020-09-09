<style>
    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 320px;
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

    /*Left*/
    .modal.left.fade .modal-dialog {
        left: -320px;
        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
        -o-transition: opacity 0.3s linear, left 0.3s ease-out;
        transition: opacity 0.3s linear, left 0.3s ease-out;
    }

    .modal.left.fade.in .modal-dialog {
        left: 0;
    }

    /*Right*/
    .modal.right.fade .modal-dialog {
        right: -320px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }
</style>


<div class="pcoded-content">
    <div class="row m-0">
        <span class="col-sm-2 offset-10"><a href="<?php echo base_url('User/new_ticket') ?>" class="py-2 mt-2 bg-info badge">Create Ticket</a></span>
    </div>
    <div class="row help-desk">
        <div class="col-xl-9 col-lg-12">
            <div class="ticket-block py-2">
                <div class="row">
                    <div class="col-auto ml-5">
                        <img class="media-object  img-radius" src="<?php echo base_url('usertheme/') ?>assets/images/user.png" alt="Generic placeholder image " height="40">
                    </div>
                    <div class="col-sm-8">
                        <div class="card hd-body border-gray">
                            <div class="row align-items-center">
                                <div class="col-sm-12 border-right pr-0 border-dark">
                                    <div class="card-body inner-center">
                                        <div class="ticket-customer font-weight-bold">John lui</div>
                                        <div class="ticket-type-icon private mt-1 mb-1"><i class="feather ti-lock mr-1 f-14"></i>theme customisation issue</div>
                                        <ul class="list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><i class="ti-user"></i> Piaf able</li>
                                            <li class="list-inline-item"><i class="ti-user"></i>Assigned to Robert alia</li>
                                            <li class="list-inline-item"><i class="feather ti-calendar mr-1 f-14"></i>Updated 22 hours ago</li>
                                            <li class="list-inline-item"><i class="feather ti-message-square mr-1 f-14"></i>9</li>
                                        </ul>
                                        <div class="excerpt border p-2 rounded mt-4">
                                            <h6><i class="ti-user"></i> Last comment from <a href="#">Robert alia:</a></h6>
                                            <p>hello John lui, you need to create "toolbar-options" div only once in a page&nbsp;in your code, this div fill found every "td" tag in your page, just remove those things. and
                                                also in option
                                                button add</p>
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="mr-3 text-muted" data-toggle="modal" data-target="#ticketModal"><i class="feather ti-eye mr-1"></i>View Ticket</a>

                                        </div>

                                        <!-- Button trigger modal
                                        <button type="button" class="btn btn-primary" >
                                            Launch demo modal
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg rounded" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketModalLabel">Ticket No:123456</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row help-desk">
                            <div class="col-xl-12 col-lg-12">
                                <div class="ticket-block py-2">
                                    <div class="row">
                                        <div class="col-auto ml-5">
                                            <img class="media-object  img-radius" src="<?php echo base_url('usertheme/') ?>assets/images/user.png" alt="Generic placeholder image " height="40">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card hd-body border-gray">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-12 border-right pr-0 border-dark">
                                                        <div class="card-body inner-center">
                                                            <div class="ticket-customer font-weight-bold">John lui</div>
                                                            <div class="ticket-type-icon private mt-1 mb-1"><i class="feather ti-lock mr-1 f-14"></i>theme customisation issue</div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        
                                            <form action="" method="post">
                                                <textarea name="" id="" cols="95" rows="2" class="form-control"></textarea>
                                                <div class="py-2">
                                                <a href="#" class="float-right btn-sm btn-primary py-2">Reply</a>
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
        </div>
    </div>
</div>




<!-- Modal -->