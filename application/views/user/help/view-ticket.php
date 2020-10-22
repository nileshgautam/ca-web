
<div class="pcoded-content">
    <div class="row">
        <div class="col p-5">
            <div class="card">
                <div class="bg-c-blue row m-0 p-3">
                    <h6 class="text-white mb-0 col-sm-10"><i class="fa fa-lock" aria-hidden="true"></i> Private Ticket #<?php echo $replies[0]['ticket_id'] ?></h6>
                    <button class="btn btn-info col-sm-2 btn-sm float-right" data-toggle="modal" data-target="#attachmentModal"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment</button>
                </div>
                <div class="card-body topic-name">
                    <div class="align-items-center">
                        <div class="row col-sm-12 m-0">
                            <h5 class="d-inline-block mb-0 col-sm-10"><?php echo $replies[0]['subject'] ?></h5>
                            <button type="button" class="btn waves-effect pl-0 pr-1 col-sm-2 waves-light btn-secondary text-uppercase" data-toggle="modal" data-target="#reply"><i class="fas fa-comment-alt"></i>Post a reply <span class="badge badge-light m-l-10">R</span></button>
                        </div>
                    </div>
                </div>
                <div class="card-body hd-detail hdd-admin border-bottom">
                    <div class="row">
                        <div class="col-auto text-center">
                            <img class="media-object wid-60 img-radius mb-2" src="<?php echo base_url('usertheme/') ?>assets/images/u.png" alt="Generic placeholder image" height="50">

                        </div>
                        <div class="col">
                            <div class="comment-top">
                                <h4>You <small class="text-muted f-w-400">replied</small></h4>
                                <p><i class="ti-time"></i><?php echo " " . $replies[0]['date_time']; ?></p>
                            </div>
                            <div class="comment-content">
                                <?php echo removeNBSP(html_entity_decode($replies[0]['query'])); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body hd-detail hdd-user border-bottom bg-light">

                    <?php $gReplies = $replies[0]['replies'];
                    for ($i = 0; $i < count($gReplies); $i++) { ?>
                        <div class="row" style="margin-bottom:1.25rem">
                            <?php if ($gReplies[$i]['reply_by'] == 'backend') { ?>
                                <div class="col-auto text-center">
                                    <img class="media-object wid-60 img-radius mb-2" src="<?php echo base_url('usertheme/') ?>assets/images/helpdesk.png" alt="Generic placeholder image " height="50">
                                </div>
                            <?php } else { ?>
                                <div class="col-auto text-center">
                                    <img class="media-object wid-60 img-radius mb-2" src="<?php echo base_url('usertheme/') ?>assets/images/u.png" alt="Generic placeholder image" height="50">
                                </div>
                            <?php } ?>
                            <div class="col">
                                <div class="comment-top">
                                    <h4><?php echo $gReplies[$i]['reply_by'] == 'backend' ? 'Helpdesk' : 'You' ?><small class="text-muted f-w-400"> replied</small></h4>
                                    <p><i class="ti-time"></i><?php echo " " . $gReplies[$i]['timeStamp']; ?></p>
                                </div>
                                <div class="comment-content">
                                    <?php echo removeNBSP(html_entity_decode($gReplies[$i]['reply'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

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
                                                    <input type="text" hidden id="ticketId" name="ticket_id" value="<?php echo $replies[0]['ticket_id'] ?>">
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

<!-- Attachment Modal -->
<!-- Modal -->
<div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: max-content !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Attachment</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="<?php echo base_url('queryUploads/'). $replies[0]['files']?>" download>
    <img src="<?php echo base_url('queryUploads/'). $replies[0]['files']?>" alt="Attachment">
    </a>
      </div>      
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $("#queryReply").trumbowyg();
    })
</script>