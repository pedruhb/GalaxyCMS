function formatText(el,tagstart,tagend,idcolor){var selectedText=document.selection?document.selection.createRange().text:el.value.substring(el.selectionStart,el.selectionEnd);if(tagstart=="color"){var selectElmt=document.getElementById(idcolor);var lacouleur=selectElmt.options[selectElmt.selectedIndex].value;if(lacouleur=="Couleurs")
return false;var newText='['+ tagstart+'='+ lacouleur+']'+ selectedText+'[/'+ tagend+']';$("#"+ idcolor).val("Couleurs");}
else
var newText='['+ tagstart+']'+ selectedText+'[/'+ tagend+']';if(document.selection){el.focus();if(tagstart=="color")
var st=getCaret(el)+ tagstart.length+ 1+ lacouleur.length+ 2;else
var st=getCaret(el)+ tagstart.length+ 2;document.selection.createRange().text=newText;var range=el.createTextRange();range.collapse(true);range.moveStart('character',st);range.moveEnd('character',selectedText.length);range.select();el.focus();}else{if(tagstart=="color"){var st=el.selectionStart+ tagstart.length+ 1+ lacouleur.length+ 2;var end=el.selectionEnd+ tagstart.length+ 1+ lacouleur.length+ 2;}else{var st=el.selectionStart+ tagstart.length+ 2;var end=el.selectionEnd+ tagstart.length+ 2;}
el.value=el.value.substring(0,el.selectionStart)+ newText+ el.value.substring(el.selectionEnd,el.value.length);el.focus();el.setSelectionRange(st,end)}}
function formatPreview(content){var format=[/\[B\](.*?)\[\/B\]/ig,/\[I\](.*?)\[\/I\]/ig,/\[U\](.*?)\[\/U\]/ig,/\[img=\](.*?)\[\/img\]/ig,/\[url=(.*?)\](.*?)\[\/url\]/ig,/\[color=(.*?)\](.*?)\[\/color\]/ig,/\[youtube=(.*?)\]\[\/youtube\]/ig];var formatReplace=['<span style="font-weight:600;">$1</span>','<span style="font-style:italic;">$1</span>','<span style="text-decoration:underline;">$1</span>','<img src="$1" alt="$2"/>','<a href="$1" target="_blank">$2</a>','<span style="color:$1">$2</span>','<iframe src="$1"></iframe>'];for(var i=0;i<format.length;i++){content=content.replace(format[i],formatReplace[i]);}
return content;}