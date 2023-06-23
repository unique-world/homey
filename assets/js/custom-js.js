jQuery(document).ready(function($) {
    $('.form-tabs .tab-list a').click(function(e) {
        e.preventDefault();

        // Remove active class from all tabs
        $('.form-tabs .tab-list li').removeClass('active');

        // Add active class to the clicked tab
        $(this).parent('li').addClass('active');

        // Hide all tab content
        $('.form-tabs .tab-content .tab-pane').hide();

        // Show the corresponding tab content based on the clicked tab's href
        var tabId = $(this).attr('href');
        $(tabId).show();
    });
});

jQuery(document).ready(function($) {
    // Enable hover behavior for the main menu item
    $('#toplevel_page_listings').hover(
        function() {
            $(this).addClass('opensub');
        },
        function() {
            $(this).removeClass('opensub');
        }
    );
});
