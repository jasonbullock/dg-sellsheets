<?php
/*
Template Name: Home
*/

get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/cookie.min.js"></script>


<!-- GRID -->

<div class="content">
    <div class="grid-container">
        <div class="inner-content grid-x grid-margin-x grid-padding-x">
            <div class="small-12 medium-8 large-8 cell">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/diageo-logo.png" style='width: 180px; margin-top:25px;'/>
                <h3>Sell Sheets</h3>

                 <p class="home-instructions">Click on the title to view individual Sell Sheet. Click on checkboxes then the "View Selected Sell SheetsNow" button to view multiple Sell Sheets. To save your selections to view later, name it and click "Save"</p>
            </div>
            <div class="cell auto"></div>


            <div class="main small-12 medium-6 large-6 cell" role="main">

                <div id="cbResults"></div>

                <form id='redirect' name="checkBoxForm" method="get">

                    <?php
                    $args_cat = [
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => 1,
                    ];

                    $categories = get_categories($args_cat);
                    // print_r($categories);

                    $counter = 0;

                    if (!empty($categories)):
                        foreach ($categories as $category):
                            $args = [
                                'post_type' => 'sell_sheets',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'orderby' => 'title',
                                'cat' => $category->term_id
                            ];

                            $query = new WP_Query($args);
                             echo '<h4>' . $category->slug . '</h4>';


                            while ($query->have_posts()) : $query->the_post();
                                $permalink = get_the_permalink()

                               ?>

                               <input name="<?php echo 'url' . $counter?>" type="checkbox" id="<?php echo 'url' . $counter?>" value='<?php echo $permalink ?>' onclick="getvalue(this.value)" style="float:left;" class="url-check-boxes">
                               <?php
                                echo '<h5><a href="' . $permalink . '">' . get_the_title() . '</a></h5>';
                                echo get_template_part( 'parts/content', 'byline' );
                                echo $permalink;
                            //...
                            // echo $counter;
                             $counter++;
                            endwhile;

                            wp_reset_postdata(); // reset the query 

                        endforeach;
                    endif;
                    ?>



                    <hr>



                      <input type="button" style="width: 100%;" class="button" onclick="submitForm('redirect')" value="View Now" />


    <p class="or">OR</p>
                
                      <div class="input-group">
                        <span class="input-group-label">Name your collection</span>
                      <input class="input-group-field" type="text" name="selectionName">
                      <div class="input-group-button">
                         <input type="button" class="button" onclick="addCheckboxContent(document.checkBoxForm); pgRefresh();" value="Save" />
                      </div>
                    </div>



                </form>




            </div><!-- END LEFT COLUMN -->
            <div class="main auto cell" role="main">
                <div id="myDiv0"></div>
                <div id="myDiv1">
                  
                  <script type="text/javascript">
                    var cookieCount = 0;
                     function get_cookies_array() {

                      var cookies = { };

                      // if (document.cookie && document.cookie != '') {
                          var split = document.cookie.split(';');
                          for (var i = 0; i < split.length; i++) {
                              var name_value = split[i].split("=");
                              name_value[0] = name_value[0].replace(/^ /, '');
                              cookies[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
                          }
                      // }

                      return cookies;
                     
                    }


                    var cookies = get_cookies_array();
                      for(var name in cookies) {

                        
                     

                          var str = name;
                          var res = str.slice(0, 5);


                        // //document.write( name + " : " + cookies[name] + "<br />" );
                        if (res == 'c_nam'  ) {
                          
                          tmpName = cookies[name];
                           
                         } 
                        else if  (res == 'c_url' ) {

                          document.write(   "<p><a href='redirect?" + cookies[name] + "' class='button round' style='width:50%;'>" + tmpName + "</a></p>" );

                        }

                         

                      
                       
                       


                    }
                  </script>

                </div>
                <div id="myDiv2"></div>
                <div id="myDiv3"></div>
                <div id="myDiv4"></div>
                <div id="myDiv5">

                  

                </div> 

            </div><!-- END RIGHT COLUMN -->
        </div><!-- END INNER CONTENT GRID CONTAINER -->
    </div><!-- END GRID CONTAINER -->
</div><!-- END CONTENT -->



<script>



function pgRefresh() {
location.reload();
}

  

function printCookies() { 

    var deleteCookieButton = "<hr><a onclick='clearCookies();'>Clear All Saved Searches</a>";
    var allCookies = document.cookie;


    if (allCookies) {

        cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++) {

                if (cookies.length <= 1) {
                  cookieCount = 0;
                } else {
                  cookieCount = cookies.length/2;
                }

            }


    document.getElementById('myDiv0').innerHTML = '<h3 style="margin-bottom:30px;">My Saved Searches</h3>';
    // document.getElementById('myDiv3').innerHTML = allCookies
    document.getElementById('myDiv2').innerHTML = deleteCookieButton;


    } else {

    //alert('there is no cookie');

    }



}

window.onload = printCookies;






//document.cookie = "c_url=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";


// PUT PERMALINKS IN QUERY STRING FOR CHECKED BOXES

  var allVals = [];
   $('#color:checked').each(function() {
     allVals.push($(this).val());
   });
   $('#t').val(allVals)


//SUBMIT FORM @ ACTIONS FOR BUTTONS
  function submitForm(action) {
    var form = document.getElementById('redirect');
    form.action = action;
    document.checkBoxForm.selectionName.remove();
    form.submit();  
}






//FUNCTION TO SAVE QUERY STRING
function addCheckboxContent(form) {
    var cbResults = '';

    for (var i = 0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            if (form.elements[i].checked == true) {
                cbResults += form.elements[i].id + '=' + form.elements[i].value + '&';
            }
        }
    }

    if (cbResults &&  document.checkBoxForm.selectionName.value) {

     cookieCount = cookieCount+1;
     cookie.set( 'c_name'+(cookieCount), document.checkBoxForm.selectionName.value, {
       expires: 100000, 
     });

     cookie.set( 'c_url'+(cookieCount), cbResults, {
       expires: 100000, 
     });


      printCookies();

        
    } else {
        alert('To save a view, click sell sheet(s) and enter a name for your collection.');
    }

}





function clearCookies() {
    cookie.empty();
    document.getElementById("myDiv0").innerHTML = "";
    document.getElementById("myDiv1").innerHTML = "";
    document.getElementById("myDiv2").innerHTML = "";
    document.getElementById("myDiv3").innerHTML = "";
    pgRefresh()

}



</script>










<?php get_footer(); ?>