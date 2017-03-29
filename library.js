/*function Book() 
{
  this.name = "";
  this.id = 0;
  this.borrowed = false;
  this.borrowedBy = "No one";
  this.genre = " ";
  this.getName = function(){
  	return this.name;
  }
}

function validate()
{
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) 
    {
    	document.getElementById("addForm").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "isLibrarian.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
} 


$(document).ready(function(){
	validate();
});


function updateLibrary(title, genre) 
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) 
    {
 		
    }
  };
  xhttp.open("POST", "updatePosts.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("title="+ document.getElementById("title").value+"&genre=" + document.getElementById("genre").value);
  
}



function add() //adds book to shelf
{
	
	var name = document.getElementById("title").value;
	var genre = document.getElementById("genre").value;

	updateLibrary(name, genre);



	if(genre !="" && name !="")
	{
		if (genre == "Art" || genre == "art")
		{
		 	var newBook = new Book();
		 	var newID = Math.floor((Math.random()*100) + 100)*4; //remainder 0
		 	newBook.name = name;
		 	console.log(newBook.name);
		 	newBook.id = newID;
		 	artShelf.add(newBook);


			document.getElementById("artSec").innerHTML += "<td>" + newBook.name +"</td>";

		}
		if (genre == "Science" || genre == "science") 
		{
			var newBook = new Book();
			var newID = Math.floor((Math.random()*100) + 100)*5;//remainder 1
			newBook.name = name;
			newBook.id = newID;
			scienceShelf.add(newBook);
			
			document.getElementById("scienceSec").innerHTML +=  "<td>" + newBook.name +"</td>";
		}
		if (genre == "Sport" || genre == "sport") 
		{
			var newBook = new Book();
			var newID = Math.floor((Math.random()*100) + 100)*6;//remainder 2
			newBook.name = name;
			newBook.id = newID;
			sportShelf.add(newBook);

			document.getElementById("sportSec").innerHTML +=  "<td>" + newBook.name +"</td>";
		}
		if (genre == "Literature" || genre == "literature") 
		{
			var newBook = new Book();
			var newID = Math.floor((Math.random()*100) + 100)*7;//remainder 3
			newBook.name = name;
			newBook.shelf = genre;
			litShelf.add(newBook);

			document.getElementById("litSec").innerHTML +=  "<td>" + newBook.name +"</td>";
		}

		document.getElementById("title").value = "";
		document.getElementById("genre").value = "";

	}
}*/



