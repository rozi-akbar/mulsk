$(document).ready(function () {
	$('body').bind('cut copy paste', function (e) {
		e.preventDefault();
	})
	$("body").on("contextmenu", function (e) {
		document.onkeydown = function (e) {
			if (event.keyCode == 123) {
				return false;
			}
			if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
				return false;
			}
			if (e.keyCode == 'F12'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'F12'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey &&
				(e.keyCode === 67 ||
					e.keyCode === 86 ||
					e.keyCode === 85 ||
					e.keyCode === 117)) {

				return false;
			} else {
				return false;
			}
		}
		return false;
	});
	! function () {
		function detectDevTool(allow) {
			if (isNaN(+allow)) allow = 100;
			var start = +new Date();
			debugger;
			var end = +new Date();
			if (isNaN(start) || isNaN(end) || end - start > allow) {
				console.log('DEVTOOLS detected ' + allow);
			}
		}
		if (window.attachEvent) {
			if (document.readyState === "complete" || document.readyState === "interactive") {
				detectDevTool();
				window.attachEvent('onresize', detectDevTool);
				window.attachEvent('onmousemove', detectDevTool);
				window.attachEvent('onfocus', detectDevTool);
				window.attachEvent('onblur', detectDevTool);
			} else {
				setTimeout(argument.callee, 0);
			}
		} else {
			window.addEventListener('load', detectDevTool);
			window.addEventListener('resize', detectDevTool);
			window.addEventListener('mousemove', detectDevTool);
			window.addEventListener('focus', detectDevTool);
			window.addEventListener('blur', detectDevTool);
		}
	}();
})
