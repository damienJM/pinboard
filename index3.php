<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">

<?php
	//$text = $_GET["noteText"];
	//echo $text;
	
	
?>	
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
			
			
				<script src="js/noteFn.js"></script>
				<script src="js/noteDB.js"></script>
				<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
				<script src="js/raphael-drag.js"></script>
				<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.0.0/raphael-min.js"></script>
<script>
					
window.onload = function () {
		
Raphael.el.setGroup = function(group) {
	this.group = group;
};

Raphael.el.getGroup = function(){
	
	return this.group;
};	
		Raphael.fn.newNote = function(text,x,y,pinned,id){
		
		
		var background = this.rect(x,y,200,200).attr({fill: '#FCF0AD'});
		
		var layer = this.rect(x,y,200,200).attr({fill: '#FCF0AD',"fill-opacity":0, cursor: "move"}).data("pinned",pinned)
			
			.mouseup(function(){
				if(layer.data('pinned')==0){
					
					bbox = group.getBBox(x);
					x = bbox.x;
					y = bbox.y;
					id = layer.idx;
					updatePos(x,y,id);
					
				
				}else{
				}			
			
			});
		
						if(pinned == 1){fill = 'red';}
						else{fill ='green';}
						
		var pin = this.circle(x+7,y+7, 5)
					.attr({fill:fill})
					.data("pinned",pinned)
					.click(function(){
						if(this.data('pinned') == 0){
							this.attr({fill: 'red'});
							this.data('pinned','1');
							background.data('pinned','1');
							layer.data('pinned','1');
							text.data('pinned','1');
						}else{
							this.attr({fill: 'green'});
							this.data('pinned','0');
							background.data('pinned','0');
							layer.data('pinned','0');
							text.data('pinned','0');
						}
						updatePin(this.data('pinned'),layer.idx);
			
					});
		var textTemp1 = this.text(x+10, y+10, text).attr({font: 'times', 'text-anchor':'start',"font-size": 20}).data("pinned",pinned);
		
		var textTemp2 = textWrap(textTemp1);
		var text = alignTop(textTemp2);
		
		var group = this.set();
		layer.idx = id;
		
		group.push(background,pin,text,layer);
		layer.setGroup(group);
		
		return layer;
		
		

    
	
  
};
		var w = $('#container').width();
       r = Raphael("container", w, 700);
	   	
        
		
		getNotes();	
};

$(document).ready(function() {
	updateNotes();
	$('form').submit(function() {
		$.post("submit_note.php",$(this).serialize(),function(data){
			
			document.getElementById('noteText').value = "";
		},"json");
		return false;
	});
});	
		</script>
	
	</head>
	<body>
		<div id="head"></div>
			<div id="menu">
				<ul>
					<li><a href="default.asp">Home</a></li>
					<li><a href="news.asp">News</a></li>
					<li><a href="contact.asp">Contact</a></li>
					<li><a href="about.asp">About</a></li>
				</ul>
			
			</div>
		
		<div id="main">
			<div id="container"></div>
			<div id="form_container">
			<form name="submitNote" method="POST" action="">
				<ul>
				<li id="li_15" class="init" >
				<label class="description" for="element_15">Please alert us of any dietary requirements </label>
					<div>
						<textarea id="noteText" name="text" class="element textarea medium"></textarea> 
					</div> 
				</li>
				<li class="buttons">
			    
				<input id="submit_note" class="button_text" type="submit" name="submit" value="Add Note" />
				</li>
				</ul>
			
			</form>
			</div>
		</div>
		<div id="footer"></div>
	
	</body>
</html>	