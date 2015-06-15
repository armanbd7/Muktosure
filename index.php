<?php
    if(isset($_POST['submit'])){
        $question=$_POST['question'];
        //echo $question;
        $url="http://localhost/muktosure/GET/grettings.php?q=".urlencode($question);
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $response=curl_exec($curl);
        $result=json_decode($response);
        $answer=$result->answer;
        
     }
      if(isset($_POST['submit1'])){
        //$question=$_POST['question'];
        //echo $question;
        $url="http://api.openweathermap.org/data/2.5/weather?q=London,uk";
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $response=curl_exec($curl);
        $result=json_decode($response);
        echo "aulfaul";
        echo $result->main->temp;
        
     }
?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

    <body>
    <h2></h2>

        <form action="index.php" method="post">

            
             <div class="form-group">

                <label for="inputEmail">Greetings Question </label>

                 <select  type="email" class="form-control" id="question" name="question">
                      <option value="Hello! How are you?">Hello! How are you?</option>
                      <option value="Hi! What is your name?">Hi! What is your name?</option>
                      <option value="Good morning! I am Kitty! nice to meet you!">Good morning! I am Kitty! nice to meet you!</option>
                     
                </select> 

            </div>

           

           

            <button type="submit" name="submit" class="btn btn-primary">Answer the Question</button>

        </form>
    <hr/>
    <h3>Sample Question</h3>

     <form action="index.php" method="post">

            
             <div class="form-group">

                <label for="inputEmail">Weather Question </label>

                 <input  type="text" class="form-control" id="question" name="question">
                      
                     
                

            </div>

           

           

            <button type="submit" name="submit1" class="btn btn-primary">Answer the Question</button>

        </form>
        <h3>Bot's Answer</h3>
        <?php if(isset($_POST['submit'])){ ?>
             <table class="table">
                    <thead>
                      <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                            
                            <td><?php   echo $question?></td>
                            <td><?php   echo $answer;?></td>
                        </tr>
                    </tbody>

            </table>
        <?php } ?>
    </body>

</html>
