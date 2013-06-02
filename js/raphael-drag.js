var dragger = function () {
      
		if(this.data("pinned")==0){
		
		
		this.group = this.getGroup();
		this.previousDx = 0;
		this.previousDy = 0;
		
		
		}else{}
	},
        move = function (dx, dy) {
		if(this.data("pinned")==0){
		
          
			
			txGroup = dx-this.previousDx;
			tyGroup = dy-this.previousDy;
			
			this.group.translate(txGroup,tyGroup);
			
			
			this.previousDx = dx;
			this.previousDy = dy;
			
			}else{}
		},
        up = function () {
			
		}
