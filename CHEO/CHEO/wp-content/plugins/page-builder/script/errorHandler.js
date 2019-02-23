jQuery(document).ready(function($) 
{
	window.onerror=function(errorMsg,url,lineNumber)
	{
		console.log('Your page contains JS error which doesn\'t allow to display content.');
	};
});