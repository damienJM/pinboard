<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">

<?php
	/////*************///////////
	////USING JUST SVG NOT RAPHAEL////////////
	/////////***************//////////
	//$text = $_GET["noteText"];
	//echo $text;
	
	
?>	
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
			
			
				
				<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
				
				<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.0.0/raphael-min.js"></script>
<script>
			var viewportLeft;
			var viewportRight;
			var viewportTop;
			var viewportBottom;
			var selectedElement;
			var canvasState;
			var elements = new Object();
			function supportsSvg() {
				try {
					if (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") == false) {
						return false
					}
					var c = navigator.userAgent;
					if (c.indexOf("Safari/533") > 0) {
						return false
					}
					if (c.indexOf("Safari/531") > 0) {
						return false
					}
				} catch (b) {}
			}		
			$(document).ready(function () {
				if (supportsSvg() == false) {
					window.location.href = "/upgradebrowser";
					return
				}
				
				initViewport();
			});
			function AddRect(a, b, c, h, e, f, g) {
				var d = document.createElementNS("http://www.w3.org/2000/svg", "rect");
				d.setAttributeNS(null, "x", a);
				d.setAttributeNS(null, "y", b);
				d.setAttributeNS(null, "width", c);
				d.setAttributeNS(null, "height", h);
				d.setAttributeNS(null, "fill", e);
				d.setAttributeNS(null, "stroke", f);
				d.setAttributeNS(null, "opacity", g);
				return d
			}
			function initViewport() {
				//$("#svg_main").droppable({
					//drop: HandleDrop
				//});
				//$("#viewport").mousedown(HandleClick);
				//$("#viewport").mouseup(HandleExit);
				//$("#viewport").mousemove(HandleMove);
				//$("#viewport").mouseleave(HandleLeave);
				//$(document).keydown(HandleKey);
				SetViewPortDimensions();
				initCanvas();
			
			}
			function SetViewPortDimensions() {
				viewport = $("#viewport");
				viewportLeft = viewport.offset().left;
				viewportTop = viewport.offset().top;
				viewportRight = viewport.width() + viewportLeft;
				viewportBottom = viewport.height() + viewportTop;
				viewport.attr("viewBox","viewportLeft,viewportTop,viewport.width(),viewport.height()");
			}
			function initCanvas() {
				var j = document.createElementNS("http://www.w3.org/2000/svg","g");
				var width = 800;
				var height = 600;
				var id = "canvas";
				var xpos = (viewport.width()-width)/2;
				var ypos = (viewport.height()-height)/2;
				b = AddRect(xpos,ypos,width,600,"white","none",1);
				
				j.setAttributeNS(null,"id",id);
				j.appendChild(b);
				$("#viewport").append(j);
				//var k = new elementState(id);
				//canvasState = k;
				
			}
			function elementSelected(c){
				MouseDown = true;
				if(c.which == 0){
					alert("which = 0")
				}
				if (selectedElement != null){
					if(selectedElement.attr("id") == $(this).attr("id")){
						
					}
				}
				c.stopPropagation();		//stops propagation down to lower level from group
				selectedElement = $(this);
				MouseMoveOffsetX = c.pageX;
				MouseMoveOffsetY = c.pageY;
				getSelectedElement().SetActive(true);
				updateElement();
			}
			function updateActiveElement() {
				var b = getSelectedElement();
				if(b == null){
					return;
				}
				b.updateElement();
			}	
			function getSelectedElement() {
				if(selectedElement == null) {
					return null;
				}
				var id = selectedElement.attr("id");
				if(id == "canvas"){
					return canvasState;
				}else{
					return elements[id];
				}
			}
			function elementState(b) {
				this.Id = b;
				this.X = 0;
				this.Y = 0;
				this.ScaleX = 0;
				this.ScaleY = 0;
				this.Angle = 0;
				this.Selected = false;
				this.updateElement = function () {
					//this.clearScaleBox();
					var i = document.getElementById(this.Id);
					var j = m.getAttribute("id");
					var k = document.getElementById(j +"_scale");
					var l = this.GetBBox(false);
					var m = this.ScaleX;
					var n = this.ScaleY;
					var o = 0;
					var p = 0;
					var a = l.width/2;
					var b = l.width/2;
					k.setAttribute("transform","scale("+m+","+n+")");
					var q = "translate("+(this.X+o)+","+(this.Y+p)+")";
					q+="rotate("+this.Angle+","+a+","+d+")";
					i.setAttribute("transform",q);
				}
				this.MoveTo = function (c, d) {
					this.X = c;
					this.Y = d
				};
				this.MoveDistance = function (c, d) {
					this.X += c;
					this.Y += d
				};
				this.RotateElement = function (c) {
					this.Angle += c;
					this.Angle %= 360
				};
				this.SetScale = function (c, d) {
					this.ScaleX = c;
					this.ScaleY = d
				};
				this.ChangeScale = function (c) {
					this.ScaleX *= c;
					this.ScaleY *= c
				};
				this.ChangeScaleXY = function (c, d) {
					this.ScaleX *= c;
					this.ScaleY *= d
				};
				this.Resize = function (c, d) {
					this.ScaleX += c;
					this.ScaleY += d
				};
				this.GetBBox = function () {
					return this.GetBBox(true)
				};
				this.GetBBox = function (d) {
					this.ClearSelectionBox();
					var c = document.getElementById(this.Id).getBBox();
					if (this.ActivelySelected && d) {
						//this.DrawSelectionBox()
					}
					return c
				};
				this.SetActive = function (c) {
					this.Selected = c
				};
			}	
			
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
			<div id="svg_main" class="svg_main">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#"
                    xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns:svg="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    id="viewport" width="99%" height="800"  style="border: 3px solid black; background-color: Gainsboro; margin-left:auto; margin-right:auto;">
					
						
					
			


			
				</svg>
			
			
			</div>
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