<link rel="stylesheet" href="assets/css/my-css.css">

<form action="/submit-form" method="POST">
    <div class="form-tabs">
        <ul class="tab-list">
            <li class="active"><a href="#tab_info">Information</a></li>
            <li><a href="#tab_pricing">Pricing</a></li>
            <li><a href="#tab_image_gallary">Image Gallery</a></li>
            <li><a href="#tab_virtual_tour">360 Virtual Tour</a></li>
            <li><a href="#tab_video">Video</a></li>
            <li><a href="#tab_location">Location</a></li>
            <li><a href="#tab_bedroom">Bedrooms</a></li>
            <li><a href="#tab_services">Services</a></li>
            <li><a href="#tab_terms">Terms &amp; Rules</a></li>
            <li><a href="#tab_slider">Slider</a></li>
            <li><a href="#tab_setting">Setting</a></li>
        </ul>

        <div class="tab-content">


        <div id="tab_info" class="tab-pane active" style="width:45%;padding:10px 30px 0 0;float:left; margin-left:20px;">
                            
                            
                            <label for="bedrooms" class="feature-label">Number of Bedrooms:</label><br>
                            <input type="text" id="bedrooms" name="bedrooms" class="regular-text" placeholder="Enter number of bedrooms"><br><br>
                            <label for="beds">Number of Beds:</label> <br>

                            <input type="text" id="beds" name="beds" placeholder="Enter number of beds" class="regular-text"><br><br>
                            <label for="size">Size:</label> <br>
                            <input type="text" id="size" name="size" placeholder="Enter size" class="regular-text"><br><br>
                            <label for="rooms">Number of Rooms:</label><br>
                            <input type="text" id="rooms" name="rooms" placeholder="Enter number of rooms" class="regular-text"><br><br>
                            <label for="guests">Affiliated booking links</label><br>
                                <input type="text" id="guests" name="guests" placeholder="Enter Affiliated booking links" class="regular-text"  ><br><br>
                                
                   
          </div>

          <div>
                    <label for="guests">Number of Guests:</label><br>
                    <input type="text" id="guests" name="guests" placeholder="Enter number of guests" class="regular-text"><br><br>
                    <label for="bathrooms">Number of Bathrooms:</label><br>
                    <input type="text" id="bathrooms" name="bathrooms" placeholder="Enter number of bathrooms" class="regular-text"><br><br>
                    <label for="unit">Unit of Measure:</label><br>
                    <input type="text" id="unit" name="unit" placeholder="Enter unit of measure" class="regular-text"><br><br>
                    <label class="feature-label">Make this Listing as featured?</label>
                    <label for="featured-yes">
                    <input type="radio" id="featured-yes" name="featured" value="yes">
                    Yes    </label>
                    <label for="featured-no">
                    <input type="radio" id="featured-no" name="featured" value="no">  No</label> <br>      
                  


</div>






            <div id="tab_pricing" class="tab-pane">
                
            <label for="booking" class="feature-label">Booking type:</label><br>
            <select id="booking" name="bookingtype" class="regular-text">
                            <option value="Nightly">Nightly</option>
                            <option value="Daily">daily</option>
                            <option value="weekly">weekly/option>
                            <!-- Add more options as needed -->
                        </select> <br>

             
             <label for="price" class="feature-label">Price:</label><br>
             <input type="text" id="price" name="price" class="regular-text" placeholder="Enter price"><br><br>
            
             <label for="booking" class="feature-label">After price label </label></Label>:</label><br>
             <input type="text" id="booking" name="bookingtype" class="regular-text" placeholder="Enter after price label"><br><br>
             
             <label for="weekneds" class="feature-label">Weekends:</label><br>
             <input type="text" id="price" name="weekneds" class="regular-text" placeholder="Enter the unit price for a single day"><br><br>
            
             <label for="weekendprice" class="feature-label">Select the days to apply weekend pricing</label><br>
            <select id="weekendprice" name="weekendprice" class="regular-text">
                            <option value="Nightly">Saturday and Sunday</option>
                            <option value="Daily">Firday and Saturday</option>
                            <option value="weekly">weekly/option>
                            <!-- Add more options as needed -->
                        </select> <br><br>
            <hr><br><label> Long-Term Pricing </label> <hr>
            
                        <label> Weekend-7 + nights</label><br>
                        <input type=text class="regular-text" placeholder="Enter the price for a single day">

                        <label style="margin-left:20%;"> Monthly-30 + nights</label> 
                        <input type=text class="regular-text" placeholder="Enter the price for a single day" >

                        <hr><br><label>Additional Cost</label> <hr>
                        <label class="feature-label">Allow additional Guest</label> <br>
                        <label for="featured-yes">
                        <input type="radio" id="featured-yes" name="featured" value="yes">
                        Yes
                        </label>
                        <label for="featured-no">
                        <input type="radio" id="featured-no" name="featured" value="no"> No </label> 

                        <label class="feature-label" style="margin-left:43%;">Additional Guest?</label> 
                        <input type=text class="regular-text" placeholder="Enter the price for one add" style="margin-left:2%;">

            </div>






            <!-- Add more tab content divs for each tab -->





        </div>
    </div><br>
    <button type="submit">Submit</button>
</form>







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".tab-list li a").click(function(e) {
            e.preventDefault();
            var tabId = $(this).attr("href");
            $(".tab-list li").removeClass("active");
            $(this).parent().addClass("active");
            $(".tab-content .tab-pane").hide();
            $(tabId).show();
        });

        // Hide all tab content except for the active tab on page load
        $(".tab-content .tab-pane").not(".active").hide();
    });
</script>


//<?php echo "Daler" ?>