# Usage - Templates
##Use a Method to get a DataList
* The parameters for SplitSetIntoGridRows are the method name to return a list
of DataObjects, and the number of DataObjects to show per row.
* Start your row in HTML, e.g. &lt;tr&gt; or &lt;div class="row"&gt;
* The DataObjects in each row are available from the call <% control Columns %>
* Render each DataObject as appropriate, in this case using Twitter bootstrap.

```
<h1>$Title</h1>
$Content
<% loop SplitDataListIntoGridRows('AllChildren',3) %>
<div class="row">
<% loop Columns %>
<div class="span3"><h4><a href="$Link">$Title</a>
<a href="$Link"><% control Screenshot.SetWidth(300) %><img src="$URL" alt="$Title"/><% end_control %></a>
</h4>
</div><!-- end of span 4 -->
<% end_loop %>
</div><!-- end of row -->
<% end_loop %>
```

##Get N Items of a Given Class as the DataList
The method `SplitClassNameDataListIntoGridRows` gets the latest `$limit`
DataObjects of class `$classname`, by default sorted by `LastEdited DESC`, i.e.
newest first.  This is useful for showing likes of say 'newest articles' on your
home page.

The parameters are as follows:
* $className - ClassName of DataObject to retrieve, e.g. 'Page'
* $numberOfCols - the number of columns
* $limit - the number of items to return
* $sort - the order in which to return them


```php
    <% loop $SplitClassNameDataListIntoGridRows('Page',3, 12) %>
        <div class="row">
            <% loop $Columns %>
                <div class="span3"><h4><a href="$Link">$Title</a>
                    <a href="$Link"><% loop $Screenshot.SetWidth(300) %><img src="$URL" alt="$Title"/><% end_loop %></a>
                </h4>
                </div><!-- end of span 4 -->
            <% end_loop %>
        </div><!-- end of row -->
    <% end_loop %>

```
