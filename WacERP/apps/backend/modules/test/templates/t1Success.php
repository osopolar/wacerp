<div id="mainContent">
<script type="text/javascript">
	$(function() {
		var buttons = $('#push button, #check').button();
		var buttonSets = $('#radio0, #radio1, #radio2, #ops1, #format, #ops2, #mode, #inputs, #anchors').buttonset();

		buttons.add(buttonSets).click(function(event) {
			var target = $(event.target);
			if (target.closest('.ui-button').length) {
				$("<div></div>")
					.text("Clicked " + (target.text() || target.val()))
					.appendTo("#log");
			}
		});

		$("#disable-widgets").toggle(function() {
			buttons.button("disable");
			buttonSets.buttonset("disable");
		}, function() {
			buttons.button("enable");
			buttonSets.buttonset("enable");
		});
		$("#toggle-widgets").toggle(function() {
			buttons.button();
			buttonSets.buttonset();
		}, function() {
			buttons.button("destroy");
			buttonSets.buttonset("destroy");
		}).click();
	});
	</script>
</head>
<body>

<div id="push">
	<div>

		No icon
		<button>Simple button, only text</button>
		<button class="ui-priority-secondary">Secondary priority button</button>
	</div>
	<br/>
	<div>
		With icon
		<button class="{button:{icons:{primary:'ui-icon-locked'},text:false}}">Button with icon only</button>

		<button class="{button:{icons:{primary:'ui-icon-locked'}}}">Button with icon on the left</button>
		<button class="{button:{icons:{primary:'ui-icon-gear',secondary:'ui-icon-triangle-1-s'}}}">Button with two icons</button>
		<button class="{button:{icons:{primary:'ui-icon-gear',secondary:'ui-icon-triangle-1-s'},text:false}}">Button with two icons</button>
	</div>
</div>

<div id="toggle" style="margin-top: 2em;">
	<input type="checkbox" id="check" /><label for="check">Toggle</label>

</div>

<div id="radio0" style="margin-top: 2em;">
	<input type="radio" id="radio01" name="radio" checked="checked" /><label for="radio01">Choice 1</label>
	<input type="radio" id="radio02" name="radio" /><label for="radio02">Choice 2</label>
	<input type="radio" id="radio03" name="radio" /><label for="radio03">Choice 3</label>
</div>
<form>
	<div id="radio1" style="margin-top: 2em;">
		<input type="radio" id="radio11" name="radio" /><label for="radio11">Choice 1</label>

		<input type="radio" id="radio12" name="radio" checked="checked" /><label for="radio12">Choice 2</label>
		<input type="radio" id="radio13" name="radio" /><label for="radio13">Choice 3</label>
	</div>
</form>
<form>
	<div id="radio2" style="margin-top: 2em;">
		<input type="radio" id="radio21" name="radio" /><label for="radio21">Choice 1</label>
		<input type="radio" id="radio22" name="radio" /><label for="radio22">Choice 2</label>

		<input type="radio" id="radio23" name="radio" checked="checked" /><label for="radio23">Choice 3</label>
	</div>
</form>

<div id="toolbar" class="ui-widget-header ui-corner-all ui-helper-clearfix">
	<span id="ops1">
		<button class="{button:{icons:{primary:'ui-icon-folder-open'},text:false}}">Open</button>
		<button class="{button:{icons:{primary:'ui-icon-disk'},text:false}}">Save</button>
		<button class="{button:{icons:{primary:'ui-icon-trash'},text:false}}">Delete</button>

	</span>
	<span id="format">
		<input type="checkbox" id="check1" /><label for="check1">B</label>
		<input type="checkbox" id="check2" /><label for="check2">I</label>
		<input type="checkbox" id="check3" /><label for="check3">U</label>
	</span>
	<span id="ops2">

		<button class="{button:{icons:{primary:'ui-icon-print'},text:false}}">Print...</button>
		<button class="{button:{icons:{primary:'ui-icon-mail-closed'},text:false}}">Mail to...</button>
	</span>
	<span id="mode">
		<input type="radio" id="mode1" name="radio2" checked="checked" /><label for="mode1">Edit</label>
		<input type="radio" id="mode2" name="radio2" /><label for="mode2">View</label>
	</span>

</div>

<div id="inputs" style="margin-top: 2em;">
	<input type="submit" value="Submit button" />
	<input type="reset" value="Reset button" class="{button:{label:'Custom reset'}}" />
</div>

<div id="anchors" style="margin-top: 2em;">
	<a href="#">Anchor 1</a>
	<a href="#" class="{button:{icons:{primary:'ui-icon-print'},text:false}}">Anchor 2</a>
	<a href="#" class="{button:{icons:{primary:'ui-icon-mail-closed'},text:false}}">Anchor 3</a>

	<a href="#">Anchor 4</a>
</div>

<div style="margin-top: 2em;">
	<button id="disable-widgets">Toggle disabled</button>
	<button id="toggle-widgets">Toggle widget</button>
</div>
<div id="log"></div>



</div>