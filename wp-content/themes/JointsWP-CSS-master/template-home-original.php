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
            <div class="small-12 medium-9 large-9 cell">
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
                            //...
                            // echo $counter;
                             $counter++;
                            endwhile;

                            wp_reset_postdata(); // reset the query 

                        endforeach;
                    endif;
                    ?>



                    <hr>



                      <!-- ... -->
                      <input type="button" class="button" onclick="submitForm('redirect')" value="View Now" />

                      <div class="input-group">
                        <span class="input-group-label">Name your collection</span>
                      <input class="input-group-field" type="text" name="selectionName">
                      <div class="input-group-button">
                         <input type="button" class="button" onclick="addCheckboxContent(document.checkBoxForm);" value="Save" />
                      </div>
                    </div>
                    


                </form>




            </div><!-- END LEFT COLUMN -->
            <div class="main small-12 medium-6 large-6 cell" role="main">
                <div id="myDiv1"></div>
                <div id="myDiv2"></div>
                <div id="myDiv3"><a id='myAnchor' class='button' onclick='clearCookies(); updateCookieButton()'>CLEAR COOKIES</a></div>
            </div><!-- END RIGHT COLUMN -->
        </div><!-- END INNER CONTENT GRID CONTAINER -->
    </div><!-- END GRID CONTAINER -->
</div><!-- END CONTENT -->



<script>
    
function printCookies() { 
    var allCookies = document.cookie;
    document.getElementById('myDiv1').innerHTML = allCookies; 
}

window.onload = printCookies;


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

        cookie.set( 'c_name', document.checkBoxForm.selectionName.value );
        cookie.set( 'c_url', cbResults );

        updateCookieButton();
        printCookies();

        
    } else {
        alert('To save a view, click sell sheet(s) and enter a name for your collection.');
    }










//document.cookie="c_name="+document.checkBoxForm.selectionName.value;

// var str = document.cookie;
// var res = str.substring(0, 3);

// if (res = 'name') {
//     document.getElementById("myDiv3").innerHTML = "string matches'NAME"+res;
// } else {
//    document.getElementById("myDiv3").innerHTML = "string DOES NOT matche'NAME";
// }

//ERASE ALL COOCIES ON DOMAIN
//cookie.empty();

}


document.cookie = "wp-settings-3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-time-3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-time-1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";




function clearCookies() {
    cookie.empty();
    document.getElementById("myDiv2").innerHTML = "";
    document.getElementById("myDiv1").innerHTML = "";

    document.cookie = "wp-settings-3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-time-3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "wp-settings-time-1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}








function getCookie(c_name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 


function updateCookieButton() {
    var myCookie = getCookie("MyCookie");

    if (myCookie == null) {
          document.getElementById("myDiv2").innerHTML = 
        "<a id='myAnchor' href='redirect?" + cookie( 'c_url' ) + "' class='button'>" + cookie( 'c_name' ) + "</a>";

  
    }
    else {
       //document.getElementById("myDiv2").innerHTML = "";
    }
}

updateCookieButton();







</script>



















<?php get_footer(); ?>