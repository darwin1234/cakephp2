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
			
		}
	}
	setInterval(function(){
	 Feeds.loadFeeds();	
	},500);
	
	Feeds.addFeeds();

});
