<?php 
require_once 'common/header.php'; 
if(isset($_POST['encode_url'])){
    $plainUrl = trim($_POST['plain_url']);
    $encodedUrl = md5($plainUrl);
}

?>
<h1>Online md5 generator </h1>
<div class="row" style="margin-bottom: 10px;">
    <form class="form-horizontal" id="md-gen" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class = "form-group">
            <div class = "col-sm-offset-2 col-sm-6">
                <label>Request</label>
                <textarea rows="5" class="form-control" id="plain_url" name="plain_url" placeholder="Enter plain url"><?php echo $_POST['plain_url'] ? $_POST['plain_url'] : ''; ?></textarea>
            </div>
        </div>
        <div class = "form-group">
            <div class = "col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-default pull-left" name="encode_url">Make md5 </button>
            </div>
        </div> 
    </form>
    <div class = "form-group">
        <div class = "col-sm-offset-2 col-sm-6">
            <label>Response</label>
            <textarea rows="5" class="form-control" id="encoded_txt" name="encoded_txt"><?php echo $encodedUrl ? $encodedUrl : $decodedUrl; ?></textarea>
        </div>
    </div>
</div>
    

<?php require_once 'common/footer.php'; ?> 


