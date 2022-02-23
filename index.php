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

  

    <div id="pet_feels">
       <h3>Feels</h3>
       <p>Please choose how you would like your pet to feel:</p>
       <input type="radio" name="feels" value="fluffy" required="required">Fluffy <br />
       <input type="radio" name="feels" value="scaly">Scaly <br />
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

   </div>

   <div id="pet_name">
       <h3>Name</h3>
       <p>Please tell us pets name:</p>
       <input type="text" name="name" value="" required="required"> <br />
      

   </div>
  
   <div><input type="submit" value="submit it!" /></div>
</form>
</div>
<p><a href="index.php">RESET</a></p>
<script>

    function titleCase(value){
      value = value.toLowerCase().split(' ');
      for (var i = 0; i < value.length; i++) {
        value[i] = value[i].charAt(0).toUpperCase() + value[i].slice(1);
      }
      return value.join(' ');
      }

    $("document").ready(function(){
        
        //hide likes and eats
        
        //$('#pet_feels').hide();
        $('#pet_likes').hide();
        $('#pet_eats').hide(); 
        

        //on click of geels likes is shown    

        $('#pet_feels').click(function(){
        $('#pet_likes').slideDown(200);
        });
        
        $('#pet_likes').click(function(){
        $('#pet_eats').slideDown(200);
        });

        $('#pet_eats').click(function(){
        $('#pet_name').slideDown(200);
        });

        
        $('#myForm').submit(function(e){
            e.preventDefault();//no need to submit as you'll be doing AJAX on this page
            let feels = $("input[name=feels]:checked").val();
            let likes = $("input[name=likes]:checked").val();
            let eats = $("input[name=eats]:checked").val();
            let name = $("input[name=name]").val();
            name = titleCase(name);
            name = `<span style="background-color:yellow">${name}</span>`;
            let pet = "";
           alert(name);



          if(feels=="fluffy" && likes == "petted" && eats=="carrots"){
            pet = "rabbit";
          }
          if(feels=="scaly" && likes == "ridden" && eats=="pets"){
            pet = "velociraptor";
          }



          var output = "";
          output+= `<p> Congratulations! You have a new pet ${pet}.</p>`;        
          output+= `<p> Your pet feels ${feels}.</p>`;
          output+= `<p> Your pet likes to be ${likes}.</p>`;
          output+= `<p> Your pet likes to eat  ${eats}.</p>`;
          output+= `<p> Your pet is named ${name}.</p>`;

          $.get( "includes/get_pet.php", { critter: pet } )
          .done(function( data ) {
          //alert( "Data Loaded: " + data );
          $('#output').html(data + output);
          })
            .fail(function(xhr, status, error) {
               //Ajax request failed.
               var errorMessage = xhr.status + ': ' + xhr.statusText
               alert('Error - ' + errorMessage);
           });

          
          
          



          $('#output').html(output);

        });

    });
  

   </script>
</body>
</html>
