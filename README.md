#Functionality
[![Build Status](https://travis-ci.org/gordonbanderson/weboftalent-gridrows.svg?branch=master)](https://travis-ci.org/gordonbanderson/weboftalent-gridrows)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/weboftalent-gridrows/build-status/master)
[![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-gridrows/coverage.svg?branch=master)](https://codecov.io/github/gordonbanderson/weboftalent-gridrows?branch=master)

[![Latest Stable Version](https://poser.pugx.org/weboftalent/gridrows/version)](https://packagist.org/packages/weboftalent/gridrows)
[![Latest Unstable Version](https://poser.pugx.org/weboftalent/gridrows/v/unstable)](//packagist.org/packages/weboftalent/gridrows)
[![Total Downloads](https://poser.pugx.org/weboftalent/gridrows/downloads)](https://packagist.org/packages/weboftalent/gridrows)
[![License](https://poser.pugx.org/weboftalent/gridrows/license)](https://packagist.org/packages/weboftalent/gridrows)
[![Monthly Downloads](https://poser.pugx.org/weboftalent/gridrows/d/monthly)](https://packagist.org/packages/weboftalent/gridrows)
[![Daily Downloads](https://poser.pugx.org/weboftalent/gridrows/d/daily)](https://packagist.org/packages/weboftalent/gridrows)

[![Dependency Status](https://www.versioneye.com/php/weboftalent:gridrows/badge.svg)](https://www.versioneye.com/php/weboftalent:gridrows)
[![Reference Status](https://www.versioneye.com/php/weboftalent:gridrows/reference_badge.svg?style=flat)](https://www.versioneye.com/php/weboftalent:gridrows/references)

![codecov.io](https://codecov.io/github/gordonbanderson/weboftalent-gridrows/branch.svg?branch=master)
* Adds a convenience method for templates that pre-splits a dataset into rows

# Installation
    git clone git://github.com/gordonbanderson/weboftalent-gridrows.git
    cd weboftalent-gridrows
    git checkout stable30

The name of the output directory does not matter

# Usage - Templates
An example template is shown below.
* The parameters for SplitSetIntoGridRows are the method name to return a list of DataObjects, and the number of DataObjects to show per row.
* Start your row in HTML, e.g. &lt;tr&gt; or &lt;div class="row"&gt;
* The DataObjects in each row are available from the call <% control Columns %>
* Render each DataObject as appropriate, in this case use Twitter bootstrap.

```
<h1>$Title</h1>
$Content
<% loop SplitSetIntoGridRows('AllChildren',3) %>
<div class="row">
<% loop Columns %>
<div class="span3"><h4><a href="$Link">$Title
<a href="$Link"><% control Screenshot.SetWidth(300) %><img src="$URL" alt="$Title"/><% end_control %></a>
</h4>
</div><!-- end of span 4 -->
<% end_loop %>
</div><!-- end of row -->
<% end_loop %>
```



## Silverstripe Version Compatibility
2.4 only (tested with 2.4.5+) - stable24 branch
