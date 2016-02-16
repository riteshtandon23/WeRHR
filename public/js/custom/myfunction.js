function getQuestionID()
{
	//var id=document.getElementById("Id");
	var xmlhttp;
	try
	{
		xmlhttp=new XMLHttpRequest;			
	}catch(e)
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xmlhttp)
	{
		var form=document['form1'];
		var id=form['topicId'].value;

		xmlhttp.open("GET", "http://localhost/WeAreHR/public/selectQuestionId.php?id="+id,true);
		xmlhttp.onreadystatechange = function()
		{
			if(this.readyState == 4)
			{
				alert(this.responseText);
				var myObject = JSON.parse(this.responseText);
				//alert(myObject.details.length);
				for(var i=0;i<myObject.details.length;i++)
				{
					var tbody="<tbody>";
					var tr="<tr>";
					var td="<td class=\"a-center\"><input type=\"checkbox\" class=\"tableflat\"></td>";
					var td1="<td>"+myObject.details[i]+"</td>";
					var td2="<td></td>";
					var td3="<td></td>";
					var td4="<td></td>";
					var td5='<td class="last"><a href="#">View</a></td>';
					var tbre="</tr></tbody>";
					$('#example').append(tbody+tr+td+td1+td2+td3+td4+td5+tbre);
				}
				
			}
		}
		xmlhttp.send(null);
	}
}