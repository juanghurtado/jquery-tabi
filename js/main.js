/* ----------------------------------------------------------------------------
	Main JS file
	Author: Juan G. Hurtado
	e-Mail: juan.g.hurtado@gmail.com
   ---------------------------------------------------------------------------- */

jQuery(function() {
	jQuery('.example ul').tabi({
		tabChangeCallback : function($this) {
			var linkClicked = $this;
			var activeTab = $this.parent();
			var activeRow = $this.parents('ul');
			
			if (console != undefined) {
				console.group('Tab clicked!');
				console.log(linkClicked);
				console.log(activeTab);
				console.log(activeRow);
				console.groupEnd();
			}
		}
	});
});