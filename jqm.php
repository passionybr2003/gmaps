<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script>
$(document).on("pagecreate","#pageone",function(){
  $("#email").on("tap",function(){
    $(this).triggger('click');
  });         
              
});
window.onload = function(){
       $('#email').trigger('tap');
}
</script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>The tap Event</h1>
  </div>

  <div data-role="main" class="ui-content">
    
      <input type="text" name="email" id="email" autofocus />
      
      
    
  </div>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>
