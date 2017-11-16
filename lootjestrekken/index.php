<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

    <body>
    <script>
        $(document).ready(function(e) {
            //variables
            var html = '<div><input type="text" name="name[]" ><a href="#" id="remove">x</a> <br></div>';
            var maxRows =9;
            var minRows = 4;
            var x = 3;

            //Add rows

            $("#add").click(function (e) {
                if (x <= maxRows) {
                    $("#container").append(html);
                    x++
                }else {
                    alert('er mogen maar 10 namen zijn')
                }
            });
            //remove rows

            $("#container").on('click','#remove',function (e) {
                if (x >= minRows) {
                    $(this).parent('div').remove();
                    x--;
                }else{
                    alert('er moeten 3 namen zijn')
                }
            });

        });
      </script>


        <div class="container">
               <div class="text_inleiding">
                    <h1>Namen invullen</h1>
                    <p>
                       <h5> Vul hier de namen in.</h5>
                        Minimaal 3 namen<br>
                        Maximaal 10 namen
                    </p>
               </div>
               <div class="img">
                   <img src="images/kerstman_1.jpg" class="rounded float-right" alt="xx">
               </div>
               <div class="Namen_lotry">
                   <form action="overzicht.php" method="post">
                       <label><h5>Namen:</h5></label><br>
                       <label>
                           <div id="container">

                               <div> <input class="names_1"  type="text" name="name[]"><a href="#" id="remove">x</a> <br></div>
                               <div> <input class="names_1" type="text" name="name[]"><a href="#" id="remove">x</a> <br></div>
                               <div> <input class="names_1" type="text" name="name[]"><a href="#" id="remove">x</a> <br></div>
                           </div>
                           <input id="sendButton" type="submit" value="Upload">    <a href="#" id="add">add row</a>

                       </label>
                     </form>
               </div>
        </div>
    </body>

</html>



}