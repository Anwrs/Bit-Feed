<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <style>
        #sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 60%;
        }

            #sortable li {
                margin: 0 3px 3px 3px;
                padding: 0.4em;
                padding-left: 1.5em;
                font-size: 1.4em;
                height: 18px;
            }

                #sortable li span {
                    position: absolute;
                    margin-left: -1.3em;
                }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
        <ul id="sortable">
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
        </ul>
        <br />
        <input id="btnadd" type="button" value="AddNewItem" />
    </div>
    </form>
</body>
</html>

<script>
    $(function () {
        $("#sortable").sortable({
            update: function (event, ui) {
                var neworder = [];
                $("#sortable").find(".ui-state-default").each(function () {
                    var item = $(this).text();
                    //alert(item);
                    neworder.push(item)
                });
                alert(JSON.stringify(neworder));

                //here, you could pass this re-ordered items to a webmethod and save to the database using AJAX.
            }
        });
        $("#sortable").disableSelection();

        //add new items
        $("#btnadd").click(function () {
            var n = $("#sortable").find("li").length;
            //alert(parseInt(n) + 1);
            var index = parseInt(n) + 1;
            var newitem = '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item ' + index + '</li>';
            $("#sortable").append(newitem);
        })

    });
</script>
