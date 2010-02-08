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
			setvalue: true
	    },
		options = jQuery.extend(defaults, options || {});
		
		// =================================================================
		// Helper functions
		// =================================================================
		var bindClick = function() {
			$context.find('a').bind('click', function(event) {
				// Check if clicked element is an anchor
				if ($(this).attr('href').substr(0,1) == '#') {
					// Handle "current" class
					$context.find('li').removeClass('current');
					$(this).parent().addClass('current');

					// Add all groups except current one (unbinding click event from every link)
					var rows = new Array();
					$context.find('ul.tabi').each(function(index) {
						$(this).find('li').find('a').unbind('click');

						if (!$(this).has($(this).parent()).length) {
							rows[index] = $(this).find('li');
						}
					});

					// Add current group at the end
					rows[rows.length] = $(this).parent().siblings().andSelf();

					// Remove old UL
					$context.find('ul.tabi').remove();

					// Create new UL
					createULs(rows, $context);

					// Bind click event again
					bindClick();
					
					// Show only the target element of the clicked link
					$('.content').hide().filter($(this).attr('href')).show();

					// Prevent href linking
					event.preventDefault();
				}
			});
		};
		
		var createULs = function(rows, $where) {
			$.each(rows, function(index, val) {
				var $ul = $('<ul class="tabi group"></ul>');
				$(val).each(function(index) {
					$ul.append($(this));
				});
				
				$where.append($ul);
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
				if (elements.hasClass('current')) {
					// If so, store it
					currentRow = elements;
					
					// Save current link's target
					href = elements.filter('.current').find('a').attr('href');
				} else {
					rows[rows.length] = elements;
				}
				
				i++;
			};
			
			// Put current row on last place of the array
			if (currentRow) {
				rows[rows.length] = currentRow;
			}
			
			// 2.- Check if there are rows
			if (rows.length <= 0) {
				return false;
			}
			
			// 3.- Show default element (first one of the last row) if it's not defined
			if (href == "") {
				href = $(rows[rows.length - 1][0]).addClass('current').find('a').attr('href');
			}
			$('.content').hide().filter(href).show();
			
			// 4.- Insert one UL per row after the original one
			createULs(rows, $context);
			
			// 5.- Bind click event
			bindClick();
			
			// 6.- Remove original UL
			$originalUL.remove();
		});
	};
})(jQuery);