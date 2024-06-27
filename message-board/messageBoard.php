<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>forum</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="messageBoard.js"></script>
<link type="text/css" rel="stylesheet" href="messageBoard.css">
</head>
<body>

<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reply Question</h4>
      </div>
      <div class="modal-body">
        <form name="frm1" method="post">
          <input type="hidden" id="commentid" name="Rcommentid">
          <div class="form-group">
            <label for="usr">Write your name:</label>
            <input type="text" class="form-control" name="Rname" required>
          </div>
          <div class="form-group">
            <label for="comment">Write your reply:</label>
            <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
          </div>
          <input type="button" id="btnreply" name="btnreply" class="btn2 btn-primary" value="Reply">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="button-back-to-help">
    <a href="../help.html">&lt; Back to Help</a>
  </div>

  <div class="text-center">
    <img src="../images/oLogo.png" width="350" height="190">
  </div>

  <div class="panel panel-default" style="margin-top:15px">
    <div class="panel-body">
      <h3>Community Forum</h3>
      <hr>
      <form name="frm" method="post" action="register.php">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
        <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="form-group">
          <label for="usr">Write your name:</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
          <label for="comment">Write your question:</label>
          <textarea class="form-control" rows="5" name="msg" required></textarea>
        </div>
        <input type="button" id="butsave" name="save" class="btn sendbtn" value="Send">
      </form>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-body1">
      <h4>Recent Questions</h4>
      <table class="table" id="MyTable" style="background-color: #fff6ec; border:0px;border-radius:10px">
        <tbody id="record">
        </tbody>
      </table>
    </div>
  </div>

</div>

</body>
</html>
