<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_meta"]').prop('content'),
            },
        });
        $('#register_form').on('submit', (e) => {

            const form = $(e.target);
            e.preventDefault();

            let params = form.serializeArray();
            $.ajax({
                url: form.attr('action'),
                method: 'post',
                dataType: 'json',
                data: params,
                success: (resp) => {
                    $('#text_span').removeAttr('hidden');
                    $('#link').text(resp.link)
                },
                error: (err) => {
                    alert("ERROR: " + err.responseJSON.message);
                }
            })
        })

        $('#generate_new_link').on('click', (e) => {
            const form = $(e.target);
            e.preventDefault();

            $.ajax({
                url: "{{route('link.update')}}",
                method: 'put',
                dataType: 'json',
                data: {},
                success: (resp) => {
                    $('#new_link').removeAttr('disabled');
                    $('#new_link').val(resp.link)
                },
                error: (err) => {
                    alert("ERROR: " + err.responseJSON.message);
                }
            })
        })

        $('#deactivate_link').on('click', (e) => {
            e.preventDefault();
            const link = $('#new_link').val();

            $.ajax({
                url: link,
                method: 'put',
                dataType: 'json',
                success: (resp) => {
                    if (resp.result === 'ok') {
                        $('#new_link').attr('disabled', 'disabled');
                        alert("Link deactivated");
                    }
                },
                error: (err) => {
                    alert("ERROR: " + err.responseJSON.message);
                }
            })
        })
        $('#lottery').on('click', (e) => {
            e.preventDefault();

            $.ajax({
                url: "{{route('lottery.play')}}",
                method: 'post',
                dataType: 'json',
                success: (resp) => {
                    $('#random_number').val(resp.randomNumber);
                    $('#is_win').val(resp.is_win ? 'Win' : 'Lose');
                    $('#result').val(resp.win_sum);

                },
                error: (err) => {
                    alert("ERROR: " + err.responseJSON.message);
                }
            })
        })

        $('#history').on('click', (e) => {
            e.preventDefault();

            $.ajax({
                url: "{{route('lottery.history')}}",
                method: 'get',
                dataType: 'json',
                success: (resp) => {
                    const target = $('#results_history');
                    if (resp.history.length > 0) {
                        let table = `<table class="table table-bordered table-striped table-hover">
                                         <thead>
                                                <tr>
                                                  <th>Number</th>
                                                  <th>Result</th>
                                                  <th>Sum</th>
                                                </tr>
                                        </thead>`;
                        for (let i = 0; i < resp.history.length; i++) {
                            table += '<tr>';
                            table += '<td>' + resp.history[i].random_number + '</td>';
                            table += '<td>' + (resp.history[i].is_win ? "Win" : "Lose") + '</td>';
                            table += '<td>' + resp.history[i].win_sum + '</td>';
                            table += '</tr>';
                        }
                        table += '</table>';
                        target.html(table);
                    } else {
                        target.html('No history');
                    }
                },
                error: (err) => {
                    alert("ERROR: " + err.responseJSON.message);
                }
            })
        })
    });
</script>
