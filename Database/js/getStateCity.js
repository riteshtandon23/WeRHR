function getstates()
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
					var country=form['country'].value;
					var form=document['form2'];
					var country=form['country'].value;

					

					xmlhttp.open("GET", "http://localhost/CountryStateCity/getState.php?country="+country,true);
					xmlhttp.onreadystatechange = function()
					{

						if(this.readyState == 4)
						{
							  
							//alert(this.responseText);
							
							var myObject = JSON.parse(this.responseText);

							for(j=document.form1.state.options.length-1;j>=0;j--)
							{
								document.form1.state.remove(j);
							}
							//var state1=myObject.value.state1;
							var optn = document.createElement("OPTION");
							optn.text = 'Select State';
							optn.value = '';
							document.form1.state.options.add(optn);

							for (i=0;i<myObject.state.length;i++)
							{
								var optn = document.createElement("OPTION");
								optn.text = myObject.state[i];
								optn.value = myObject.state[i];
								document.form1.state.options.add(optn);	
							} 
						}
					}
					xmlhttp.send(null);
			}
		}