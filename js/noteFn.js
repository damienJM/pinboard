
	
/**
*function to create a new note at a specific position
*text - the text content of the note
*x,y - initial position of the note on the canvas
**/
createNote = function(text,x,y,pinned,id) { 
		r.newNote(text,x,y,pinned,id).drag(move,dragger,up);
		}

/**
*function to text wrap a raphael text shape
*t - text shape
*width - width of container
**/
textWrap = function(t, width){
	var content = t.attr("text");
	var abc="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	t.attr({"text":abc});
	
	var letterWidth = t.getBBox().width / abc.length;
	
    t.attr({'text-anchor': 'start',"text": content});
    var words = content.split(" "), x=0, s=[];
    for ( var i = 0; i < words.length; i++) {
        var l = words[i].length;
        if(x + (l * letterWidth)>=width) {
            s.push("\n")
            x=0;
        }
        else {
            x+=l*letterWidth;
        }
        s.push(words[i]+" ");
    }
    t.attr({"text": s.join("")});
	//t.attr({"text": x});
	return t;
};

/**
*function to align the text at the top of the container
*t - text shape
*
**/
alignTop = function(t) {
	var y = t.attr("y");
	var b = t.getBBox().height;
	var h = b/2;
	y += h;
	t.attr({'y': y});
	return t;
}	