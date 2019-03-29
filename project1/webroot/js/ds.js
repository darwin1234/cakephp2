var HTML = "";
//
$(function(){
	var Feeds = {
		loadFeeds: function(){
			
			$.ajax({
					'url': 'http://project1.local/users/JsonResult',
					'dataType':'json',
					'success': function(e){
						 HTML ="";
						 var result = JSON.parse(JSON.stringify(e));
							for(var i = 0; i<result.length; i++){
								HTML += "<div class='singlefeeds'>" + result[i].text ;
								HTML += "<a href='#'>Like</a>";
								HTML += "</div>";
								
							}

						 $("#newfeeds").html(HTML);
					}
					
			});
			
		},
		addFeeds: function(){
			$("#addNewFeeds").on("submit", function(e){
				var FormData = $(this).serialize();
				$.ajax({
					'url': 'http://project1.local/users/newpost',
					'type': 'POST',
					'data': FormData,
					'success': function(e){
						console.log(e);
						 /*HTML ="";
						 var result = JSON.parse(JSON.stringify(e));
						
						 for(var i = 0; i<result.length; i++){
							 
							HTML += "<p>" + result[i].text + "</p>";
						 }
						// feeds.innerHTML = "asdadsasdasasdasdasdasd";
						 //console.log(result[0].text);
						 $("#newfeeds").html(HTML);
						 //console.log($.parseJSON(e));
						//var eee = $.parseJSON(e);*/
					}
					
				});
				e.preventDefault();
			});
		},
		deleteFeeds: function(){
			
			
		},
		editFeeds: function(){
			
		},
		uploadimage(){
			
			$("#profileImage").click(function(e) {
				$("#imageUpload").click();
			});		
			
			$("#imageUpload").change(function(){
				var CRSF = document.getElementById("CRSF");
				Feeds.readURL(this);
				
				//console.log(IMAGE);
				
			});
		},
		readURL: function(input){
			
			if (input.files && input.files[0]) {
				var reader = new FileReader();
			     reader.onload = function(e) {
					var IMAGE = e.target.result;
					//console.log(IMAGE);
					var FILE = {'title':'YEAH BA!', 'imageFile': IMAGE, '_csrfToken': CRSF.value};
					$.ajax({
						'url': 'http://project1.local/users/uploadimage',
						'type': 'POST',
						'data': FILE,
						'success': function(e){
							console.log(e);
						},'error': function(){
							console.log('not working');
						}
						
					});
					
				}
				reader.readAsDataURL(input.files[0]);
			}
			
		}
	}
	setInterval(function(){
	 Feeds.loadFeeds();	
	},500);
	
	Feeds.addFeeds();
	Feeds.uploadimage();

});
/*

$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});*/
