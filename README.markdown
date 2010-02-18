# Tabi

Tabi is a jQuery plugin for tabbed interfaces. It focus on interfaces with many tabs. On the web the horizontal space is limited and, as
tabbed interfaces are horizontal, you can't have many tabs on your design.

With Tabi you can put this tabs on a row system, having as many rows of tabs as you wish. Let's see an example:

Imagine you have 10 tabs on your web. They don't fit on the space they are supose to stand (10 tabs needs much space!). Tabi lets you
arrange this tabs on different rows, so you can have, for example, one row with 2 tabs, another one with 5, and the last one with 3 tabs.

This is done with class names, so you don't have to write almost any Javascript (just the init call).

## Installation

Installing Tabi is pretty simple, but remember that you **need jQuery** to make it work (Tabi has been tested with jQuery 1.4.x and above, but it should work with 1.3.x too).

Download an unzip the <a href="http://github.com/juanghurtado/jquery.tabi/zipball/master">source code</a>, and put it on your page.

<pre><code>&lt;script type="text/javascript" src="js/jquery-1.4.min.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="js/jquery.tabi.js"&gt;&lt;script&gt;</code></pre>

## Example pages

Here you can see a few examples of Tabi:

- <a href="http://tabi.coloresefimeros.com/example-1.html">Default use</a>
- <a href="http://tabi.coloresefimeros.com/example-2.php">Setting default tab</a>

## Basic use

Ok, now let's use Tabi to arrange an interface full of tabs. A semantic tabbed interface is usually marked with an HTML unordered list, so in order to make you write semantic code you must use one of those list to use Tabi. Here's an example:

<pre><code>&lt;ul class="group"&gt;
	&lt;li class="tabi-0"&gt;&lt;a href="#row0-1"&gt;Row 0 - Element 1&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-0"&gt;&lt;a href="#row0-2"&gt;Row 0 - Element 2&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-0"&gt;&lt;a href="#row0-3"&gt;Row 0 - Element 3&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-1"&gt;&lt;a href="#row1-1"&gt;Row 1 - Element 1&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-1"&gt;&lt;a href="#row1-2"&gt;Row 1 - Element 2&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-1"&gt;&lt;a href="#row1-3"&gt;Row 1 - Element 3&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-1"&gt;&lt;a href="#row1-4"&gt;Row 1 - Element 4&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-2"&gt;&lt;a href="#row2-1"&gt;Row 2 - Element 1&lt;/a&gt;&lt;/li&gt;
	&lt;li class="tabi-2"&gt;&lt;a href="#row2-2"&gt;Row 2 - Element 2&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</code></pre>

Take a look at those <code>class</code> on the <code>LI</code> elements. They indicate the row grouping for the tabs, so elements with <code>"tabi-0"</code> will be on the first row, elements with <code>"tabi-1"</code> on the second one, and so on.

Once you have the HTML structure it's time to use Tabi to transform it. You just need to point the <code>UL</code> element of your tabbed structure with jQuery and then call the Tabi init method:

<pre><code>jQuery(function() {
	jQuery('ul.group').tabi();
});</code></pre>

## What does Tabi with links?

If you watch the previous example you'll see lots of anchors on the <code>href</code> attributes of the links. They are supposed to point to elements of the page with and <code>id</code> equals to the value of the anchor. For example, a link with <code>href="#row0-1"</code> targets to an element with <code>id="row0-1"</code>.

When the page loads, Tabi takes all those targets and hides them, leaving visible just the target of the first tab of the last row (you can customize this by adding <code>"current-tab"</code> to the <code>class</code> of the <code>LI</code> tab you want to be active).

Once you click on a tab, Tabi handles the behaviour hiding previous target and showing current one. But there's and exception: What happens when the tab is a non-anchor link? Well, Tabi is smart enough to let the link go to the pointed URL.

## Advanced use

With Tabi there's no such "advanced use" thing (by now…), but there are a few (actually just one) configuration things you must know:

### Tab change callback function

Tabi's init method can get some configuration params, one of them is <code>tabChangeCallback</code> wich receives a function to be executed after clicking a tab:

<pre><code>jQuery(function() {
	jQuery('.example ul').tabi({
		tabChangeCallback : function($this) {
			alert('The new tab is: '+ $this);
		}
	});
});</code></pre>

That function recieves a jQuery object with the link of the current tab so you can have a lot of information about many things:

<pre><code>var linkClicked = $this;					// Clicked link
var activeTab = $this.parent();			 // Active LI tab
var activeRow = $this.parents('ul');	 // Current UL row</code></pre>

## CSS Styling

In order to style your tabs the way you want, Tabi creates an HTML structure full of _hooks_ that you can use on your CSS:

<pre><code>&lt;div class=&quot;tabi-global&quot;&gt;
	&lt;ul class=&quot;tabi-row row-0 current-row&quot;&gt;
		&lt;li class=&quot;tabi-0 current-tab&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;/ul&gt;
	&lt;ul class=&quot;tabi-row row-1&quot;&gt;
		&lt;li class=&quot;tabi-1&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;/ul&gt;
	&lt;ul class=&quot;tabi-row row-2&quot;&gt;
		&lt;li class=&quot;tabi-2&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;/ul&gt;
&lt;/div&gt;</code></pre>

So you can use a CSS like this:

<pre><code>/* Global wrapper */
div.tabi-global {}
	
	/* Every Tabi row */
	div.tabi-global ul.tabi-row {}
	
	/* Current row (where current tab is) */
	div.tabi-global ul.current-row {}
	
	/* Consecutive rows (row-0, row-1, row-2 and so on) */
	div.tabi-global ul.row-N {}
		
		/* Tabs */
		div.tabi-global ul.tabi-row li {}
		
		/* Current tab */
		div.tabi-global ul.tabi-row li.current-tab {}</code></pre>
		
## Support

Tabi is still in development, so surely it's full of bugs and mistakes. If you find one <a href="http://github.com/juanghurtado/jquery.tabi/issues">please let me know</a> (this also refers to this text, because my english is not good enough yet).