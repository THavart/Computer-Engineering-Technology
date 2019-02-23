jQuery(document).ready(function($){
    jQuery( '#activity-search-input' ).autocomplete({
        source: ajaxurl + '?action=searchactivity',
        minLength: 2,
        select: function(event, ui) {
            var permalink = 'admin.php?page=in_actvty_list_test&action=edit&activity='+ ui.item.value +'&id=' + ui.item.id; // Get permalink from the datasource
            window.location.replace(permalink);
        }
    });
    jQuery( '#activityv-search-input' ).autocomplete({
        source: ajaxurl + '?action=searchactivity',
        minLength: 2,
        select: function(event, ui) {
            var permalink = 'admin.php?page=in_actvty_list&action=view&activity='+ ui.item.value +'&id=' + ui.item.id; // Get permalink from the datasource
            window.location.replace(permalink);
        }
    });
});