function note(layerName, text) {
				
				
				
				 
				//rectange for note
				var note1Rect = new Kinetic.Rect({
					fill:'#FCF0AD',
					width:200,
					height: 200,
					shadowColor: 'black',
					shadowBlur: 10,
					shadowOffset: [10,10],
					shadowOpacity: 0.2
				});
				
				//pin button for note
				var pin1 = new Kinetic.Circle({
					x: note1Rect.getX()+15,
					y: note1Rect.getY()+15,
					radius: 10,
					fill: 'red',
					stroke: 'black',
					strokeWidth: 2,
					name: 'pin',
					
				});			
				
				//text for note
				var note1Text = new Kinetic.Text({
					x: note1Rect.getX(),
					y: note1Rect.getY(),
					width: note1Rect.getWidth(),
					height: note1Rect.getHeight(),
					text: text,
					fontSize: 18,
					fontFamily: 'calibri',
					fill: 'black',
					padding: 20,
					align: 'left',
					
				});	
				
				//create group for note
				var note1 = new Kinetic.Group({
					x:10+(Math.random() * (stage.getWidth()-210)),
					y:50+(Math.random() * (stage.getHeight()-250)),
					draggable: true,
					dragBoundFunc: function(pos) {
						if(pos.y<50){
							var newY = 50;
						}
						else if(pos.y>(stage.getHeight()-210)){
							var newY =(stage.getHeight()-210);
						
						}else{
							var newY = pos.y;
						}
						if(pos.x<10){
							var newX = 10;
						}
						else if(pos.x>(stage.getWidth()-210)){
							var newX =(stage.getWidth()-210);
						
						}else{
							var newX = pos.x;
						}							
							
						return {
							y: newY,
							x: newX
						};
					},	
				});
				
				//function to toggle pin
				pin1.on('click', function() {
					if(note1.getDraggable()){
					note1.setDraggable(false);
					pin1.setFill('black');
				}
				else{
					note1.setDraggable(true);
					pin1.setFill('red');
				}
				contentLayer.draw();
				},false);
		
        
    	
				//add elements to group
				note1.add(note1Rect);
				note1.add(note1Text);
				note1.add(pin1);
				layerName.add(note1);
				layerName.draw();
				

			}