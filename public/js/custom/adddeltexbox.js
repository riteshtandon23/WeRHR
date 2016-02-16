
$(document).ready(function() {
    // The maximum number of options
    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.wrapper'); //Input field wrapper
    var x = 2;
    
    $('#surveyForm')
        .on('click','#submit',function(e){
            var isValid=true;
            $('#option1,#option2,#option3,#option4,#option5').each(function(){
                if($.trim($(this).val())==''){
                    isValid=false;
                    $(this).css({
                        "border":"1px solid red",
                        "background":"#FFCECE"
                    });
                }else
                {
                   $(this).css({
                        "border":"",
                        "background":""
                    }); 
                }
            });
            if($('.checkbo:checkbox:checked').length==0)
            {
                isValid=false;
                $('.checkbo').css('outline-color','red');
                $('.checkbo').css('outline-style','solid');
                $('.checkbo').css('outline-width','thin');
            }
            if(isValid==false)
            {
                e.preventDefault();
            }

        })
        // Add button click handler
        .on('click', '.addButton', function() {
            if(x < maxField){ //Check maximum number of input fields
            $(wrapper).append('<div class="item form-group"><div class="col-xs-offset-3 col-xs-5"><input class="form-control" type="text" id="option'+x+'" name="option[]" placeholder="Option '+x+'"/></div><button type="button" class="btn btn-primary removeButton"><i class="fa fa-minus"></i></button><label><input type="checkbox" id="ans'+x+'" class="checkbo"/></label></div>'); // Add field html
            x++; //Increment field counter
        } 

            // Add new field
           
        })

        // Remove button click handler
        .on('click', '.removeButton', function(e) {
            e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--;
            
        })

        .on('change','#ans',function(){
           var anss = $('#questionAns').val();
           var bla = $('#option1').val();
           if(bla!="")
           {
            if(this.checked)
           {
                anss =anss+","+bla;
           }else
           {
                bla=","+bla;
                anss=anss.replace(bla,'');
                //alert("hh");
           }
            $('#questionAns').val(anss);
        }

        })
        .on('change','#ans2',function(){
           var anss = $('#questionAns').val();
           var bla = $('#option2').val();
           if(bla!="")
           {
            if(this.checked)
           {
                anss =anss+","+bla;
           }else
           {
                bla=","+bla;
                anss=anss.replace(bla,'');
                //alert("hh");
           }
            $('#questionAns').val(anss);
        }
        })
        .on('change','#ans3',function(){
           var anss = $('#questionAns').val();
           var bla = $('#option3').val();
           if(bla!="")
           {
            if(this.checked)
           {
                anss =anss+","+bla;
           }else
           {
                bla=","+bla;
                anss=anss.replace(bla,'');
                //alert("hh");
           }
            $('#questionAns').val(anss);
        }
        })
        .on('change','#ans4',function(){
           var anss = $('#questionAns').val();
           var bla = $('#option4').val();
           if(bla!="")
           {
            if(this.checked)
           {
                anss =anss+","+bla;
           }else
           {
                bla=","+bla;
                anss=anss.replace(bla,'');
                //alert("hh");
           }
            $('#questionAns').val(anss);
        }
        })
        .on('change','#ans5',function(){
           var anss = $('#questionAns').val();
           var bla = $('#option5').val();
           if(bla!="")
           {
            if(this.checked)
           {
                anss =anss+","+bla;
           }else
           {
                bla=","+bla;
                anss=anss.replace(bla,'');
                //alert("hh");
           }
            $('#questionAns').val(anss);
        }
        });

        
});

