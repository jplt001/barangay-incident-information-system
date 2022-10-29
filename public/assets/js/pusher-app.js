$(document).ready(function(){
    const barangayID = $(`meta[name="barangay-id"]`).attr("content");
    const rls = $(`meta[name="rls"]`).attr("content");
    const appDebug = $(`meta[name="app_debug"]`).attr("content");

    // console.log(appDebug);
    Pusher.logToConsole = (appDebug) ? false : false;

    var pusher = new Pusher('321fbd0d01aa54dbf6ba', {
        cluster: 'ap1'
    });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function (data) {
    //     alert(JSON.stringify(data));
    // });

    // channel.bind(`barangay-sos-alert-${barangayID}`).
    switch(rls) {
        case 'owner':
            InitiateOwnerChannel()
            break;
        default:
            InitiateAdminChannel();
    }

    function InitiateOwnerChannel() {
        const alertChannel = pusher.subscribe("owner");

        alertChannel.bind(`barangay-sos-alert-${barangayID}`, function (data) {
            console.log(data);
        });
    }
    
    function InitiateAdminChannel() {
        const adminChannel = pusher.subscribe("admin");

        adminChannel.bind("newly-registered", function(data) {
            console.log(data);
        });

    }
});