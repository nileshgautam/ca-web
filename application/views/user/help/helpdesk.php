
<div class="pcoded-content">
    <div class="row m-0">
        <?php if (isset($_SESSION['userInfo']) && $_SESSION['userInfo']['role'] != 'Backend') { ?>
            <span class="col-sm-2 offset-9 mt-2 p-2 bg-info text-center rounded"><a href="#" class="rounded text-white" data-toggle="modal" data-target="#newTicket">Create Ticket</a></span>
        <?php } ?>
    </div>
    <div class="row help-desk">
        <?php
        if ($tickets != 0) {
            // echo '<pre>';
            //        print_r($tickets);die;
            for ($i = 0; $i < count($tickets); $i++) { ?>
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
                                                <?php if (isset($tickets[$i]['name'])) { ?>
                                                    <div class="row m-0">
                                                        <div class="ticket-customer p-0 col-sm-8 font-weight-bold">From : <?php echo $tickets[$i]['name']; ?></div>
                                                        <div class="col-sm-4"><i class="ti-time"></i><?php echo " " . $tickets[$i]['date_time']; ?></div>
                                                    </div>

                                                <?php } else { ?>
                                                    <div class="row m-0">
                                                        <div class="ticket-customer p-0 col-sm-8 font-weight-bold"><?php echo $_SESSION['userInfo']['name']; ?></div>
                                                        <div class="col-sm-4"><i class="ti-time"></i><?php echo " " . $tickets[$i]['date_time']; ?></div>
                                                    </div>

                                                <?php } ?>
                                                <div class="ticket-type-icon private row m-0 mt-1 mb-1">
                                                    <div class="col-sm-2 p-0">
                                                        <i class="feather ti-lock mr-1 f-14"></i> Subject :
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <?php echo $tickets[$i]['subject']; ?>
                                                    </div>
                                                </div>

                                                <div class="query-card row m-0">
                                                    <div class="col-sm-2 p-0">
                                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i> Query :
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <?php echo removeNBSP(html_entity_decode($tickets[$i]['query'])); ?>
                                                    </div>
                                                </div>
                                                <div class="excerpt border p-2 rounded mt-4" tId="<?php echo $tickets[$i]['ticket_id'] ?>">
                                                
                                                    <h6><i class="fa fa-user-circle-o" aria-hidden="true"></i> Last comment</h6>
                                                    <?php
                                                    $len = count($tickets[$i]['replies']) - 1;
                                                    echo " " . trim(html_entity_decode($tickets[$i]['replies'][$len]['reply'])); ?>
                                                </div>
                                                <div class="mt-2">
                                                <?php if (isset($tickets[$i]['name'])) { ?>
                                                    <a href="<?php echo base_url('BackendTeam/view_ticket/').base64_encode($tickets[$i]['ticket_id']) ?>" class="mr-3 text-muted"></i>View Ticket</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('User/view_ticket/').base64_encode($tickets[$i]['ticket_id']) ?>" class="mr-3 text-muted"></i>View Ticket</a>
                                                <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php }
        } ?>
    </div>


</div>
  




<!-- Modal View reply -->

<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="replyLabel">
        <div class="modal-dialog" role="document" style="width:100%;max-width:953px">
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
                            <div class="col-sm-11">
                                <div class="card hd-body border-gray">
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 border-right pr-0 border-dark">
                                            <div class="card-body inner-center">
                                                <form action="<?php echo base_url('User/reply') ?>" method="post">
                                                    <input type="text" hidden id="ticketId" name="ticket_id" value="">
                                                    <textarea name="reply" id="queryReply" class="form-control"></textarea>
                                                    <div class="py-2">
                                                        <button type="submit" class="float-right btn-sm btn-primary py-2 rounded mb-2">Reply</button>
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
        <div class="modal-dialog" role="document" style="width:100%;max-width:953px">
            <div class="modal-content">

                <div class="container">
                    <div class="col-md-12 text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="d-inline-block mb-2 mt-2 font-weight-500 ">Create New Ticket</h5>
                    </div>

                    <div class="card">
                        <form action="<?php echo base_url('User/new_ticket') ?>" method="post" enctype="multipart/form-data" class="p-3">

                            <div class="form-group mb-2">
                                <label>Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control">
                            </div>
                            <label>Description</label>
                            <div class="form-group mb-2">
                                <textarea name="description" id="description" cols="96" rows="10" class="form-control"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label>Add Atachment</label>
                                <input type="file" class="form-control" name="file" id="file">
                            </div> -->
                            <div class="form-group">
                                <input type="submit" value="Submit" class="form-control rounded btn-sm btn-primary col-sm-1 float-right">
                                <input type="text" hidden name="type" value="query" required>
                                <label for="msgAttachmet" class="btn btn-outline-primary btn-sm mr-2 float-right"><i class="fa fa-paperclip" aria-hidden="true"></i> Add Attachment</label>
                                <input type="file" hidden name="sideImage" id='msgAttachmet'>
                            </div>
                        </form>
                    </div>
                </div>



            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


</div><!-- container -->

<script>
    $(document).ready(function() {
        $("#description").trumbowyg();
        $("#queryReply").trumbowyg();
    })
</script>