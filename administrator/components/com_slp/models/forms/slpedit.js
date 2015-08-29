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
window.addEvent('domready', function() {
	document.formvalidator.setHandler('wort',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('ersatz',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('schlagwort',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('fenster',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('publ',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('begpub',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('endpub',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('anzahl',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('suchm',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('nofollow',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
});