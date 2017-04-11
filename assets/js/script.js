/**
 * Created by Hayk on 23/02/2017.
 */
$('#myTabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});