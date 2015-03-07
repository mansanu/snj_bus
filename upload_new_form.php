    <script type="text/javascript" src="<?php echo $_PHPLIB['js']?>jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo $_PHPLIB['js']?>jquery-ui-1.7.2.custom.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="<?php echo $_PHPLIB['css']?>jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />

    <script type="text/javascript" src="<?php echo $_PHPLIB['js']?>jHtmlArea-0.7.0.js"></script>
    <link rel="Stylesheet" type="text/css" href="<?php echo $_PHPLIB['css']?>jHtmlArea.css" />

 <script type="text/javascript">    
        // You can do this to perform a global override of any of the "default" options
        // jHtmlArea.fn.defaultOptions.css = "jHtmlArea.Editor.css";

        $(function() {
   

            $("#txtCustomHtmlArea").htmlarea({
                // Override/Specify the Toolbar buttons to show
                toolbar: [
                    ["html","bold", "italic", "underline", "|", "forecolor"]
                
                ],

                // Override any of the toolbarText values - these are the Alt Text / Tooltips shown
                // when the user hovers the mouse over the Toolbar Buttons
                // Here are a couple translated to German, thanks to Google Translate.
                toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
						"html":"html source",
                        "bold": "bold",
                        "italic": "italic",
                        "underline": "underline"
                    }),

                // Specify a specific CSS file to use for the Editor
                css: "style//jHtmlArea.Editor.css",

                // Do something once the editor has finished loading
                loaded: function() {
                    //// 'this' is equal to the jHtmlArea object
                    //alert("jHtmlArea has loaded!");
                    //this.showHTMLView(); // show the HTML view once the editor has finished loading
                }
            });
        });
    </script>
	
<div class="admin_center">

<h1>New Exhibition</h1>

<div class="tab"><a href="?s=exhibitions&a=mng" class="topLink">Exhibition List</a>

<span class="topLink-current">Add New Exhibition</span>

</div>

<?php

$err = array();

$err[1] = "source file could not be found";

$err[2] = "source file can not be read";

$err[3] = "could not write target file";

$err[4] = "unsupported source file (only jpg,gif or png)";

$err[5] = "unsupported target file";

$err[6] = "available version of GD does not support target file extension";



if(isset($_POST['M_New']) && ($_POST["M_New"] == "upload_new"))

{

	if($exhibition->add_exhibition($_POST))

	{

		$insertGoTo = "?s=exhibitions&a=mng&mode=new&success=1";

		header(sprintf("Location: %s", $insertGoTo));

	}

}



if((isset($_GET['success'])) && ($_GET['success']==1))

	{

	?>

	<div class="success">Exhibition Successfully Created</div>

	<?php

	}

 if(sizeof($exhibition->message)>0){

?>

<div class="error"><?php echo $exhibition->show_message(); ?></div>

<?php } ?>



<form action="?s=exhibitions&a=mng&mode=new" method="post" enctype="multipart/form-data" name="image_upload">

<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_size; ?>">
 
<p>

<label>Image :</label>

  <input type="file" name="img" />

  </p>

  <p>

<label>Descriptions  :</label>

  <textarea name="des" cols="45" rows="8" id="txtCustomHtmlArea"></textarea>
  </p>

<p>
<label>Exhibition Type</label>
  <select name="type">
    <option value="1">Current</option>
    <option value="2">Upcoming</option>
  </select>
  
 </p>
<p>

	<input type="hidden" name="M_New" value="upload_new">

<input type="submit" name="submit" value="Submit" />	

</p>	

</form>

</div><!-- END center -->