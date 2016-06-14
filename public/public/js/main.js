$(document).ready(function () {

        $(document).ajaxStart(function () {
            $("#more-btn").addClass("working");
            $("#loading").show();
        });

        $(document).ajaxStop(function () {
            $("#more-btn").removeClass("working");
            $("#loading").hide();
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#tw-search').submit('submit', function (e) {
            e.preventDefault();
        });

        $('.btn-tweets').on('click', function () {
            var data = {
                'username': $('#screen_name').val(),
                _token: CSRF_TOKEN
            };
            if (!$("#more-btn").hasClass("working")) {
                if (!$("#more-btn").hasClass("more-tweets")) {
                    callFirstTime(data);
                } else {
                    callMore(data);
                }
            }
        });

        var callFirstTime = function (data) {
            $.ajax({
                    type: 'POST',
                    url: '/getTweets',
                    data: data,
                    dataType: 'json',
                    encode: true
                })
                .done(function (res) {
                    if (res.success) {
                        var $res = $(res.cont);
                        $('#twName').val(data.username);
                        $('#twMax').val(res.max_id);
                        $('#content').fadeOut().html($res).fadeIn();
                        $('#more-btn').text("More").addClass("more-tweets").removeClass("btn-tweets");
                    } else {
                        $('.error').html(res.cont).fadeIn();
                    }
                });
        };

        var callMore = function (data) {
            data.username = $('#twName').val();
            data.max_id = $('#twMax').val();
            $.ajax({
                    type: 'POST',
                    url: '/getMoreTweets',
                    data: data,
                    dataType: 'json',
                    encode: true
                })
                .done(function (res) {
                    if (res.success) {
                        var $res = $(res.cont);
                        $('#twMax').val(res.max_id);
                        $('#content').append($res);
                    } else {
                        $('.error').html(res.cont).fadeIn();
                    }
                });
        };
    }
);