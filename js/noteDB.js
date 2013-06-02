var getNotes = function(){
			$.post("get_note.php",{"time":''},function(data){
						
						for(var i in data){
							//alert(data[i]['x_pos']);
							var x = parseInt(data[i]['x_pos']);
							var y = parseInt(data[i]['y_pos']);
							var id = parseInt(data[i]['ID']);
							var pinned = data[i]['pinned'];
							
							createNote(data[i]['message'],x,y,pinned,id);
							
						
						}	
						
					},"json");
		};
		
		
var updateNotes = function(){
		var d = new Date();
			t = d.getTime()/1000;
		$.post("get_note.php",{"time": t},function(data){
			if(data){
			for(var i in data){
				//alert(data[i]);
				var x = parseInt(data[i]['x_pos']);
				var y = parseInt(data[i]['y_pos']);
				var id = parseInt(data[i]['ID']);
				var pinned = data[i]['pinned'];
				r.forEach(function(el){
					if(el.idx == id){
												
						g = el.getGroup();
						g.remove();
						
					}else{
						
					}	
				});					
				
				createNote(data[i]['message'],x,y,pinned,id);
			}
			
				var d = new Date();	
				t = d.getTime()/1000;
				updateNotes();
			}else{
				updateNotes();
			}	
		},"json");
	}	
	
var updatePos = function(x,y,id){
	var d = new Date();
	t = d.getTime()/1000;
	$.post("update_pos.php",{"time": t, "x":x, "y":y, "id":id},function(data){
		//alert('hello');
	},"json");
	

}

var updatePin = function(pinned,id){
	var d = new Date();
	t = d.getTime()/1000;
	$.post("update_pinned.php",{"time": t, "pinned":pinned, "id":id},function(data){
		//alert('hello');
	},"json");
	

}