/*! Juan G. Hurtado (juan.g.hurtado@gmail.com)
* Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
* and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*
* Version: 0.0.1
* Requires jQuery 1.3+
* --------------------------------------------------------------------------*/
(function($) {
	$.fn.tabi = function (options) {
		// =================================================================
		// Global vars
		// =================================================================
		var $originalUL,
			$context;
		
		// =================================================================
		// Options management
		// =================================================================
		var defaults = {
			tabChangeCallback: function($this) {}
	    },
		options = jQuery.extend(defaults, options || {});
		
		// =================================================================
		// Helper functions
		// =================================================================
		var bindClick = function() {
			$context.find('a').bind('click', function(event) {
				var $element = $(this);
				
				// Check if clicked element is an anchor
				if ($(this).attr('href').substr(0,1) == '#') {
					// Handle "current" class
					$context.find('li.current-tab').removeClass('current-tab')
						.end().find('ul.current-row').removeClass('current-row');
					$(this).parent().addClass('current-tab');

					// Add all tabs except current one (unbinding click event from every link)
					var rows = new Array();
					$context.find('ul.tabi-row').each(function(index) {
						$(this).find('li a').unbind('click');
						
						if (!$(this).has($element.parent()).length) {
							rows[rows.length] = $(this).find('li');
						}
					});
					
					// Add current group at the end
					rows[rows.length] = $(this).parent().siblings().andSelf();
					
					// Remove old ULs
					$context.find('ul.tabi-row').remove();

					// Create new ULs
					createULs(rows, $context);

					// Bind click event again
					bindClick();
					
					// Show only the target element of the clicked link and hide the rest
					handleTargetVisibility(rows, $element.attr('href'));

					// Prevent href linking
					event.preventDefault();
					
					// Execute callback
					options.tabChangeCallback($(this));
				}
			});
		};
		
		var handleTargetVisibility = function(rows, currentHref) {
			$.each(rows, function(index, val) {
				$(this).find('a').each(function(index) {
					$('#'+ $(this).attr('href').split('#')[1]).hide().filter('#'+ currentHref.split('#')[1]).show();
				});
			});
		};
		
		var createULs = function(rows, $where) {
			$.each(rows, function(index, val) {
				if (val != undefined) {
					var $ul = $('<ul class="'+ $originalUL.attr('class') +' tabi-row row-'+ index +'"></ul>');
					$(val).each(function(index) {
						$ul.append($(this));

						if ($(this).hasClass('current-tab')) {
							$(this).parent().addClass('current-row');
						}
					});

					$where.append($ul);
				}
			});
		};
		
		// =================================================================
		// Plugin loop
		// =================================================================
	    return this.each(function () {
			$originalUL = $(this);
			$context = $(this).wrap('<div class="tabi-global"></div>').parent();
			var href = "";
			
			// 1.- Create array for ordering rows
			var i = 0,
				rows = new Array(),
				currentRow;
			
			while(elements = $(this).find('li.tabi-'+ i)) {
				if (elements.length <= 0) {
					break;
				}
				
				// Check if this is the current row
				if (elements.hasClass('current-tab')) {
					// If so, store it
					currentRow = elements;
					
					// Save current link's target
					href = elements.filter('.current-tab').find('a').attr('href');
				} else {
					rows[rows.length] = elements;
				}
				
				i++;
			};
			
			// Put current row on last place of the array
			if (currentRow) {
				rows[rows.length] = currentRow;
				currentRow.parent().addClass('current-row');
			}
			
			// 2.- Check if there are rows
			if (rows.length <= 0) {
				return false;
			}
			
			// 3.- Hide all target elements except active one
			if (href == "") {
				href = $(rows[rows.length - 1][0]).addClass('current-tab').find('a').attr('href');
			}
			
			handleTargetVisibility(rows, href);
			
			// 4.- Insert one UL per row after the original one
			createULs(rows, $context);
			
			// 5.- Bind click event
			bindClick();
			
			// 6.- Remove original UL
			$originalUL.remove();
		});
	};
})(jQuery);