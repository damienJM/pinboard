<!DOCTYPE HTML>

<?php
	//$text = $_GET["noteText"];
	//echo $text;
	
	
?>	
<HTML>
	<head>
		<style>
			body {
				margin: 0px;
				padding: 10px;
			}
			#buttons {
				position: absolute;
				left:10px;
				top:0px;
			}
			button	{
				margin-top:10px;
				display: block;
			}	
		</style>	
				<script src="js/kinetic-v4.3.3.min.js"></script>
				<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
				<script src="js/pinboard.js"></script>
		<script>
		
		var getNotes = function(){
			$.post("get_note.php",{"time":''},function(data){
						
						for(var i in data){
							//alert(data[i]);
							new note(contentLayer, data[i]);
						}	
						//document.getElementById('noteText').value = "";
					},"json");
		};
			getNotes();	
			var d = new Date();
			t = d.getTime()/1000;
			//$(document).data('time',t);
			//var time = d.getTime()/1000;
			
				
				
				
					
					
					var updateNotes = function(){
						$.post("get_note.php",{time: t},function(data){
							if(data){
							for(var i in data){
								//alert(data[i]);
								new note(contentLayer, data[i]);
								
								
							}
							
								var d = new Date();	
								t = d.getTime()/1000;
								updateNotes();
							}else{
								updateNotes();
							}	
						},"json");
					}
				// $(function(){
				
					// setInterval(updateNotes,2000);
				// });
			
				
		$(document).ready(function() {
			
			updateNotes();
			
			//function to submit new post to the db
			$('form').submit(function(msg) {  
				//alert($(this).serialize()); // check to show that all form data is being submitted
				$.post("submit_note.php",$(this).serialize(),function(data){
					//alert(data); //post check to show that the mysql string is the same as submit 
					//for(var i in data){
						//alert(data[i]);
						//new note(contentLayer, data[i]);
					//}	
					//updateNotes();
					document.getElementById('noteText').value = "";
				},"json");
				//new note(contentLayer, document.getElementById('noteText').value)
				return false; // return false to stop the page submitting. You could have the form action set to the same PHP page so if people dont have JS on they can still use the form
				
			});
			
			
		});	
		
		</script>
	</head>
	<body>
		<div id="container"></div>
		<form name="submitNote" method="POST" action="">
			
			<textarea id="noteText" name="text" cols="25" rows="5"></textarea>
			
			
			<input type="submit" name="submit" class="button" id="submit_btn" value="send"  />
		<!--
		 <div id="button">
			<button id="add_note" class="submit" onclick= "new note(contentLayer, document.getElementById('noteText').value) ">
				add note
			</button>
		</div> -->	
		</form>
		<script>
	
			var stage = new Kinetic.Stage({
				container: 'container',
				width: 800,
				height: 800
			});
			
			//create content layer
			var contentLayer = new Kinetic.Layer();
			
			//create title text
			var titleText = new Kinetic.Text({
				x: stage.getWidth() / 2,
				y: 15,
				text: 'Group Pinboad',
				fontSize: 30,
				fontFamily: 'Calibri',
				fill: 'blue'
			});
			//offset title text to center
			titleText.setOffset({
				x: titleText.getWidth() / 2
			});	
			
			//pinNote();
			
			
			//display elements
			contentLayer.add(titleText);
			
			stage.add(contentLayer);
			
		
			
		</script>	
	</body>
</html>	