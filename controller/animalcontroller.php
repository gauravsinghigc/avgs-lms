<?php

//require files
require '../require/modules.php';

//access_url 
if (isset($_REQUEST['access_url']) == null) {
 echo "<h1>ERROR</h1>
 <p>Invalid OUTPUT request is received!</p>
 <a href='../index.php'>Back to Root</a>";
 die();
} else {
 $access_url = $_REQUEST['access_url'];
}

//start activities
if (isset($_POST['CreateAnimals'])) {
 $AnimalName = $_POST['AnimalName'];
 $AnimalCreatedAt = date("d M, Y");
 $AnimalImage = UPLOAD_FILES("../storage/animals/animal-name-img", "AnimalImage", "$AnimalName", "name-entries", "AnimalImage");
 $AnimalStatus = 1;
 $Save = SAVE("animalsname", ["AnimalName", "AnimalCreatedAt", "AnimalStatus", "AnimalImage"]);
 RESPONSE($Save, "$AnimalName name is saved successfully", "Unable to save animal name!");

 //create animal attributes
} else if (isset($_POST['CreateAnimalsBreeds'])) {
 $AnimalId = $_POST['AnimalId'];
 $BreedName = $_POST['BreedName'];
 $BreedStatus = 1;
 $BreedCreatedAt = date("d M, Y");

 $SAVE = SAVE("animalbreeds", ["AnimalId", "BreedName", "BreedStatus", "BreedCreatedAt"]);
 RESPONSE($SAVE, "Animal breed are created successfully!", "Unable to create animal breed");
}
