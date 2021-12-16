<!doctype html>
<html lang="en">
<head>
    <title>Block 4</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<button class="btn btn-primary" id="post">post</button>
<button class="btn btn-primary" id="getone">get one</button>
<button class="btn btn-primary" id="getall">get all</button>
<button class="btn btn-primary" id="edit">edit</button>

<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script>
    $(function(){
        $('#edit').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'put',
                url: 'https://mayar.abertay.ac.uk/~1900040/cmp306/ws/edit_article',
                data: {
                    title: 'Bbbbbbbb title',
                    description: 'a description goes here',
                    image: 'image uri here',
                    link: 'give me a link',
                    id:88
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (a, b, c) {
                    console.log(c);
                }
            });
        })
        $('#getall').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: 'https://mayar.abertay.ac.uk/~1900040/cmp306/ws/norwich',
                success: function (response) {
                    console.log(response);
                },
                error: function (a, b, c) {
                    console.log(c);
                }
            });
        })
        $('#getone').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: 'https://mayar.abertay.ac.uk/~1900040/cmp306/ws/norwich',
                data: {
                    id:85
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (a, b, c) {
                    console.log(c);
                }
            });
        })

        $("#post").on("click",function (e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: 'https://mayar.abertay.ac.uk/~1900040/cmp306/ws/norwich',
                data: {
                    title: 'Aaaaaaaa title',
                    description: 'a description goes here',
                    image: 'image uri here',
                    link: 'give me a link'
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (a, b, c) {
                    console.log(c);
                }
            });
        })
    })
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>