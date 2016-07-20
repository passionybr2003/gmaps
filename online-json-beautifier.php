<?php 
require_once 'common/header.php'; 
?>
<h1>Online JSON Beautifier </h1>
<div class="row" style="margin-bottom: 10px;">
    <div class = "col-sm-6">
        <form class="form-horizontal" id="json-beauty" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div>
                <label>Request</label>
                <textarea rows="15" class="form-control" id="plain_url" name="plain_url" placeholder="Enter text here"><?php echo $_POST['plain_url'] ? $_POST['plain_url'] : ''; ?></textarea>
            </div>
            <br>
            <div>
                <button type="button" class="btn btn-default pull-right" id="beautify" name="beautify"> Beautify  </button>
            </div>
            <label class="errMsg"> </label>
        </form>
    </div>
    <div class = "col-sm-6">
        <label> Response</label><br>
        <div id="response"  style="background-color: #e5e4e4; padding:5px;">
            <div id="jjson" class="jjson">
                  Response empty
            </div>
        </div>
    </div>
</div>
<?php require_once 'common/footer.php'; ?> 
