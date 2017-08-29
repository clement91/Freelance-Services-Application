/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //list.js
    //var options = {
    //  valueNames: [ 'profile_view' ]
    //};
    //var userList = new List('mxg', options);
});
