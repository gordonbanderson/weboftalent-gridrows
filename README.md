#Functionality
* Adds a convenience method for templates that pre-splits a dataset into rows

# Installation
    git clone git://github.com/gordonbanderson/weboftalent-gridrows.git
    cd weboftalent-gridrows
    git checkout stable24

The name of the output directory does not matter

# Usage - Templates
An example template is shown below.
* The parameters for SplitSetIntoGridRows are the method name to return a list of DataObjects, and the number of DataObjects to show per row.
* Start your row in HTML, e.g. <tr> or <div class="row">
* The DataObjects in each row are available from the call <% control Columns %>
* Render each DataObject as appropriate, in this case use Twitter bootstrap.

	<h1>$Title</h1>
	$Content
	<% control SplitSetIntoGridRows(AllChildren|3) %>
	<div class="row">
	<% control Columns %>
	<div class="span3"><h4><a href="$Link">$Title
	<a href="$Link"><% control Screenshot.SetWidth(300) %><img src="$URL" alt="$Title"/><% end_control %></a>
	</h4>
	</div><!-- end of span 4 -->
	<% end_control %>
	</div><!-- end of row -->
	<% end_control %>



## Silverstripe Version Compatibility
2.4 only (tested with 2.4.5+) - stable24 branch