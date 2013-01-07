window.addEvent(
    'domready',
    function()
    {
        $$('.orderlink').addEvent(
            'click',
            function()
            {
            	var form 	= this.get('rel');
            	var options	= this.get('title').split(":");
            	
            	$(form).getElement('input[name=filter_order]').set('value',options[0]);
            	$(form).getElement('input[name=filter_order_Dir]').set('value',options[1]);
            	
            	$(form).submit();
            	
            	return false;
            }
        );
    }
);