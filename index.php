<!doctype html>
<html>
<head>
 
   <meta name="robots" content="noindex,nofollow">
   <title>AJAX Pet Adoption Agency</title>
   <style>
       #myForm div{
        margin-bottom:2%;
        }
   </style>
   <script src="https://code.jquery.com/jquery-latest.js"></script>
   
</head>
<body>
<h2>AJAX Pet Adoption Agency</h2>
<p>Below is a starter page for the AJAX Pet Adoption Agency assignment.</p>
<div id="output">
<form id="myForm" action="" method="get">

   <div id="pet_race">
   <h3>What kind of animal</h3>
       <p>Please tell us pet you prefer:</p>
       <input type="radio" name="race" value="dog" required="required">Dog <br />
       <input type="radio" name="race" value="bird">Bird <br />
       <input type="radio" name="race" value="hedgehog">Hedgehog <br />
       <input type="radio" name="race" value="cat">Cat <br />
       <input type="radio" name="race" value="pig">Pig <br />
       <input type="radio" name="race" value="rabbit">Rabbit <br />
       <input type="radio" name="race" value="dinosaur">Velociraptor <br />
       </div>
       <div id="pet_color">
   <h3>Color</h3>
       <p>What color would you like this beast?:</p>
       <input type="radio" name="color" value="dark" required="required">Dark <br />
       <input type="radio" name="color" value="light">Light <br />       
       </div>
    <div id="pet_feels">
       <h3>Feels</h3>
       <p>Please choose how you would like your pet to feel:</p>
       <input type="radio" name="feels" value="fluffy" required="required">Fluffy <br />
       <input type="radio" name="feels" value="scaly">Scaly <br />
       <input type="radio" name="feels" value="prickly">Prickly <br />
   </div>
   <div id="pet_likes">
       <h3>Likes</h3>
       <p>Please tell us what your pet will like:</p>
       <input type="radio" name="likes" value="petted" required="required">to be petted <br />
       <input type="radio" name="likes" value="ridden">to be ridden <br />
   </div>
    <div id="pet_eats">
       <h3>Eats</h3>
       <p>Please tell us what your pet likes to eat:</p>
       <input type="radio" name="eats" value="carrots" required="required">carrots <br />
       <input type="radio" name="eats" value="pets">other people's pets <br />
       <input type="radio" name="eats" value="cat food">Cat Food <br />
       <input type="radio" name="eats" value="dog food">Dog Food <br />
   </div>
  
   <div><input type="submit" value="submit it!" /></div>
</form>
</div>
<p><a href="index.php">RESET</a></p>
<script>
    $("document").ready(function(){
        
        //hide likes and eats
        $('#pet_color').hide();
        $('#pet_feels').hide();
        $('#pet_likes').hide();
        $('#pet_eats').hide(); 
        

        //on click of geels likes is shown
        $('#pet_race').click(function(){
          $('#pet_color').slideDown(200);
        });

        $('#pet_color').click(function(){
        $('#pet_feels').slideDown(200);
        });

        $('#pet_feels').click(function(){
        $('#pet_likes').slideDown(200);
        });
        
        $('#pet_likes').click(function(){
        $('#pet_eats').slideDown(200);
        });

        
        $('#myForm').submit(function(e){
            e.preventDefault();//no need to submit as you'll be doing AJAX on this page
            let race = $("input[name=race]:checked").val();
            let color = $("input[name=color]:checked").val();
            let feels = $("input[name=feels]:checked").val();
            let likes = $("input[name=likes]:checked").val();
            let eats = $("input[name=eats]:checked").val();
            let pet = "";
           // alert(feels);



          if(race == "rabbit" && color == "light" && feels=="fluffy" && likes == "petted" && eats=="carrots"){
            pet = "rabbit";
          }
          if(race == "dinosaur" && color == "dark" && feels=="scaly" && likes == "ridden" && eats=="pets"){
            pet = "velociraptor";
          }
          if(race == "dog" && color == "dark" && feels=="fluffy" && likes == "petted" && eats=="dog food"){
            pet = "greyhound";
          }
          if(race == "dog" && color == "light" && feels=="fluffy" && likes == "petted" && eats=="dog food"){
            pet = "golden";
          }
          if(race == "bird" && color == "dark" && feels=="fluffy" && likes == "petted" && eats=="carrots"){
            pet = "bird";
          }
          if(race == "bird" && color == "light" && feels=="fluffy" && likes == "petted" && eats=="carrots"){
            pet = "bird";
          }
          if(race == "cat" && color == "light" && feels=="fluffy" && likes == "petted" && eats=="cat food"){
            pet = "cat";
          }
          if(race == "cat" && color == "dark" && feels=="fluffy" && likes == "petted" && eats=="cat food"){
            pet = "cat";
          }
          if(race == "hedgehog" && color == "dark" && feels=="prickly" && likes == "petted" && eats=="carrots"){
            pet = "hedgehog";
          }
          if(race == "pig" && color == "light" && feels=="fluffy" && likes == "petted" && eats=="carrots"){
            pet = "pig";
          }


          var output = "";
          output+= `<p> Congratulations! You have a new pet ${pet}.</p>`;
          output+= `<p> Your pet is a ${race}.</p>`;
          output+= `<p> Your pet color is ${color}.</p>`;
          output+= `<p> Your pet feels ${feels}.</p>`;
          output+= `<p> Your pet likes to be ${likes}.</p>`;
          output+= `<p> Your pet likes to eat  ${eats}.</p>`;

          $.get( "includes/get_pet.php", { critter: pet } )
          .done(function( data ) {
          //alert( "Data Loaded: " + data );
          $('#output').html(data + output);
          })
            .fail(function(xhr, status, error) {
               //Ajax request failed.
               var errorMessage = xhr.status + ': ' + xhr.statusText
               alert('Error - ' + errorMessage);
           })

          
          
          ;



          $('#output').html(output);

        });

    });
  

   </script>
</body>
</html>
