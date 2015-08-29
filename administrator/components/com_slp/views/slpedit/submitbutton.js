/*
------------------------------------------------------------------------------
# Sitelinkx Component
# ----------------------------------------------------------------------------
# author    eXtro-media.de
# copyright Copyright (C) 2010-2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl.html
# website   www.eXtro-media.de
# forum     http://www.eXtro-media.de/en/extro-forum.html
# contact   sitelinkx@eXtro-media.de
# The lights are up now let the play begin
-------------------------------------------------------------------------------
*/
Joomla.submitbutton = function(task)
{
	if (task == '')
	{
		return false;
	}
	else
	{
		var isValid=true;
		var action = task.split('.');
		if (action[1] != 'cancel' && action[1] != 'close')
		{
			var forms = $$('form.form-validate');
			for (var i=0;i<forms.length;i++)
			{
				if (!document.formvalidator.isValid(forms[i]))
				{
					isValid = false;
					break;
				}
			}
		}
		if (isValid)
		{
			Joomla.submitform(task);
			return true;
		}
		else
		{
			alert(Joomla.JText._('slpedit, some values are not acceptable.','Some values are unacceptable'));
			return false;
		}
	}
}