function getCities()
		{
			
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
					var state=form['state'].value;

					xmlhttp.open("GET", "http://localhost/CountryStateCity/getCity.php?state="+state,true);
					xmlhttp.onreadystatechange = function()
					{

						if(this.readyState == 4)
						{
							  
							//alert(this.responseText);
							
							var myObject = JSON.parse(this.responseText);
								//alert(this.responseText);
							for(j=document.form1.City.options.length-1;j>=0;j--)
							{
								document.form1.City.remove(j);
							}
							//var state1=myObject.value.state1;
							var optn = document.createElement("OPTION");
							optn.text = 'Select City';
							optn.value = '';
							document.form1.City.options.add(optn);

							for (i=0;i<myObject.City.length;i++)
							{
								var optn = document.createElement("OPTION");
								optn.text = myObject.City[i];
								optn.value = myObject.City[i];
								document.form1.City.options.add(optn);	
							} 
						}
					}
					xmlhttp.send(null);
			}
		}