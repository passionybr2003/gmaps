$(function(){
    $("#latlong-form").validate({
        rules: {
            address: {
                required: true
            } 
        },
        messages: {
            address: {
                required: "Enter address"
            } 
        }
    });
    
    
    $("#reverse-geo").validate({
        rules: {
            lat: {
                required: true,
                number:true
            },
            long: {
                required: true,
                number:true
            }
        },
        messages: {
            lat: {
                required: "Enter Latitude",
                number:"Enter numerics only"
            },
            long: {
                required: "Enter Longitude",
                number:"Enter numerics only"
            } 
            
        }
    });
    
    $("#pin-form").validate({
        rules: {
            address: {
                required: true
            } 
        },
        messages: {
            address: {
                required: "Enter address"
            } 
            
        }
    });
    
    
    $("#img-resize").validate({
        rules: {
            img: {
                required: true,
                extension: "png|jpg|jpeg|bmp"
            },
            quality: {
                required: true,
                digits:true,
                min:10,
                max:100
            }
        },
        messages: {
            img: {
                required: "Upload Image",
                extension: "Please upload JPG,JPEG,PNG,BMP images only"
            },
            quality: {
                required: "Enter quality",
                digits:"Enter numerics only",
                min:"Minimum value is 10 only",
                max: "Maximum value is 100 only"
            } 
            
        }
    });
    
    $("#md-gen").validate({
        rules: {
            plain_url: {
                required: true
            } 
        },
        messages: {
            plain_url: {
                required: "Enter text"
            } 
            
        }
    });
    $("#md-gen,#base-gen,#sha-gen,#url-enc-dec,#json-beauty").validate({
        rules: {
            plain_url: {
                required: true
            } 
        },
        messages: {
            plain_url: {
                required: "Enter text"
            } 
            
        }
    });
    
    $('#beautify').on('click',function(){
        var inPut = document.getElementById('plain_url').value;
        if(inPut !== ''){
            $('.errMsg').html("");
            try {
                var json = JSON.parse(inPut);
                $("#jjson").jJsonViewer(json);
            }
            catch(err) {
                $(".errMsg").html(err.message);
            } 
        } else {
            $('.errMsg').html("Enter text");
        }
    });   
    
    
});
