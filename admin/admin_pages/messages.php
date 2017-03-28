<h1 class="page-header">Messages</h1>
<div class="container-fluid">
                <div class="row">
<?php

    $msgResult = $conn->query("SELECT `id`, `from_first_name`, `from_last_name` `from_email`, `subject`, `message`, `time_send` 
                               FROM `messages` 
                               ORDER BY `time_send` 
                               DESC");
    while($row = $msgResult->fetch_assoc()){
        echo ' 
                <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row">
                        <h3 class="col-md-8 panel-title">'.$row['subject'].'</h3>
                        <p class="col-md-4 small text-muted text-right">'.$row['time_send'].'</p>
                    </div>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                        <p class="col-md-4"><strong>From: </strong>'.$row['from_first_name'].'  '.$row['from_last_name'].'</p>
                        <p class="text-right col-md-8"><strong>Email: </strong>'.$row['from_email'].'</p>
                    </div>
                    <div class="row customButtons">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#'.$row['id'].'">
                        Read Message
                    </button>
                    <button type="button" class="btn btn-danger btn-sm pull-right">
                        Delete Message
                    </button>
                    </div>
                    <div class="modal fade" id="'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">'.$row['subject'].'</h4>
                        </div>
                        <div class="modal-body">
                            <p>'.$row['message'].'</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Respond</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    </div>
                 </div>
                 </div>';
    }

?>
                </div>
</div