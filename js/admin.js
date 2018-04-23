jQuery(document).ready(function () {
    jQuery('#sendUsers').bind("click", function () {
        $(".table > thead").remove();
        $(".table > tbody").remove();
        jQuery.ajax({
            url: "admin.php",
            type: "POST",
            dataType: "json",
            success: function (result) {
                if (!result) {
                    alert(result.message);
                } else {
                    jQuery('.table').append(function () {
                        var res = '<thead><tr><th scope="col">id</th><th scope="col">name</th><th scope="col">email</th><th scope="col">phone</th></tr></thead><tbody>';
                        for (var i = 0; i < result.users.name.length; i++) {
                            res += '<tr><td>' + result.users.usersId[i] + '</td><td>' + result.users.name[i] + '</td><td>' + result.users.email[i] + '</td><td>' + result.users.phone[i] + '</td></tr>';
                        }
                        res += '</tbody>';
                        return res;
                    });
                    console.log(result);
                }
                return false;
            }
        });
    });

    jQuery('#sendOrders').bind("click", function () {
        $(".table > thead").remove();
        $(".table > tbody").remove();
        jQuery.ajax({
            url: "admin2.php",
            type: "POST",
            dataType: "json",
            success: function (result) {
                if (!result) {
                    alert(result.message);
                } else {
                    jQuery('.table').append(function () {
                        let res = '<thead><tr><th scope="col">id</th><th scope="col">users_id</th><th scope="col">home</th><th scope="col">part</th><th scope="col">appt</th><th scope="col">floor</th><th scope="col">street</th><th scope="col">count</th></tr></thead><tbody>';
                        for (let i = 0; i < result.users.home.length; i++) {
                            res += '<tr><td>' + result.users.send_id[i] + '</td><td>'+ result.users.usersId[i] + '</td><td>' + result.users.home[i] + '</td><td>' + result.users.part[i] + '</td><td>' + result.users.appt[i] + '</td><td>' + result.users.floor[i] + '</td><td>' + result.users.street[i] + '</td><td>' + result.users.buy_count[i] +  '</td></tr>';
                        }
                        res += '</tbody>';
                        return res;
                    });
                    console.log(result.users);
                }
                return false;
            }
        });
    })
});

