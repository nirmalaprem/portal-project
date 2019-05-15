<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');
?>
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2 ><a href="#" class="home">Dashboard</a></h2>
              <h2 ><a href="creditscores_dashboard.php" class="home">CREDITSCORES - Dashboard</a></h2>
            <ul class="actions">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-trending-up"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-check-all"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class="refresh" href="#">Refresh</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <div id="dash_view" class="mini-charts">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <a class="filter" id="filter_all" href="#"><div class="mini-charts-item bgm-orange">
                            <div class="clearfix">
                                <div class="col-sm-12 col-md-6 chart stats-line"></div>
                                <div class="count">
                                    <small>All Apps</small>
                                    <h2 id="allapps">#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_today" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Today</small>
                                    <h2 id="todayapps">#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_yesterday" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Yesterday</small>
                                    <h2 id="yesterdayapps" >#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_thisweek" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>This Week</small>
                                    <h2 id="thisweekapps">#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_lastweek" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Last Week</small>
                                    <h2 id="Lastweekapps">#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_thismonth" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>This Month</small>
                                    <h2 id="thismonthapps">#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a class="filter" id="filter_lastmonth" href="#"><div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Last Month</small>
                                    <h2 id="lastmonthapps" >#</h2>
                                </div>
                            </div>
                        </div></a>
                </div>
            </div>
        </div>


        <div id="filter_view" style="display:none;" class="card">


            <div class="table-responsive">
                <table id="data-table-basic" class="table table-striped">

                    <thead>
                        <tr>
                            <th>More Info</th>
                            <th>Created Date</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Agent</th>
                            <th>CAT Card</th>

                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>


            </div>

        </div>
        <div class="create_main_btn"><a href="#" style="color:#FFF; text-align: center; width: 100%; margin-top: 12px;" class="zmdi zmdi-edit"></a></div>
        <input type="hidden" name="loginteamid" id="loginteamid" value="<?php echo $logteamid; ?>"  />
        <input type="hidden" name="loginroleid" id="loginroleid" value="<?php echo $logroleid; ?>"  />
    </div>
</section>
<!-- /#wrapper -->
</body>
<?php include('includes/footer.php'); ?>

<script>
    var new_app_count;
    var notification_counter = 0;
//Run the Ajax Code
    function do_ajax(action, request, init_count) {
        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action,
            success: function (result) {

                //console.log('checked for new data..');
                obj1 = $.parseJSON(result);
                var total_newdeals = (obj1.TD - init_count);
                notification_counter += total_newdeals;
                //console.log(total_newdeals);
                //console.log(init_count);
                $("#allapps").html('#' + obj1.TOTALDEAL);
                $("#todayapps").html('#' + obj1.TD);
                new_app_count = obj1.TD;
                $("#yesterdayapps").html('#' + obj1.YD);
                $("#thisweekapps").html('#' + obj1.TWD);
                $("#Lastweekapps").html('#' + obj1.LWD);
                $("#thismonthapps").html('#' + obj1.TMD);
                $("#lastmonthapps").html('#' + obj1.LMD);
                if (total_newdeals >= 1) {
                    $(".tmn-counts").html(notification_counter);
                }
            },
            complete: function (result) {
                //run the poll that runs the ajax call
                poll_deals();
            }

        });
    }

    //the actual poll runs seperate to assure no polls within polls
    function poll_deals() {
        window.setTimeout(function () {
            //console.log('We Be Polling Like a BAWSE');
            do_ajax(0, 'get_count_all', new_app_count);
        }, 60000);
    }


    function load_counterdiv(action, request) {

        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action,
            success: function (result) {

                var obj1 = $.parseJSON(result);
                $("#allapps").html('#' + obj1.TOTALDEAL);
                $("#todayapps").html('#' + obj1.TD);
                $("#yesterdayapps").html('#' + obj1.YD);
                $("#thisweekapps").html('#' + obj1.TWD);
                $("#Lastweekapps").html('#' + obj1.LWD);
                $("#thismonthapps").html('#' + obj1.TMD);
                $("#lastmonthapps").html('#' + obj1.LMD);
                //poll_deals(0,'get_count_all',obj1.TD);
                //changed to reflect the new code above
                do_ajax(0, 'get_count_all', obj1.TD);
            }
        });
    }
    $(document).ready(function () {
        //GLOBAL
        var result;
        var table;
        var locked = 0;
        // ******* Function Call : Get All Filter Data count ******
        load_counterdiv(0, "get_count_all");

    });

    table = $('#data-table-basic').DataTable({

        "processing": true,
        "order": [[1, 'dsc']],
        columns: [
            {
                "data": null,
                "className": 'details-control',
                "defaultContent": '',
                "bSortable": false,
                "mRender": function (o) {
                    return '<a class="details-control btn btn-info btn-xs glyphicon glyphicon-plus" href="javascript:void(0);">' + '' + '</a>';
                }
            },
            {data: 'createddate'},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'dob'},
            {data: 'agent'},
            {data: 'CAT_include'}
        ]

    });
    $(".refresh").on('click', function (event) {

        try {
            table.ajax.reload();
        } catch (e) {
            //console.log("Table is blank!");
        }
    });
    $(".home").on('click', function (event) {
        try {

            table.ajax.reload();
        } catch (e) {
            //console.log("Table is blank!");
        }

        $('#dash_view').show();
        $('#filter_view').hide();
    });

    $(".filter").on('click', function (event) {

        //get the ID
        filter_id = $(this).attr('id');
        //make sure no white space is before or after id value
        $.trim(filter_id);
        /***
         Returns static vars to only be used in table
         list ajax call
         !!!change var action according to page
         ***/
        function tablerequest(filter_id) {
            this.request = "filters";
            this.action = 0;
            this.filterid = filter_id;
        }
        //console.log(filter_id);
        //table request object
        var param = new tablerequest(filter_id);

        table.ajax.url('../controller/page_request.php?request=' + param.request + '&action=' + param.action + '&filterID=' + param.filterid).load();

        $('#dash_view').hide();
        $('#filter_view').show();

    });

    /* Formatting function for row details - modify as you need */
    function format(d) {

        var loginteam = $("#loginteamid").val();
        var loginrole = $("#loginroleid").val();
        var link1 = "";
        var link2 = "";
        var MattressLink = "";
        var link3 = '<div id="agreedisp' + d.clientid + '"><button class="redoagreement btn btn-warning btn-sm" id="' + d.clientid + '" >Redo Agreement</button></div>';
        var occupationname = "";
        var button1 = '<button class="allinfodownload btn btn-info btn-sm" id="' + d.clientid + '" >All Info Download</button>';
        var button2 = '<div id="crmdisp' + d.clientid + '"><button class="crmcontactentry btn btn-danger btn-sm" id="' + d.clientid + '" >Add Contact In CRM</button></div>';
        var button3 = '<div id="crmdisp' + d.clientid + '"><button class="sendAppemail btn btn-warning btn-sm" id="' + d.clientid + '" >Send Application Email</button></div>';



        if (d.contract_folderpath != null) {
            var agreementpath = d.contract_folderpath.replace("/var/www/html", "http://184.68.121.126");
            var filename1 = d.last_name + "_" + d.first_name + "_cc.pdf";
            var filename2 = d.last_name + "_" + d.first_name + "_finance.pdf";

            var agreementfilepath1 = agreementpath + '/' + filename1;
            var agreementfilepath2 = agreementpath + '/' + filename2;

            var agreementpathresult1 = doesFileExist(agreementfilepath1);
            if (agreementpathresult1 == "no") {
                link1 = "";
                link2 = "";
                MattressLink = "";

            } else {
                link1 = '<a target="_blank" href="' + agreementpath + '/' + filename1 + '" class="btn btn-success btn-sm" >Agreement 1</a>';
                link2 = '<a target="_blank" href="' + agreementpath + '/' + filename2 + '" class="btn btn-success btn-sm" >Agreement 2</a>';
                if (d.mattress_size != '')
                {
                    var filename3 = d.last_name + "_" + d.first_name + "_mattress_finance.pdf";
                    var agreementfilepath3 = agreementpath + '/' + filename3;
                    MattressLink = '<a target="_blank" href="' + agreementpath + '/' + filename3 + '" class="btn btn-success btn-sm" >Agreement 3</a>';
                }
            }
        }

        // Access Previllage
        if (loginrole != 1 && loginrole != 2) { ///Role Admin , manager
            link3 = "";

            button1 = "";
            button2 = "";
            button3 = "";
        }


        if (d.occupation_name) {
            occupationname = d.occupation_name;
        }

        return '<div style="padding:10px;width:95%;background-color:#ffffff">' +
                '<table cellpadding="0" cellspacing="0" border="0" style="width:96%">' +
                '<tr><th style="width:20%" >Addres Information</th><th style="width:40%"  >Employee Information</th><th style="width:20%" >Agreement Information</th><th style="width:15%" >Actions</th></tr>' +
                '<tr><td>' + d.street_address + '</td><td> Income:' + d.income + '&nbsp;&nbsp;&nbsp;&nbsp;' + 'Setup Fee: ' + d.setup_fee + '</td><td rowspan=3>' + link1 + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + link2 + ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' + MattressLink + '<br /><br />' + link3 +
                '</td><td>' + button1 + '</td></tr>' +
                '<tr><td>' + d.city + ', ' + d.province + '</td><td> Occupation:' + occupationname + '</td><td>' + button2 + '</td></tr>' +
                '<tr><td>' + d.postal_code + '</td><td>productName:' + d.product_name + '</td><td>' + button3 + '</td></tr>' +
                '<tr>' +
                '</tr>' +
                '<tr>' +
                '</tr>' +
                '</table></div>';
    }
    //Click event for redo Button
    $(document).on('click', '.redoagreement', function () {
        //get the ID
        client_id = $(this).attr('id');
        var request = "redo_agreement";
        var action = 0;
        var divname = "agreedisp" + client_id;
        $("#" + divname).html("<img src='assets/images/loading.gif' width='25' height='25' />");
        //console.log(client_id);
        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action + "&clientID=" + client_id,
            success: function (result) {
                //console.log(result);
                var file = result.split("|");
                var filepath = file[0].replace("/var/www/html", "http://184.68.121.126");
                var MattressLink = '';
                if (file[3] != '')
                {
                    MattressLink = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="' + filepath + file[3] + '" class="btn btn-warning btn-sm" >Agreement 3</a>';
                }


                var content = '<font style="color:red">Redo Agreement has been successful!! </font><br /><br /><a target="_blank" href="' + filepath + file[1] + '" class="btn btn-warning btn-sm" >Agreement 1</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="' + filepath + file[2] + '" class="btn btn-warning btn-sm" >Agreement 2</a>' + MattressLink;
                content += '<br /><br /><div id="saveagree' + client_id + '"><font style="color:red">Please Save the agreement File after your verification, Click the below button to save ! </font><br /><button class="saveredoagreement btn btn-success btn-sm" id="' + client_id + '" >Save Agreement File</button><input type="hidden" name="redoagreepath' + client_id + '" id="redoagreepath' + client_id + '" value="' + file + '"/></div>';

                $("#" + divname).html(content);
            }
        });


    });
    $(document).on('click', '.saveredoagreement', function () {

        var client_id = $(this).attr('id');
        var request = "redo_agreement_save";
        var action = 0;
        var divname = "saveagree" + client_id;
        var btnname = "redoagreepath" + client_id;
        var filepath = $("#" + btnname).val();

        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action + "&clientID=" + client_id + "&redoFilePath=" + filepath,
            success: function (result) {

                //console.log(result);
                $("#" + divname).html(result);

            }
        });

    });
    $(document).on('click', '.sendAppemail', function () {
        var client_id = $(this).attr('id');
        window.location.href = "send_email.php?ClinetID=" + client_id;
    });
    //Click event for redo Button
    $(document).on('click', '.allinfodownload', function () {
        //get the ID
        //console.log("test download");
        client_id = $(this).attr('id');
        var request = "download_allinfo";
        var action = 0;
        //console.log(client_id);
        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action + "&clientID=" + client_id,
            success: function (result) {

                var filename = result.split("downloadfile/");
                // create a link for our script to 'click'
                var downloadLink = document.createElement("a");
                //  supply the name of the file (from the var above).
                // you could create the name here but using a var
                // allows more flexability later.
                downloadLink.download = filename[1];
                // provide text for the link. This will be hidden so you
                // can actually use anything you want.
                //downloadLink.innerHTML = "My Hidden Link";
                // allow our code to work in webkit & Gecko based browsers
                // without the need for a if / else block.
                window.URL = window.URL || window.webkitURL;
                // Create the link Object.
                //downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
                downloadLink.href = result;
                // when link is clicked call a function to remove it from
                // the DOM in case user wants to save a second file.
                downloadLink.onclick = destroyClickedElement;
                // make sure the link is hidden.
                downloadLink.style.display = "none";
                // add the link to the DOM
                document.body.appendChild(downloadLink);
                // click the new link
                downloadLink.click();


            }
        });


    });


    function destroyClickedElement(event) {
        // remove the link from the DOM
        document.body.removeChild(event.target);
    }


    $(document).on('click', '.crmcontactentry', function () {
        //get the ID
        //console.log("test download");
        client_id = $(this).attr('id');

        var request = "crm_addcontact";
        var action = 0;
        var divname = "crmdisp" + client_id;
        $("#" + divname).html("<img src='assets/images/loading.gif' width='30' height='30' />");
        $.ajax({
            url: '../controller/page_request.php?request=' + request + '&action=' + action + "&clientID=" + client_id,
            success: function (result) {
                //console.log(result);
                $("#" + divname).html('<font style="color:red">' + result + '</font>');
            }
        });

    });


    // Add event listener for opening and closing details
    $('#data-table-basic tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });


    function doesFileExist(urlToFile)
    {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();
        if (xhr.status == "404") {
            //console.log("File doesn't exist");
            return "no";
        } else {
            //console.log("File exists");
            return "yes";
        }
    }




</script>
</html>
