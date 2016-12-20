function wrapText(elementID, openTag, closeTag) {
    var textArea = $('#' + elementID);
    var len = textArea.val().length;
    var start = textArea[0].selectionStart;
    var end = textArea[0].selectionEnd;
    var selectedText = textArea.val().substring(start, end);
    var replacement = openTag + selectedText + closeTag;
    textArea.val(textArea.val().substring(0, start) + replacement + textArea.val().substring(end, len));
}

function addText(elementID, newText) {
	var textArea = $('#' + elementID);
	var start = textArea[0].selectionStart;
	var end = textArea[0].selectionEnd;
	var text = textArea.val();
	var before = text.substring(0, start);
	var after  = text.substring(end, text.length);
	textArea.val(before + newText + after)
	textArea[0].selectionStart = textArea[0].selectionEnd = start + newText.length;
	textArea.focus();
}